@extends('admin.main')
@section('title', 'Staff')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-5 border-0 shadow-sm rounded">
                            <h3 class="mx-auto">Edit Data Staff</h3>
                            <form action="{{ route('staff.update', $staff->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                            name="gambar" id="gambar">
                                    </div>
                                    <img src="{{ asset('storage/staff/' . $staff->gambar) }}" alt="gambar"
                                        style="width: 150px">


                                    <!-- error message untuk content -->
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
                                            name="nama" value="{{ old('nama', $staff->nama) }}"
                                            placeholder="Masukkan Nama Staff" id="nama">
                                    </div>

                                    <!-- error message untuk title -->
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
                                            name="jabatan" value="{{ old('jabatan', $staff->jabatan) }}"
                                            placeholder="Masukkan Jabatan Staff" id="jabatan">
                                    </div>

                                    <!-- error message untuk title -->
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
                                            name="nip" value="{{ old('nip', $staff->nip) }}"
                                            placeholder="Masukkan nip Staff" id="nip">
                                    </div>

                                    <!-- error message untuk title -->
                                    @error('nip')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-md btn-primary" style="background-color: #8c0c14; border:none">UPDATE</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
