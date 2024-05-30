@extends('admin.main')
@section('title', 'Pengumuman')
@section('content')
    @auth
        <x-app-layout>
            <div class="content-wrapper">
                <div class="container mt-5 mb-5" style="padding-top: 0.5cm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-0 shadow-sm rounded">
                                <div class="card-body">
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
                                                <textarea type="text" class="form-control @error('isi') is-invalid @enderror" name="isi"
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
                                                <input type="date"
                                                    class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                                    value="{{ old('tanggal', $pengumuman->tanggal) }}"
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
                                                <input type="file"
                                                    class="form-control @error('document') is-invalid @enderror"
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
                                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                            <button type="cancel" class="btn btn-md btn-warning">CANCEL</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
                <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

                <script>
                    CKEDITOR.replace('content');
                </script>
            </div>
        </x-app-layout>
    @endauth
@endsection
