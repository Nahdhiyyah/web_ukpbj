@extends('admin.main')
@section('title', 'Edit Status')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container mt-5 mb-5" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow-lg rounded">
                            <div class="card-body">
                                <form action="{{ route('status.update', $admin_konsul->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Subjek</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('subjek') is-invalid @enderror"
                                                name="subjek" value="{{ old('subjek', $admin_konsul->subjek) }}"
                                                placeholder="Subjek Konsultasi" id="subjek">
                                        </div>

                                        <!-- error message untuk title -->
                                        @error('subjek')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Message</label>
                                        <div class="col-md-10">
                                            <textarea type="text" autocomplete="off" class="form-control textarea @error('message') is-invalid @enderror"
                                                name="message" value="{{ old('message', $admin_konsul->message) }}" placeholder="Apa yang ingin anda konsultasikan?"
                                                id="message">{{ $admin_konsul->message }}</textarea>
                                        </div>

                                        <!-- error message untuk title -->
                                        @error('message')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Attachment</label>
                                        <div class="col-md-10">
                                            <input type="file" class="form-control @error('attachment') is-invalid @enderror"
                                                name="attachment" id="attachment">

                                            <small> <i class="fas fa-paperclip"></i>
                                                <a href="{{ asset('/storage/konsultasi/' . $admin_konsul->attachment) }}"
                                                    target="_blank" style="color: #8C0C14">{{ $admin_konsul->attachment }}</a>
                                            </small>
                                        </div>

                                        <!-- error message untuk content -->
                                        @error('attachment')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-md-10">
                                            <select class="form-select mb-3" aria-label=".form-select-lg example" name="status">
                                                {{-- <option selected>{{ $admin_konsul->status }}</option> --}}
                                                <option value="Belum diproses">Belum diproses</option>
                                                <option value="Sedang diproses">Sedang diproses</option>
                                                <option value="Sudah diproses">Sudah diproses</option>
                                            </select>
                                        </div>

                                        <!-- error message untuk content -->
                                        @error('status')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                        <button type="cancel" class="btn btn-md btn-warning">CANCEL</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('content');
            </script>
        </div>

    @endauth
@endsection
