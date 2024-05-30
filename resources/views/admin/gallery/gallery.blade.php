@extends('admin.main')
@section('title', 'Gallery')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-2 shadow" style="border: none">
                            <div class="card-body table-responsive p-3">
                                <div class="row">
                                    <div class="col">
                                        <h3>Gallery</h3>
                                    </div>
                                    <div class="col">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('gallery.create') }}" class="btn btn-md btn-success mb-3"
                                                style="background-color: #8C0C14; border:none">Buat
                                                Gallery</a>
                                        </div>
                                    </div>
                                </div>
                                <table class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col" class="text-center" style="width: 30%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($gallery as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td class="text-center">
                                                    <img src="{{ asset('/storage/gallery/' . $item->gambar) }}" class="rounded"
                                                        style="width: 150px">
                                                </td>
                                                <td>{{$item->kategori}}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('gallery.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('gallery.show', $item->id) }}"
                                                            class="btn btn-sm btn-dark m-1" title="Lihat detail gallery"
                                                            style="width: 75px">
                                                            Lihat
                                                        </a>
                                                        <a href="{{ route('gallery.edit', $item->id) }}"
                                                            class="btn btn-sm btn-warning m-1" title="Lihat detail berita"
                                                            style="width: 75px">
                                                            Edit
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger m-1"
                                                            title="Lihat detail berita" style="width: 75px">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Gallery belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- {{ $gallery->links() }} --}}
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
