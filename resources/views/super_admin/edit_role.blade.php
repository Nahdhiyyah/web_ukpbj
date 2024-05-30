@extends('admin.main')
@section('title', 'Manage User')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container mt-5 mb-5" style="padding-top: 0.5cm">
                <div class="row">
                    {{-- <div class="col-md-12"> --}}
                    <div class="card border-0 p-3 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('manage.user.update', $manage_user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('/storage/users-avatar/' . $manage_user->avatar) }}"
                                            class="img-thumbnail" style="width: 200px; height:200px; object-fit: cover">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">User Name</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="judul"
                                                    value="{{ $manage_user->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Role User</label>
                                            <div class="col-md-10">
                                                <select class="form-select mb-3" aria-label=".form-select example"
                                                    name="role">
                                                    <option value="{{$manage_user->role}}" selected><strong>{{ $manage_user->role }}</strong></option>
                                                    <option value="super_admin">super_admin</option>
                                                    <option value="admin">admin</option>
                                                    <option value="user">user</option>
                                                </select>
                                            </div>

                                            <!-- error message untuk content -->
                                            @error('role')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-md btn-primary"
                                                style="background-color: #8C0C14; border:none">Update</button>
                                            <button type="cancel" class="btn btn-md btn-warning">Cancel</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    @endauth
@endsection
