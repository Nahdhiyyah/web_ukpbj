@extends('admin.main')
@section('title', 'Staff')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 p-5 shadow-sm rounded">
                            <h3 class="mx-auto">Buat Data Staff</h3>
                            <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                            name="gambar">
                                    </div>

                                    <!-- error message untuk title -->
                                    @error('gambar')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama" placeholder="Masukkan Nama Staff">
                                    </div>

                                    <!-- error message untuk judul -->
                                    @error('nama')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Jabatan</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                            name="jabatan" placeholder="Masukkan jabatan staff">
                                    </div>

                                    <!-- error message untuk judul -->
                                    @error('jabatan')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">NIP</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                            name="nip" placeholder="Masukkan NIP">
                                    </div>

                                    <!-- error message untuk judul -->
                                    @error('nip')
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
    @endauth
@endsection
