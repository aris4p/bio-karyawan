@extends('layout.admin_main')
@section('body')
<form action="{{ route('pelatihan-update', $pelatihan->id) }}" method="POST">
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
                    <h5 class="card-header">Riwayat Pelatihan</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Nama Pelatihan</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="namapelatihan" name="namapelatihan" value="{{ $pelatihan->nama_pelatihan }}">
                        </div>
                        <div class="input-group">
                            <label for="defaultSelect" class="form-label mt-4">Sertifikat (Ada/Tidak)</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sertifikat" id="inlineRadio1" value="Ada" {{ $pelatihan->sertifikat == 'Ada' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Ada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sertifikat" id="inlineRadio2" value="Tidak" {{ $pelatihan->sertifikat == 'Tidak' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Tidak</label>
                            </div>

                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Tahun</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="tahun" name="tahun" value="{{ $pelatihan->tahun }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{ route('pelatihan') }}" class="btn rounded-pill btn-primary me-2">Kembali</a>
                <button type="submit" class="btn rounded-pill btn-success">Simpan</button>
            </div>
        </div>


</div>


</form>


@endsection

