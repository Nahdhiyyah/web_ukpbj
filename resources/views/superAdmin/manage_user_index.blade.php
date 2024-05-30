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
                                    <table class="table table-striped my-3" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Avatar</th>
                                                <th>Nama User</th>
                                                <th>Role</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @forelse ($manage_user as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        <img src="{{ asset('/storage/users-avatar/' . $item->avatar) }}" class="circle"
                                                            style="width: 50px; height:50px; border-radius: 50%; object-fit: cover">
                                                    </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->role }}</td>
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
        </body>
    @endauth
@endsection
