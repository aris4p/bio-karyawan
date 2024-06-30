@extends('layout.admin_main')
@section('body')
<form action="{{ route('profile-simpan') }}" method="POST">
    @csrf

    <div class="col-xl-12">
        <div class="card-body">

        <div class="row">
            <!-- Basic -->
            <div class="col-md">
                <div class="card mb-6">
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
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Laki-Laki">
                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Perempuan">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>

                        </div>
                        <div class="input-group">
                            <label class="form-label  mt-4" for="basic-default-password32">Agama</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option selected="">Pilih</option>
                                <option value="Islam">Islam</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="form-label  mt-4" for="basic-default-password32">Goldar</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option selected="">Pilih</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div>
                            <label for="alamatktp" class="form-label mt-4">Alamat KTP</label>
                            <textarea class="form-control" id="alamatktp" rows="3"></textarea>
                        </div>
                        <div>
                            <label for="alamattinggal" class="form-label mt-4">Alamat Tinggal</label>
                            <textarea class="form-control" id="alamattinggal" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label mt-4">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="{{ auth()->user()->email }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Orang Terdekat Yang Dapat Dihubungi</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13">
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

