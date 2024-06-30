@extends('layout.admin_main')
@section('body')
<form action="{{ route('profile-simpan') }}" method="POST">
    @csrf

    <div class="col-xl-12">
        <div class="card-body">
            <div class="row mt-3 mb-2">
                <div class="col-md-12 d-flex justify-content-end">
                    <a href="{{ route('profile-edit') }}" class="btn rounded-pill btn-primary me-2">Edit</a>

                </div>
            </div>
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
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="posisi" name="posisi" value="{{ auth()->user()->posisi }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Nama</label>
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="nama" name="nama" value="{{ auth()->user()->nama }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">No. KTP</label>
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="noktp" name="noktp" value="{{ auth()->user()->noktp }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Tempat, Tanggal Lahir</label>
                            <div class="d-flex">
                                <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="tempat" name="tempat" value="{{ auth()->user()->tempat }}">
                                <input type="date" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="tgllahir" name="tgllahir" value="{{ auth()->user()->tgllahir }}">
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="defaultSelect" class="form-label mt-4">Jenis Kelamin</label>
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="gender" name="gender" value="{{ auth()->user()->jenkel }}">


                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="agama">Agama</label>
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="agama" name="agama" value="{{ auth()->user()->agama }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="goldar">Goldar</label>
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="goldar" name="goldar" value="{{ auth()->user()->goldar }}">
                        </div>
                        <div>
                            <label for="alamatktp" class="form-label mt-4">Alamat KTP</label>
                            <textarea class="form-control-plaintext" readonly id="alamatktp" name="alamatktp" rows="3">{{ auth()->user()->alamat_ktp }}</textarea>
                        </div>
                        <div>
                            <label for="alamattinggal" class="form-label mt-4">Alamat Tinggal</label>
                            <textarea class="form-control-plaintext" readonly id="alamattinggal" name="alamattinggal" rows="3">{{ auth()->user()->alamat_tinggal }}</textarea>
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">No. Telp</label>
                            <input type="text" class="form-control-plaintext" readonly  aria-describedby="basic-addon13" id="notelpon" name="notelpon" value="{{ auth()->user()->notelpon }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label mt-4">Email</label>
                            <input type="email" class="form-control-plaintext" readonly id="email" placeholder="name@example.com" name="email" value="{{ auth()->user()->email }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">No Orang Terdekat Yang Dapat Dihubungi</label>
                            <input type="text" class="form-control-plaintext" readonly name="orgtrdkt"  aria-describedby="basic-addon13" value="{{ auth()->user()->notelpon_tdkt }}">
                        </div>
                        <div>
                            <label for="skill" class="form-label mt-4">Skill</label>
                            <textarea class="form-control-plaintext" readonly id="skill" name="skill" rows="3">{{ auth()->user()->skill }}</textarea>
                        </div>
                        <div class="input-group">
                            <label for="defaultSelect" class="form-label mt-4">Bersedia ditempatkan di seluruh kantor perusahaan</label>
                            <input type="text" class="form-control-plaintext" readonly name="persetujuan"  aria-describedby="basic-addon13" value="{{ auth()->user()->persetujuan }}">

                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Penghasilan yang diharapkan</label>
                            <input type="text" class="form-control-plaintext" readonly name="penghasilan"  aria-describedby="basic-addon13" value="{{ auth()->user()->penghasilan }}">
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card mb-6">
                    <h5 class="card-header">Riwayat Pendidikan Terakhir</h5>
                    @if (optional(auth()->user()->pendidikan)->institusi)
                    <div class="card-body demo-vertical-spacing demo-only-element">


                        <div class="input-group">
                            <label class="form-label mt-4" for="jenjang">Jenjang Pendidikan Terakhir</label>
                            <select class="form-select" id="jenjang" name="jenjang_display" aria-label="Default select example" disabled>
                                <option value="">Pilih</option>
                                <option value="1" {{ optional(auth()->user()->pendidikan)->nama_pendidikan == '1' ? 'selected' : '' }}>SMP/MTS</option>
                                <option value="2" {{ optional(auth()->user()->pendidikan)->nama_pendidikan == '2' ? 'selected' : '' }}>SMA/SMK</option>
                                <option value="3" {{ optional(auth()->user()->pendidikan)->nama_pendidikan == '3' ? 'selected' : '' }}>S1 (Strata 1)</option>
                                <option value="4" {{ optional(auth()->user()->pendidikan)->nama_pendidikan == '4' ? 'selected' : '' }}>S2 (Strata 2)</option>
                                <option value="5" {{ optional(auth()->user()->pendidikan)->nama_pendidikan == '5' ? 'selected' : '' }}>S3 (Strata 3)</option>
                            </select>
                            <!-- Hidden input to hold the actual value -->
                            <input type="hidden" id="jenjang" name="jenjang" value="{{ optional(auth()->user()->pendidikan)->nama_pendidikan }}">
                        </div>


                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Institusi</label>
                            <input type="text" class="form-control-plaintext" readonly  aria-describedby="basic-addon13" id="institusi" name="institusi" value="{{ auth()->user()->pendidikan->institusi }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Jurusan</label>
                            <input type="text" class="form-control-plaintext" readonly  aria-describedby="basic-addon13" id="jurusan" name="jurusan" value="{{ auth()->user()->pendidikan->jurusan }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Tahun Lulus</label>
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="tahun" name="tahun" value="{{ auth()->user()->pendidikan->tahun }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">IPK</label>
                            <input type="text" class="form-control-plaintext" readonly  aria-describedby="basic-addon13" id="ipk" name="ipk" value="{{ auth()->user()->pendidikan->ipk }}">
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

</div>


</form>


@endsection

