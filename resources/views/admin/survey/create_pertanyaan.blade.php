@extends('admin.main')
@section('title', 'Buat Pertanyaan Survey')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 p-5 shadow-sm rounded">
                            <h3 class="mx-auto mb-3">Buat Pertanyaan</h3>
                            <form action="{{ route('pertanyaan.store', $survey->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Pertanyaan : </label>
                                    <div class="col-md-10">
                                        <textarea type="text" class="form-control textarea @error('pertanyaan') is-invalid @enderror" name="pertanyaan"
                                            placeholder="Masukkan Pertanyaan Survey"></textarea>
                                    </div>

                                    <!-- error message untuk judul -->
                                    @error('pertanyaan')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Jenis Pertanyaan</label>
                                    <div class="col-md-10">
                                        <select class="form-select mb-3" aria-label=".form-select example" name="jenis">
                                            <option value="Pilihan ganda">Pilihan ganda</option>
                                            <option value="Isian">Isian</option>
                                        </select>
                                    </div>

                                    <!-- error message untuk content -->
                                    @error('jenis')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-md btn-primary"
                                        style="background-color: #8c0c14; border:none">Tambah</button>
                                    <button type="reset" class="btn btn-md btn-warning">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            CKEDITOR.replace('pertanyaan');
        </script>
    @endauth
@endsection
