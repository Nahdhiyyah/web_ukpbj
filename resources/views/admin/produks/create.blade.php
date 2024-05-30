@extends('admin.main')
@section('title', 'Pengumuman')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container mt-5 mb-5" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body">
                                <form action="{{ route('prohum.store') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <div class="form-group">
                                        <label class="font-weight-bold">FILE</label>
                                        <input type="file" class="form-control @error('file') is-invalid @enderror"
                                            name="file">

                                        <!-- error message untuk title -->
                                        @error('file')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Kategori</label>
                                        <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                            name="kategori" value="{{ old('kategori') }}"
                                            placeholder="Masukkan Kategori Produk Hukum" autocomplete="off">

                                        <!-- error message untuk title -->
                                        @error('kategori')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Nomor</label>
                                        <input type="text" class="form-control @error('nomor') is-invalid @enderror"
                                            name="nomor" value="{{ old('namor') }}" placeholder="Masukkan Nomor Produk Hukum"
                                            autocomplete="off">

                                        <!-- error message untuk title -->
                                        @error('nomor')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Tahun</label>
                                        <input type="date('Y')" class="form-control @error('tahun') is-invalid @enderror"
                                            name="tahun" value="{{ old('tahun') }}" placeholder="Masukkan Tahun Produk Hukum"
                                            autocomplete="off">

                                        <!-- error message untuk title -->
                                        @error('tahun')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">ISI</label>
                                        <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" rows="5"
                                            placeholder="Masukkan Isi Produk Hukum" autocomplete="off">{{ old('isi') }}</textarea>

                                        <!-- error message untuk content -->
                                        @error('isi')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
            <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('isi');
            </script>
        </div>
    @endauth
@endsection
