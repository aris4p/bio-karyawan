@extends('layout.admin_main')

@section('body')
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

                            @if ($pekerjaan->isNotEmpty())
                            <div class="accordion mt-3" id="accordionExample">
                                @foreach ($pekerjaan as $index => $pekerjaan)
                                <div class="card accordion-item @if($index == 0) active @endif">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button type="button" class="accordion-button @if($index != 0) collapsed @endif" data-bs-toggle="collapse" data-bs-target="#accordion{{ $index }}" aria-expanded="@if($index == 0) true @endif" aria-controls="accordion{{ $index }}">
                                            {{ $pekerjaan->nama_perusahaan }}
                                        </button>
                                    </h2>
                                    <div id="accordion{{ $index }}" class="accordion-collapse collapse @if($index == 0) show @endif" data-bs-parent="#accordionExample">
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
                                                <form method="POST" action="{{ route('pekerjaan-destroy', $pekerjaan->id) }}" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
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
                    </div>
                </div>
            </div>
        </div>
@endsection
