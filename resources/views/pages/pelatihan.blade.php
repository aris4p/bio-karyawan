@extends('layout.admin_main')

@section('body')
        <div class="col-xl-12">
            <div class="card-body">
                <div class="row mt-3 mb-2">
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{ route('pelatihan-tambah') }}" class="btn rounded-pill btn-primary me-2">Tambah</a>
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
                            <h5 class="card-header">Riwayat Pelatihan</h5>

                            @if ($pelatihan->isNotEmpty())
                            <div class="accordion mt-3" id="accordionExample">
                                @foreach ($pelatihan as $index => $pelatihan)
                                <div class="card accordion-item @if($index == 0) active @endif">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button type="button" class="accordion-button @if($index != 0) collapsed @endif" data-bs-toggle="collapse" data-bs-target="#accordion{{ $index }}" aria-expanded="@if($index == 0) true @endif" aria-controls="accordion{{ $index }}">
                                            {{ $pelatihan->nama_pelatihan }}
                                        </button>
                                    </h2>
                                    <div id="accordion{{ $index }}" class="accordion-collapse collapse @if($index == 0) show @endif" data-bs-parent="#accordionExample">
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
                                                <form method="POST" action="{{ route('pelatihan-destroy', $pelatihan->id) }}" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
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
        </div>
@endsection
