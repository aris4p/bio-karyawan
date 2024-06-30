@extends('layout.admin_main')
@section('body')
<form action="{{ route('pekerjaan-update', $pekerjaan->id) }}" method="POST">
    @csrf
        @method('PUT')

    <div class="col-xl-12">
        <div class="card-body">
        <div class="row">
            <!-- Basic -->
            <div class="col-md">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            <div class="col-md">
                <div class="card mb-6">
                    <h5 class="card-header">Riwayat Pekerjaan</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Nama Perusahaan</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="namaperusahaan" name="namaperusahaan" value="{{ $pekerjaan->nama_perusahaan }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Posisi Terakhir</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="posisiterakhir" name="posisiterakhir" value="{{ $pekerjaan->posisi_terakhir }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Pendapatan Terakhir</label>
                            <input type="text" class="form-control" aria-describedby="basic-addon13" id="pendapatanterakhir" name="pendapatanterakhir" value="{{ $pekerjaan->pendapatan_terakhir }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Tahun</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="tahun" name="tahun" value="{{ $pekerjaan->tahun }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{ route('pekerjaan') }}" class="btn rounded-pill btn-primary me-2">Kembali</a>
                <button type="submit" class="btn rounded-pill btn-success">Simpan</button>
            </div>
        </div>


</div>


</form>


@endsection

