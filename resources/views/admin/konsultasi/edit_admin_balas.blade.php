@extends('admin.main')
@section('title', 'Edit Balasan')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow-lg rounded">
                            <div class="card-body">
                                <form action="{{ route('balasan.update', $admin_konsul->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row">
                                        @foreach ($admin_balas as $item)
                                            <label class="col-sm-2 col-form-label">Balasan</label>
                                            <div class="col-md-10">
                                                <textarea type="text" class="form-control @error('balasan') is-invalid @enderror" name="balasan"
                                                    value="{{ old('balasan', $item->balasan) }}" placeholder="Apa yang ingin anda konsultasikan?" id="balasan">{{ $item->balasan }}</textarea>
                                            </div>

                                            <!-- error message untuk title -->
                                            @error('balasan')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endforeach
                                    </div>

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-md btn-primary"
                                            style="background-color: #8c0c14; border: none">UPDATE</button>
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
                CKEDITOR.replace('balasan');
            </script>
        </div>

    @endauth
@endsection
