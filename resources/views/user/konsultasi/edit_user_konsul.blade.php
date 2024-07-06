@extends('user.main')
{{-- @section('title', 'Edit Berita') --}}
@section('navbar')
    @auth
        <div class="content-wrapper">
            <div class="container mt-5 mb-5" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        {{-- <div class="alert alert-light" role="alert">
                            <h5>Edit Berita</h5>
                        </div> --}}
                        <div class="card border-0 shadow-lg rounded">
                            <div class="card-body">
                                <form action="{{ route('update.konsul.user', $user_konsul->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Subjek</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('subjek') is-invalid @enderror"
                                                name="subjek" value="{{ old('subjek', $user_konsul->subjek) }}"
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
                                        <label class="col-sm-2 col-form-label">Isi</label>
                                        <div class="col-md-10">
                                            <textarea type="text" autocomplete="off" class="form-control textarea @error('isi') is-invalid @enderror"
                                                name="isi" value="{{ old('isi', $user_konsul->isi) }}" placeholder="Apa yang ingin anda konsultasikan?"
                                                id="isi">{{ $user_konsul->isi }}</textarea>
                                        </div>

                                        <!-- error message untuk title -->
                                        @error('isi')
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
                                                @if ($user_konsul->attachment == 1)
                                                    <a href="{{ asset('/storage/konsultasi/' . $user_konsul->attachment) }}"
                                                        target="_blank"
                                                        style="color: #8C0C14">{{ $user_konsul->attachment }}</a>
                                                    </p>
                                                @else
                                                    <small><i>{{ $user_konsul->attachment }}</i></small>
                                                @endif
                                            </small>
                                        </div>

                                        <!-- error message untuk content -->
                                        @error('attachment')
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

            <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('isi');
            </script>
        </div>

    @endauth
@endsection
