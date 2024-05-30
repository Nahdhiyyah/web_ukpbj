@extends('admin.main')
@section('title', 'Seputar Pengadaan')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container mt-5 mb-5" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body">
                                <form action="{{ route('pengadaan.store') }}" method="POST" enctype="multipart/form-data">

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
                                        <label class="font-weight-bold">JUDUL</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                            name="judul" value="{{ old('judul') }}"
                                            placeholder="Masukkan Judul Seputar Pengadaan" autocomplete="off">

                                        <!-- error message untuk title -->
                                        @error('judul')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">ISI</label>
                                        <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" rows="5"
                                            placeholder="Masukkan Isi Seputar Pengadaan" autocomplete="off">{{ old('isi') }}</textarea>

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

            <script src="js/app.js"></script>
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
            <script>
                CKEDITOR.replace('isi');
            </script>
        </div>
    @endauth
@endsection
