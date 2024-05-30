@extends('admin.main')
@section('title', 'Seputar Pengadaan')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container mt-5 mb-5" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body table-responsive p-3">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ route('pengadaan.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                            SEPUTAR PENGADAAN</a>
                                    </div>
                                </div>
                                <table class="table table-striped my-3" id="example" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">FILE</th>
                                            <th scope="col">JUDUL</th>
                                            <th scope="col">ISI</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($pengadaans as $pengadaan)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td class="text-center">
                                                    <p>{{ $pengadaan->file }}</p>
                                                </td>
                                                <td>{{ $pengadaan->judul }}</td>
                                                <td>{!! $pengadaan->isi !!}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('pengadaan.destroy', $pengadaan->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('pengadaan.edit', $pengadaan->id) }}"
                                                            class="btn"><svg xmlns="http://www.w3.org/2000/svg"
                                                                height="1em" style="fill: #ffd60a"
                                                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                <path
                                                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                            </svg>
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                                style="fill: #ac0101"
                                                                viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                <path
                                                                    d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Seputar Pengadaan belum Tersedia.
                                            </div>
                                        @endforelse
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
        </div>
    @endauth
@endsection
