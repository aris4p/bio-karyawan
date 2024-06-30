@extends('layout.admin_main')
@section('body')
<form action="{{ route('profile-simpan') }}" method="POST">
    @csrf

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
                <div class="card mb-6">
                    <h5 class="card-header">Informasi Pribadi</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">


                        <div class="input-group">
                            <label class="form-label" for="basic-default-password32">Posisi Yang Dilamar</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="posisi" name="posisi" value="{{ auth()->user()->posisi }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Nama</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="nama" name="nama" value="{{ auth()->user()->nama }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">No. KTP</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="noktp" name="noktp" value="{{ auth()->user()->noktp }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Tempat, Tanggal Lahir</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="tempat" name="tempat" value="{{ auth()->user()->tempat }}">
                            <input type="date" class="form-control"  aria-describedby="basic-addon13" id="tgllahir" name="tgllahir" value="{{ auth()->user()->tgllahir }}">
                        </div>
                        <div class="input-group">
                            <label for="defaultSelect" class="form-label mt-4">Jenis Kelamin</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Laki-Laki" {{ auth()->user()->jenkel == 'Laki-Laki' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Perempuan" {{ auth()->user()->jenkel == 'Perempuan' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>

                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="agama">Agama</label>
                            <select class="form-select" id="agama" name="agama" aria-label="Default select example">
                                <option value="">Pilih</option>
                                <option value="Islam" {{ auth()->user()->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Katholik" {{ auth()->user()->agama == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                                <option value="Kristen Protestan" {{ auth()->user()->agama == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                <option value="Buddha" {{ auth()->user()->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Hindu" {{ auth()->user()->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Konghucu" {{ auth()->user()->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="goldar">Goldar</label>
                            <select class="form-select" id="goldar" name="goldar" aria-label="Default select example">
                                <option value="">Pilih</option>
                                <option value="A" {{ auth()->user()->goldar == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ auth()->user()->goldar == 'B' ? 'selected' : '' }}>B</option>
                                <option value="AB" {{ auth()->user()->goldar == 'AB' ? 'selected' : '' }}>AB</option>
                                <option value="O" {{ auth()->user()->goldar == 'O' ? 'selected' : '' }}>O</option>
                            </select>
                        </div>
                        <div>
                            <label for="alamatktp" class="form-label mt-4">Alamat KTP</label>
                            <textarea class="form-control" id="alamatktp" name="alamatktp" rows="3">{{ auth()->user()->alamat_ktp }}</textarea>
                        </div>
                        <div>
                            <label for="alamattinggal" class="form-label mt-4">Alamat Tinggal</label>
                            <textarea class="form-control" id="alamattinggal" name="alamattinggal" rows="3">{{ auth()->user()->alamat_tinggal }}</textarea>
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">No. Telp</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="notelpon" name="notelpon" value="{{ auth()->user()->notelpon }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label mt-4">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="{{ auth()->user()->email }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">No Orang Terdekat Yang Dapat Dihubungi</label>
                            <input type="text" class="form-control" name="orgtrdkt"  aria-describedby="basic-addon13" value="{{ auth()->user()->notelpon_tdkt }}">
                        </div>
                        <div>
                            <label for="skill" class="form-label mt-4">Skill</label>
                            <textarea class="form-control" id="skill" name="skill" rows="3">{{ auth()->user()->skill }}</textarea>
                        </div>
                        <div class="input-group">
                            <label for="defaultSelect" class="form-label mt-4">Bersedia ditempatkan di seluruh kantor perusahaan</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="persetujuan" id="inlineRadio1" value="Ya" {{ auth()->user()->persetujuan == 'Ya' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="persetujuan" id="inlineRadio2" value="Tidak" {{ auth()->user()->persetujuan == 'Tidak' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Tidak</label>
                            </div>

                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Penghasilan yang diharapkan</label>
                            <input type="text" class="form-control" name="penghasilan"  aria-describedby="basic-addon13" value="{{ auth()->user()->penghasilan }}">
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card mb-6">
                    <h5 class="card-header">Riwayat Pekerjaan</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">


                        <div class="input-group">
                            <label class="form-label  mt-4" for="basic-default-password32">Jenjang Pendidikan Terakhir</label>
                            <select class="form-select" id="jenjang" name="jenjang" aria-label="Default select example">
                                <option selected="">Pilih</option>
                                <option value="1">SMP/MTS</option>
                                <option value="2">SMA/SMK</option>
                                <option value="3">S1 (Strata 1)</option>
                                <option value="4">S2 (Strata 2)</option>
                                <option value="5">S3 (Strata 3)</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Institusi</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="institusi" name="institusi">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Jurusan</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="jurusan" name="jurusan">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Tahun Lulus</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="tahun" name="tahun">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">IPK</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="IPK" name="IPK">
                        </div>




                    </div>
                </div>
                {{-- <hr>
                <div class="card mb-6">
                    <h5 class="card-header">Riwayat Pelatihan</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Nama Kursus/Seminar</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="kursus" name="kursus">
                        </div>
                        <div class="input-group">
                            <label for="defaultSelect" class="form-label mt-4">Sertifikat</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sertifikat" id="inlineRadio1" value="Ada">
                                <label class="form-check-label" for="inlineRadio1">Ada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sertifikat" id="inlineRadio2" value="Tidak">
                                <label class="form-check-label" for="inlineRadio2">Tidak</label>
                            </div>

                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Tahun Lulus</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="tahun" name="tahun">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">IPK</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="IPK" name="IPK">
                        </div>




                    </div>
                </div>
                <hr>
                <div class="card mb-6">
                    <h5 class="card-header">Riwayat Pekerjaan</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Nama Perusahaan</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="namaperusahaan" name="namaperusahaan">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Posisi Terakhir</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="posisiterakhir" name="posisiterakhir">
                        </div>

                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Pendapatan Terakhir</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="pendapatan" name="pendapatan">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Tahun</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="tahun" name="tahun">
                        </div>




                    </div>
                </div> --}}
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{ route('profile') }}" class="btn rounded-pill btn-primary me-2">Kembali</a>
                <button type="submit" class="btn rounded-pill btn-success">Simpan</button>
            </div>
        </div>

</div>


</form>


@endsection

