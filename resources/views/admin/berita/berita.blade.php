@extends('admin.main')
@section('title', 'Berita')
@section('content')
    @auth

        {{-- <body> --}}
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-2 shadow-lg" style="border: none">
                            <div class="card-body table-responsive p-3">
                                <div class="row">
                                    <div class="col">
                                        <h3>Berita</h3>
                                    </div>
                                    <div class="col">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('berita.create') }}" class="btn btn-md btn-success mb-3"
                                                style="background-color: #8C0C14; border:none">Buat
                                                Berita
                                                Baru</a>
                                        </div>
                                    </div>
                                </div>

                                <table class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kreator</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Waktu</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($berita as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><img src="{{ asset('/storage/users-avatar/' . $item->user->avatar) }}"
                                                        class="circle"
                                                        style="width: 30px; height:30px; border-radius: 50%; object-fit: cover">
                                                    {{ $item->user->name }}
                                                </td>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->waktu }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('berita.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('berita.show', $item->id) }}"
                                                            class="btn btn-sm btn-dark m-1" title="Lihat detail berita"
                                                            style="width: 75px">
                                                            Lihat
                                                        </a>
                                                        <a href="{{ route('berita.edit', $item->id) }}"
                                                            class="btn btn-sm btn-warning m-1" title="Edit berita"
                                                            style="width: 75px">
                                                            Edit
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger m-1"
                                                            title="Hapus berita" style="width: 75px">
                                                            Hapus
                                                        </button>
                                                    </form>
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
                //message with toastr
                @if (session()->has('success'))

                    toastr.success('{{ session('success') }}', 'BERHASIL!');
                @elseif (session()->has('error'))

                    toastr.error('{{ session('error') }}', 'GAGAL!');
                @endif
            </script>
            <script>
                $('#example').DataTable();
            </script>
        </div>
        {{-- </body> --}}

    @endauth
@endsection
