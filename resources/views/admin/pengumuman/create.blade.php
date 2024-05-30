@extends('admin.main')
@section('title', 'Pengumuman')
@section('content')
    @auth
        <x-app-layout>
            <div class="content-wrapper">
                <div class="container mt-5 mb-5" style="padding-top: 0.5cm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-0 shadow-lg rounded">
                                <div class="card-body">
                                    <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">

                                        @csrf

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Judul</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                                    name="judul" value="{{ old('judul') }}"
                                                    placeholder="Masukkan Judul Pengumuman">
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
                                                    placeholder="Tulis Isi Pengumuman" maxlength=”100″ id="editor"></textarea>
                                                    {{-- <div type="text" class="form-control @error('isi') is-invalid @enderror" name="isi" id="editor">Tulis isi pengumuman</div> --}}
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
                                                    placeholder="Masukkan Judul Post">
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
                                                    name="waktu" placeholder="Masukkan Judul Post">
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
                                                    name="gambar">
                                            </div>

                                            <!-- error message untuk title -->
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
                                            </div>

                                            <!-- error message untuk title -->
                                            @error('document')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-md btn-primary">Tambah</button>
                                            <button type="cancel" class="btn btn-md btn-warning">Cancel</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="js/app.js"></script>
                <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

                <script>
                    CKEDITOR.replace('content');
                </script>
                <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>
            </div>
        </x-app-layout>
    @endauth
@endsection
