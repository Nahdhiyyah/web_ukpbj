@extends('admin.main')
@section('title', 'Edit Survey')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-5 border-0 shadow-sm rounded">
                            <h3 class="mx-auto">Edit Survey</h3>
                            <form action="{{ route('survey.update', $survey->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Judul Survey</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('judul_survey') is-invalid @enderror"
                                            name="judul_survey" value="{{ old('judul_survey', $survey->judul_survey) }}"
                                            placeholder="Masukkan judul survey" id="judul_survey">
                                    </div>

                                    <!-- error message untuk title -->
                                    @error('judul_survey')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('tanggal_buat') is-invalid @enderror"
                                            name="tanggal_buat" value="{{ old('tanggal_buat', $survey->tanggal_buat) }}"
                                            placeholder="Masukkan judul survey" id="tanggal_buat">
                                    </div>

                                    <!-- error message untuk title -->
                                    @error('tanggal_buat')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-md-10">

                                        <input type="radio" class="btn-check" name="status" id="primary-outlined"
                                            autocomplete="off" value="Active">
                                        <label class="btn btn-outline-primary" for="primary-outlined">Active <i
                                                class="fas fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="status" id="secondary-outlined"
                                            autocomplete="off" value="Not Active">
                                        <label class="btn btn-outline-secondary" for="secondary-outlined">Not Active <i
                                                class="fas fa-times"></i></label>

                                        <!-- error message untuk content -->
                                        @error('status')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-md btn-primary"
                                        style="background-color: #8c0c14; border:none">UPDATE</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
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
