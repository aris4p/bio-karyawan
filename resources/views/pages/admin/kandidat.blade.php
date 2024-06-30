@extends('layout.admin_main')
@section('body')
<form action="{{ route('profile-simpan') }}" method="POST">
    @csrf

    <div class="col-xl-12">
        <div class="card-body">
            <div class="row mt-3 mb-2">
                <div class="col-md-12 d-flex justify-content-end">
                    <a href="{{ route('kandidat-edit', $kandidat->id) }}" class="btn rounded-pill btn-primary me-2">Edit</a>

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
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="posisi" name="posisi" value="{{ $kandidat->posisi }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Nama</label>
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="nama" name="nama" value="{{ $kandidat->nama }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">No. KTP</label>
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="noktp" name="noktp" value="{{ $kandidat->noktp }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Tempat, Tanggal Lahir</label>
                            <div class="d-flex">
                                <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="tempat" name="tempat" value="{{ $kandidat->tempat }}">
                                <input type="date" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="tgllahir" name="tgllahir" value="{{ $kandidat->tgllahir }}">
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="defaultSelect" class="form-label mt-4">Jenis Kelamin</label>
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="gender" name="gender" value="{{ $kandidat->jenkel }}">


                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="agama">Agama</label>
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="agama" name="agama" value="{{ $kandidat->agama }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="goldar">Goldar</label>
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="goldar" name="goldar" value="{{ $kandidat->goldar }}">
                        </div>
                        <div>
                            <label for="alamatktp" class="form-label mt-4">Alamat KTP</label>
                            <textarea class="form-control-plaintext" readonly id="alamatktp" name="alamatktp" rows="3">{{ $kandidat->alamat_ktp }}</textarea>
                        </div>
                        <div>
                            <label for="alamattinggal" class="form-label mt-4">Alamat Tinggal</label>
                            <textarea class="form-control-plaintext" readonly id="alamattinggal" name="alamattinggal" rows="3">{{ $kandidat->alamat_tinggal }}</textarea>
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">No. Telp</label>
                            <input type="text" class="form-control-plaintext" readonly  aria-describedby="basic-addon13" id="notelpon" name="notelpon" value="{{ $kandidat->notelpon }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label mt-4">Email</label>
                            <input type="email" class="form-control-plaintext" readonly id="email" placeholder="name@example.com" name="email" value="{{ $kandidat->email }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">No Orang Terdekat Yang Dapat Dihubungi</label>
                            <input type="text" class="form-control-plaintext" readonly name="orgtrdkt"  aria-describedby="basic-addon13" value="{{ $kandidat->notelpon_tdkt }}">
                        </div>
                        <div>
                            <label for="skill" class="form-label mt-4">Skill</label>
                            <textarea class="form-control-plaintext" readonly id="skill" name="skill" rows="3">{{ $kandidat->skill }}</textarea>
                        </div>
                        <div class="input-group">
                            <label for="defaultSelect" class="form-label mt-4">Bersedia ditempatkan di seluruh kantor perusahaan</label>
                            <input type="text" class="form-control-plaintext" readonly name="persetujuan"  aria-describedby="basic-addon13" value="{{ $kandidat->persetujuan }}">

                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Penghasilan yang diharapkan</label>
                            <input type="text" class="form-control-plaintext" readonly name="penghasilan"  aria-describedby="basic-addon13" value="{{ $kandidat->penghasilan }}">
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
                            <select class="form-select" id="jenjang" name="jenjang_display" aria-label="Default select example" disabled>
                                <option value="">Pilih</option>
                                <option value="1" {{ optional($kandidat->pendidikan)->nama_pendidikan == '1' ? 'selected' : '' }}>SMP/MTS</option>
                                <option value="2" {{ optional($kandidat->pendidikan)->nama_pendidikan == '2' ? 'selected' : '' }}>SMA/SMK</option>
                                <option value="3" {{ optional($kandidat->pendidikan)->nama_pendidikan == '3' ? 'selected' : '' }}>S1 (Strata 1)</option>
                                <option value="4" {{ optional($kandidat->pendidikan)->nama_pendidikan == '4' ? 'selected' : '' }}>S2 (Strata 2)</option>
                                <option value="5" {{ optional($kandidat->pendidikan)->nama_pendidikan == '5' ? 'selected' : '' }}>S3 (Strata 3)</option>
                            </select>
                            <!-- Hidden input to hold the actual value -->
                            <input type="hidden" id="jenjang" name="jenjang" value="{{ optional($kandidat->pendidikan)->nama_pendidikan }}">
                        </div>


                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Institusi</label>
                            <input type="text" class="form-control-plaintext" readonly  aria-describedby="basic-addon13" id="institusi" name="institusi" value="{{ $kandidat->pendidikan->institusi }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Jurusan</label>
                            <input type="text" class="form-control-plaintext" readonly  aria-describedby="basic-addon13" id="jurusan" name="jurusan" value="{{ $kandidat->pendidikan->jurusan }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">Tahun Lulus</label>
                            <input type="text" class="form-control-plaintext" readonly aria-describedby="basic-addon13" id="tahun" name="tahun" value="{{ $kandidat->pendidikan->tahun }}">
                        </div>
                        <div class="input-group">
                            <label class="form-label mt-4" for="basic-default-password32">IPK</label>
                            <input type="text" class="form-control-plaintext" readonly  aria-describedby="basic-addon13" id="ipk" name="ipk" value="{{ $kandidat->pendidikan->ipk }}">
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

                <div class="card mb-6">
                    <h5 class="card-header">Riwayat Pekerjaan</h5>

                    @if ($kandidat->pekerjaan->isNotEmpty())
                    <div class="accordion mt-3" id="pekerjaanAccordion">
                        @foreach ($kandidat->pekerjaan as $index => $pekerjaan)
                        <div class="card accordion-item @if($index == 0) active @endif">
                            <h2 class="accordion-header" id="pekerjaanHeading{{ $index }}">
                                <button type="button" class="accordion-button @if($index != 0) collapsed @endif" data-bs-toggle="collapse" data-bs-target="#pekerjaanAccordion{{ $index }}" aria-expanded="@if($index == 0) true @endif" aria-controls="pekerjaanAccordion{{ $index }}">
                                    {{ $pekerjaan->nama_perusahaan }}
                                </button>
                            </h2>
                            <div id="pekerjaanAccordion{{ $index }}" class="accordion-collapse collapse @if($index == 0) show @endif" data-bs-parent="#pekerjaanAccordion">
                                <div class="accordion-body">
                                    <div class="input-group">
                                        <label class="form-label mt-4" for="namaperusahaan{{ $index }}">Nama Perusahaan</label>
                                        <input type="text" class="form-control-plaintext" readonly id="namaperusahaan{{ $index }}" name="namaperusahaan" value="{{ $pekerjaan->nama_perusahaan }}">
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label mt-4" for="posisiterakhir{{ $index }}">Posisi Terakhir</label>
                                        <input type="text" class="form-control-plaintext" readonly id="posisiterakhir{{ $index }}" name="posisiterakhir" value="{{ $pekerjaan->posisi_terakhir }}">
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label mt-4" for="pendapatanterakhir{{ $index }}">Pendapatan Terakhir</label>
                                        <input type="text" class="form-control-plaintext" readonly id="pendapatanterakhir{{ $index }}" name="pendapatanterakhir" value="{{ $pekerjaan->pendapatan_terakhir }}">
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label mt-4" for="tahun{{ $index }}">Tahun</label>
                                        <input type="text" class="form-control-plaintext" readonly id="tahun{{ $index }}" name="tahun" value="{{ $pekerjaan->tahun }}">
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-end mt-3">
                                        <a href="{{ route('pekerjaan-edit', $pekerjaan->id) }}" class="btn btn-primary me-2">Edit</a>
                                        <form method="POST" action="{{ route('kandidat-hapus-pekerjaan', $pekerjaan->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $kandidat->id }}">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pekerjaan ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @else
                    <div class="data-tidak-ada" style="color: red; font-size: 18px; text-align: center; padding: 20px; border: 2px dashed red; margin: 20px;">
                        Data tidak ada
                    </div>
                    @endif
                </div>

                <div class="card mb-6">
                    <h5 class="card-header">Riwayat Pelatihan</h5>

                    @if ($kandidat->pelatihan->isNotEmpty())
                    <div class="accordion mt-3" id="pelatihanAccordion">
                        @foreach ($kandidat->pelatihan as $index => $pelatihan)
                        <div class="card accordion-item @if($index == 0) active @endif">
                            <h2 class="accordion-header" id="pelatihanHeading{{ $index }}">
                                <button type="button" class="accordion-button @if($index != 0) collapsed @endif" data-bs-toggle="collapse" data-bs-target="#pelatihanAccordion{{ $index }}" aria-expanded="@if($index == 0) true @endif" aria-controls="pelatihanAccordion{{ $index }}">
                                    {{ $pelatihan->nama_pelatihan }}
                                </button>
                            </h2>
                            <div id="pelatihanAccordion{{ $index }}" class="accordion-collapse collapse @if($index == 0) show @endif" data-bs-parent="#pelatihanAccordion">
                                <div class="accordion-body">
                                    <div class="input-group">
                                        <label class="form-label mt-4" for="namapelatihan{{ $index }}">Nama Pelatihan/kursus</label>
                                        <input type="text" class="form-control-plaintext" readonly id="namapelatihan{{ $index }}" name="namapelatihan" value="{{ $pelatihan->nama_pelatihan }}">
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label mt-4" for="sertifikat{{ $index }}">Sertifikat</label>
                                        <input type="text" class="form-control-plaintext" readonly id="sertifikat{{ $index }}" name="sertifikat" value="{{ $pelatihan->sertifikat }}">
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label mt-4" for="tahun{{ $index }}">Tahun</label>
                                        <input type="text" class="form-control-plaintext" readonly id="tahun{{ $index }}" name="tahun" value="{{ $pelatihan->tahun }}">
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-end mt-3">
                                        <a href="{{ route('pelatihan-edit', $pelatihan->id) }}" class="btn btn-primary me-2">Edit</a>
                                        <form method="POST" action="{{ route('kandidat-hapus-pelatihan', $pelatihan->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $kandidat->id }}">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pelatihan ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @else
                    <div class="data-tidak-ada" style="color: red; font-size: 18px; text-align: center; padding: 20px; border: 2px dashed red; margin: 20px;">
                        Data tidak ada
                    </div>
                    @endif
                </div>

            </div>
        </div>

</div>


</form>


@endsection

