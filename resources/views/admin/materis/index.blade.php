@extends('admin.main')
@section('title', 'Materi/Informasi')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body table-responsive p-3">
                                <div class="row">
                                    <div class="col">
                                        <h3>Materi/Informasi</h3>
                                    </div>
                                    <div class="col">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('materi.create') }}" class="btn btn-md btn-success mb-3"
                                                style="background-color: #8C0C14; border:none">Buat Data
                                                Materi/Informasi</a>
                                        </div>
                                    </div>
                                </div>
                                <table class="table my-3" id="example" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">File</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Isi</th>
                                            <th scope="col" class="text-center" style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($materis as $materi)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    {{-- <img src="{{ Storage::url('public/materis/').$materi->file }}" class="rounded" style="width: 150px"> --}}
                                                    <p>{{ $materi->file }}</p>
                                                </td>
                                                <td>{{ $materi->kategori }}</td>
                                                <td>{{ $materi->judul }}</td>
                                                <td>{!! $materi->isi !!}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('materi.destroy', $materi->id) }}" method="POST">
                                                        <a href="{{ route('materi.edit', $materi->id) }}"
                                                            class="btn btn-sm btn-warning m-1" title="Edit materi"
                                                            style="width: 75px">Edit
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger m-1"
                                                            title="Hapus materi" style="width: 75px">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Materi/Informasi belum Tersedia.
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
    @endauth
@endsection
