@extends('user.main')
@section('navbar')
    @auth
        <div class="container mt-5 mb-5" style="padding-top: 0.5cm">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-lg rounded">
                        <div class="card-body">
                            <form action="{{ route('store.pengaduan.user') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                            name="judul" placeholder="Apa yang ingin anda adukan">
                                    </div>

                                    <!-- error message untuk title -->
                                    @error('judul')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Isi Pengaduan</label>
                                    <div class="col-md-10">
                                        <textarea type="text" class="form-control textarea @error('isi') is-invalid @enderror" name="isi"
                                            placeholder="Apa yang ingin anda adukan?"></textarea>
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
                                            name="attachment">
                                    </div>

                                    <!-- error message untuk title -->
                                    @error('attachment')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-md btn-danger"
                                        style="background-color: #8C0C14; border:none">Adukan</button>
                                    <button type="cancel" class="btn btn-md btn-warning">Cancel</button>
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
    @endauth
@endsection
