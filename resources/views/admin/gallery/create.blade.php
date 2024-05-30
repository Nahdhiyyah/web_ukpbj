@extends('admin.main')
@section('title', 'Buat Gallery')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 p-5 shadow-sm rounded">
                            <h3 class="mx-auto">Buat Gallery</h3>
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
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            name="tanggal" placeholder="Masukkan Judul Post">
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
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                            name="kategori" placeholder="Masukkan Kategori">
                                    </div>

                                    <!-- error message untuk judul -->
                                    @error('kategori')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-md btn-primary" style="background-color: #8c0c14; border:none">Tambah</button>
                                    <button type="reset" class="btn btn-md btn-warning">Reset</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
