@extends('admin.main')
@section('title', 'Materi/Informasi')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 p-5 shadow rounded">
                            <h3 class="mx-auto">Edit Materi/Informasi</h3>
                            <div class="card-body">
                                <form action="{{ route('materi.update', $materi->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label class="font-weight-bold">FILE</label>
                                        <p>{{ $materi->file }}</p>
                                        <input type="file" id="file" class="form-control" name="file">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">KATEGORI</label>
                                        <select type="text" name="kategori" class="form-select" aria-label="Pilih Kategori">
                                            <option selected>{{ $materi->kategori }}</option>
                                            <option value="Materi">Materi</option>
                                            <option value="SDP">SDP</option>
                                        </select>

                                        <!-- error message untuk content -->
                                        @error('kategori')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">JUDUL</label>
                                        <input type="text" id="judul"
                                            class="form-control @error('judul') is-invalid @enderror" name="judul"
                                            value="{{ old('judul', $materi->judul) }}" placeholder="Masukkan Judul Materi">

                                        <!-- error message untuk title -->
                                        @error('judul')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">ISI</label>
                                        <textarea id="isi" class="form-control textarea @error('isi') is-invalid @enderror" name="isi" rows="5"
                                            placeholder="Masukkan Isi materi">{{ old('isi', $materi->isi) }}</textarea>

                                        <!-- error message untuk content -->
                                        @error('isi')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-md btn-primary" style="background-color: #8c0c14; border:none">UPDATE</button>
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
