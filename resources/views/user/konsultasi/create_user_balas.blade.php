@extends('user.main')
@section('navbar')
    @auth
        <div class="container mt-5 mb-5" style="padding-top: 0.5cm">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body">
                                <form action="{{ route('store.balas.user', $user_balas->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-5 row">
                                        <label class="col-sm-2 col-form-label">Isi Balasan</label>
                                        <div class="col-md-10">
                                            <textarea type="text" class="form-control @error('balasan') is-invalid @enderror" name="balasan"
                                                placeholder="Tulis pesan balasan anda di sini"></textarea>
                                        </div>

                                        <!-- error message untuk title -->
                                        @error('balasan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-md btn-danger"
                                            style="background-color: #8C0C14; border:none">Kirim Balasan</button>
                                        <button type="cancel" class="btn btn-md btn-warning">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

        <script>
            CKEDITOR.replace('balasan');
        </script>
    @endauth
@endsection
