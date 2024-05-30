@extends('admin.main')
@section('title', 'Create Berita')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="col-md-12">
                    <div class="card border-0 p-5 shadow-lg rounded p-5">
                        <h1 class="mx-auto">Buat Berita</h1>
                        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" value="{{ old('judul') }}" placeholder="Masukkan Judul Berita">
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
                                        placeholder="Tulis Isi Berita"></textarea>
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
                                        name="tanggal" placeholder="Masukkan Judul Berita">
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
                                        name="waktu" placeholder="Masukkan Judul Berita">
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
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-md btn-primary"
                                    style="background-color: #8C0C14; border:none">Tambah</button>
                                <button type="cancel" class="btn btn-md btn-warning">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <script>
                CKEDITOR.replace('content');
            </script>
        </div>
    @endauth
@endsection
