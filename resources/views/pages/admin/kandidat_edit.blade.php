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
                            <input type="text" class="form-control" aria-describedby="basic-addon13" id="posisi" name="posisi" value="{{ $kandidat->posisi }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Nama</label>
                            <input type="text" class="form-control" aria-describedby="basic-addon13" id="nama" name="nama" value="{{ $kandidat->nama }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">No. KTP</label>
                            <input type="text" class="form-control" aria-describedby="basic-addon13" id="noktp" name="noktp" value="{{ $kandidat->noktp }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Tempat, Tanggal Lahir</label>
                            <div class="d-flex">
                                <input type="text" class="form-control" aria-describedby="basic-addon13" id="tempat" name="tempat" value="{{ $kandidat->tempat }}">
                                <input type="date" class="form-control" aria-describedby="basic-addon13" id="tgllahir" name="tgllahir" value="{{ $kandidat->tgllahir }}">
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="defaultSelect" class="form-label mt-4">Jenis Kelamin</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Laki-Laki" {{ $kandidat->jenkel == 'Laki-Laki' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Perempuan" {{ $kandidat->jenkel == 'Perempuan' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>

                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="agama">Agama</label>
                            <select class="form-select" id="agama" name="agama" aria-label="Default select example">
                                <option value="">Pilih</option>
                                <option value="Islam" {{$kandidat->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Katholik" {{$kandidat->agama == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                                <option value="Kristen Protestan" {{$kandidat->agama == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                <option value="Buddha" {{$kandidat->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Hindu" {{$kandidat->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Konghucu" {{$kandidat->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="goldar">Goldar</label>
                            <select class="form-select" id="goldar" name="goldar" aria-label="Default select example">
                                <option value="">Pilih</option>
                                <option value="A" {{ $kandidat->goldar == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $kandidat->goldar == 'B' ? 'selected' : '' }}>B</option>
                                <option value="AB" {{ $kandidat->goldar == 'AB' ? 'selected' : '' }}>AB</option>
                                <option value="O" {{ $kandidat->goldar == 'O' ? 'selected' : '' }}>O</option>
                            </select>
                        </div>
                        <div>
                            <label for="alamatktp" class="form-label mt-4">Alamat KTP</label>
                            <textarea class="form-control" id="alamatktp" name="alamatktp" rows="3">{{ $kandidat->alamat_ktp }}</textarea>
                        </div>
                        <div>
                            <label for="alamattinggal" class="form-label mt-4">Alamat Tinggal</label>
                            <textarea class="form-control" id="alamattinggal" name="alamattinggal" rows="3">{{ $kandidat->alamat_tinggal }}</textarea>
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">No. Telp</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="notelpon" name="notelpon" value="{{ $kandidat->notelpon }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label mt-4">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="{{ $kandidat->email }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">No Orang Terdekat Yang Dapat Dihubungi</label>
                            <input type="text" class="form-control" name="orgtrdkt"  aria-describedby="basic-addon13" value="{{ $kandidat->notelpon_tdkt }}">
                        </div>
                        <div>
                            <label for="skill" class="form-label mt-4">Skill</label>
                            <textarea class="form-control" id="skill" name="skill" rows="3">{{ $kandidat->skill }}</textarea>
                        </div>
                        <div class="input-group">
                            <label for="defaultSelect" class="form-label mt-4">Bersedia ditempatkan di seluruh kantor perusahaan</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="persetujuan" id="inlineRadio1" value="Ya" {{ $kandidat->persetujuan == 'Ya' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="persetujuan" id="inlineRadio2" value="Tidak" {{ $kandidat->persetujuan == 'Tidak' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Tidak</label>
                            </div>

                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Penghasilan yang diharapkan</label>
                            <input type="text" class="form-control" name="penghasilan"  aria-describedby="basic-addon13" value="{{ $kandidat->penghasilan }}">
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card mb-6">
                    <h5 class="card-header">Riwayat Pendidikan Terakhir</h5>
                    @if (optional($kandidat->pendidikan)->institusi)
                    <div class="card-body demo-vertical-spacing demo-only-element">

                        <div class="input-group">
                            <label class="form-label mt-4" for="jenjang">Jenjang Pendidikan Terakhir</label>
                            <select class="form-select" id="jenjang" name="jenjang" aria-label="Default select example">
                                <option value="">Pilih</option>
                                <option value="1" {{ optional($kandidat->pendidikan)->nama_pendidikan == '1' ? 'selected' : '' }}>SMP/MTS</option>
                                <option value="2" {{ optional($kandidat->pendidikan)->nama_pendidikan == '2' ? 'selected' : '' }}>SMA/SMK</option>
                                <option value="3" {{ optional($kandidat->pendidikan)->nama_pendidikan == '3' ? 'selected' : '' }}>S1 (Strata 1)</option>
                                <option value="4" {{ optional($kandidat->pendidikan)->nama_pendidikan == '4' ? 'selected' : '' }}>S2 (Strata 2)</option>
                                <option value="5" {{ optional($kandidat->pendidikan)->nama_pendidikan == '5' ? 'selected' : '' }}>S3 (Strata 3)</option>
                            </select>
                        </div>


                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Institusi</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="institusi" name="institusi" value="{{ $kandidat->pendidikan->institusi }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Jurusan</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="jurusan" name="jurusan" value="{{ $kandidat->pendidikan->jurusan }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Tahun Lulus</label>
                            <input type="text" class="form-control" aria-describedby="basic-addon13" id="tahun" name="tahun" value="{{ $kandidat->pendidikan->tahun }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">IPK</label>
                            <input type="text" class="form-control"  aria-describedby="basic-addon13" id="ipk" name="ipk" value="{{ $kandidat->pendidikan->ipk }}">
                        </div>




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
        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{ route('kandidat', $kandidat->id) }}" class="btn rounded-pill btn-primary me-2">Kembali</a>
                <button type="submit" class="btn rounded-pill btn-success">Simpan</button>
            </div>
        </div>

</div>


</form>


@endsection

