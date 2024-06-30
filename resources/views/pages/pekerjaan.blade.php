@extends('layout.admin_main')

@section('body')
    <form action="{{ route('profile-simpan') }}" method="POST">
        @csrf

        <div class="col-xl-12">
            <div class="card-body">
                <div class="row mt-3 mb-2">
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{ route('pekerjaan-tambah') }}" class="btn rounded-pill btn-primary me-2">Tambah</a>
                    </div>
                </div>

                <div class="row">
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

                        <div class="card mb-6">
                            <h5 class="card-header">Riwayat Pekerjaan</h5>

                            @if (auth()->user()->pekerjaan->isNotEmpty())
                                <div class="card-body demo-vertical-spacing demo-only-element">
                                    @foreach (auth()->user()->pekerjaan as $pekerjaan)
                                        <div class="input-group">
                                            <label class="form-label mt-4" for="basic-default-password32">Nama Perusahaan</label>
                                            <input type="text" class="form-control-plaintext" readonly  aria-describedby="basic-addon13" id="namaperusahaan" name="namaperusahaan" value="{{ $pekerjaan->nama_perusahaan }}">
                                        </div>
                                        <div class="input-group">
                                            <label class="form-label mt-4" for="basic-default-password32">Posisi Terakhir</label>
                                            <input type="text" class="form-control-plaintext" readonly  aria-describedby="basic-addon13" id="posisiterakhir" name="posisiterakhir" value="{{ $pekerjaan->posisi_terakhir }}">
                                        </div>
                                        <div class="input-group">
                                            <label class="form-label mt-4" for="basic-default-password32">Pendapatan Terakhir</label>
                                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="pendapatanterakhir" name="pendapatanterakhir" value="{{ $pekerjaan->pendapatan_terakhir }}">
                                        </div>
                                        <div class="input-group">
                                            <label class="form-label mt-4" for="basic-default-password32">Tahun</label>
                                            <input type="text" class="form-control-plaintext" readonly  aria-describedby="basic-addon13" id="tahun" name="tahun" value="{{ $pekerjaan->tahun }}">
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-end mt-3">
                                            <a href="{{ route('pekerjaan-edit', $pekerjaan->id) }}" class="btn btn-primary me-2">Edit</a>
                                            <form method="POST" action="{{ route('pekerjaan-destroy', $pekerjaan->id) }}" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pekerjaan ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="data-tidak-ada"
                                     style="color: red;
                                            font-size: 18px;
                                            text-align: center;
                                            padding: 20px;
                                            border: 2px dashed red;
                                            margin: 20px;">
                                    Data tidak ada
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection
