@extends('admin.main')
@section('title', 'Pengumuman')
@section('content')
    @auth            
    <div class="content-wrapper">
                <div class="container-fluid" style="padding-top: 0.5cm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-0 p-5 shadow p-5 rounded">
                                <h3 class="mx-auto">Edit Pengumuman</h3>
                                <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Judul</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                                name="judul" value="{{ old('judul', $pengumuman->judul) }}"
                                                placeholder="Masukkan Judul Pengumuman" id="judul">
                                        </div>

                                        <!-- error message untuk title -->
                                        @error('judul')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Isi</label>
                                        <div class="col-md-10">
                                            <textarea type="text" class="form-control textarea @error('isi') is-invalid @enderror" name="isi"
                                                value="{{ old('isi', $pengumuman->isi) }}" placeholder="Tulis Isi Pengumuman" id="isi">{{ $pengumuman->isi }}</textarea>
                                        </div>

                                        <!-- error message untuk title -->
                                        @error('isi')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-md-10">
                                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                                name="tanggal" value="{{ old('tanggal', $pengumuman->tanggal) }}"
                                                placeholder="Masukkan Tanggal" id="tanggal">
                                        </div>

                                        <!-- error message untuk content -->
                                        @error('tanggal')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Waktu</label>
                                        <div class="col-md-10">
                                            <input type="time" class="form-control @error('waktu') is-invalid @enderror"
                                                name="waktu" value="{{ old('waktu', $pengumuman->waktu) }}"
                                                placeholder="Masukkan Waktu" id="waktu">
                                        </div>

                                        <!-- error message untuk content -->
                                        @error('waktu')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Gambar</label>
                                        <div class="col-md-10">
                                            <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                                name="gambar" id="gambar">
                                        </div>
                                        <img src="{{ asset('storage/pengumuman/' . $pengumuman->gambar) }}" alt="gambar"
                                            style="width: 150px">


                                        <!-- error message untuk content -->
                                        @error('gambar')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Dokumen Sumber</label>
                                        <div class="col-md-10">
                                            <input type="file" class="form-control @error('document') is-invalid @enderror"
                                                name="document">
                                            <p style="font-size: 10pt"><i>Dokumen saat ini : <a
                                                        href="{{ asset('storage/document/' . $pengumuman->document) }}"
                                                        target="_blank">{{ $pengumuman->document }}</a></i></p>

                                        </div>

                                        <!-- error message untuk title -->
                                        @error('document')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-md btn-primary"
                                            style="background-color: #8C0C14; border:none">UPDATE</button>
                                        <button type="cancel" class="btn btn-md btn-warning">CANCEL</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    CKEDITOR.replace('isi');
                </script>
            </div>
    @endauth
@endsection
