@extends('admin.main')
@section('title', 'Buat Survey')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 p-5 shadow-sm rounded">
                            <h3 class="mx-auto mb-3">Buat Survey</h3>
                            <form action="{{ route('survey.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Judul Survey : </label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('judul_survey') is-invalid @enderror"
                                            name="judul_survey" placeholder="Masukkan Judul Survey">
                                    </div>

                                    <!-- error message untuk judul -->
                                    @error('judul_survey')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Tanggal Buat : </label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control @error('tanggal_buat') is-invalid @enderror"
                                            name="tanggal_buat" placeholder="Masukkan tanggal">
                                    </div>

                                    <!-- error message untuk judul -->
                                    @error('tanggal_buat')
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
