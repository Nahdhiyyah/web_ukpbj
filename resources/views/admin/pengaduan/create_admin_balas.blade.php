@extends('admin.main')
@section('title', 'Buat Balasan Pengaduan')
@section('content')
    @auth
        <div class="container-fluid" style="padding-top: 0.5cm">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body">
                                <form action="{{ route('store.balaspengaduan.admin', $balasan->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Isi Pengaduan</label>
                                        <div class="col-md-10">
                                            <div class="alert alert-success" role="alert">
                                                {!! html_entity_decode($balasan->isi)!!}
                                              </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
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

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-md-10">
                                            <select class="form-select mb-3" aria-label=".form-select example" name="status">
                                                <option value="Sedang diproses">Sedang diproses</option>
                                                <option value="Selesai">Selesai</option>
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
                                        <button type="submit" class="btn btn-md btn-primary"
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
