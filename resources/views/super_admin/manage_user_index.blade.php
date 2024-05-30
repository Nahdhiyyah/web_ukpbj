@extends('admin.main')
@section('title', 'Data User')
@section('content')
    @auth

        <body>
            <div class="content-wrapper">
                <div class="container-fluid" style="padding-top: 0.5cm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card p-2 shadow-md" style="border: none">
                                <div class="card-body table-responsive p-3">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h3>Data User</h3>
                                        </div>
                                    </div>
                                    <table class="table my-3" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Avatar</th>
                                                <th>Nama User</th>
                                                <th>No. Telp</th>
                                                <th>Role</th>
                                                <th class="text-center" style="width: 20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($manage_user as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        <img src="{{ asset('/storage/users-avatar/' . $item->avatar) }}"
                                                            class="circle"
                                                            style="width: 40px; height:40px; border-radius: 50%; object-fit: cover">
                                                    </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->no_telp }}</td>
                                                    <td>{{ $item->role }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('manage.user.edit', $item->id) }}" type="button"
                                                            class="btn btn-warning">
                                                            Edit Role User
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $('#example').DataTable();
                </script>

                <script>
                    //message with toastr
                    @if (session()->has('success'))

                        toastr.success('{{ session('success') }}', 'BERHASIL!');
                    @elseif (session()->has('error'))

                        toastr.error('{{ session('error') }}', 'GAGAL!');
                    @endif
                </script>
            </div>

        @endauth
    @endsection
