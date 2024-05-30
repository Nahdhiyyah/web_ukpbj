@extends('admin.main')
@section('title', 'Edit Gallery')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-5 border-0 shadow-sm rounded">
                            <h3 class="mx-auto">Edit Gallery</h3>
                            <form action="{{ route('gallery.update', $gallery->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                            name="judul" value="{{ old('judul', $gallery->judul) }}"
                                            placeholder="Masukkan Judul Gallery" id="judul">
                                    </div>

                                    <!-- error message untuk title -->
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
                                            name="tanggal" value="{{ old('tanggal', $gallery->tanggal) }}"
                                            placeholder="Masukkan Tanggal" id="judul">
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
                                            name="gambar" id="gambar">
                                    </div>
                                    <img src="{{ asset('storage/gallery/' . $gallery->gambar) }}" alt="gambar"
                                        style="width: 150px">


                                    <!-- error message untuk content -->
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
                                            name="kategori" value="{{ old('kategori', $gallery->kategori) }}" placeholder="Masukkan Kategori">
                                    </div>

                                    <!-- error message untuk judul -->
                                    @error('kategori')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-md btn-primary" style="background-color: #8c0c14; border:none">UPDATE</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
