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
                                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">

                                        @csrf

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Judul</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                                    name="judul" placeholder="Masukkan Judul Post">
                                            </div>

                                            <!-- error message untuk judul -->
                                            @error('judul')
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
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-md btn-primary">Tambah</button>
                                            <button type="reset" class="btn btn-md btn-warning">Reset</button>
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
            </div>
        </x-app-layout>
    @endauth
@endsection
