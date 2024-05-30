@extends('admin.main')
@section('title', 'Materi/Informasi')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col">
                        <div class="card border-0 p-5 shadow rounded">
                            <h3 class="mx-auto">Buat Materi/Informasi Baru</h3>

                            <div class="card-body">
                                <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label class="font-weight-bold">KATEGORI</label>
                                        <select type="text" name="kategori" class="form-select" aria-label="Pilih Kategori">
                                            <option selected><i>--Pilih Kategori--</i></option>
                                            <option value="Materi">Materi</option>
                                            <option value="SDP">SDP</option>
                                        </select>

                                        <!-- error message untuk title -->
                                        @error('kategori')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">JUDUL</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                            name="judul" value="{{ old('judul') }}" placeholder="Masukkan Judul Materi">

                                        <!-- error message untuk title -->
                                        @error('judul')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">ISI</label>
                                        <textarea class="form-control textarea @error('isi') is-invalid @enderror" name="isi" rows="5"
                                            placeholder="Masukkan Isi Materi">{{ old('isi') }}</textarea>

                                        <!-- error message untuk content -->
                                        @error('isi')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-md btn-primary" style="background-color: #8c0c14; border:none">SIMPAN</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </form>
                            </div>
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
