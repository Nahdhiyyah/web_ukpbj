@extends('admin.main')
@section('title', 'Seputar Pengadaan')
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
                                        <h3>Seputar Pengadaan</h3>
                                    </div>
                                    <div class="col">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('pengadaan.create') }}"
                                                style="background-color: #8C0C14; border:none"
                                                class="btn btn-md btn-success mb-3">Buat
                                                Data Seputar Pengadaan</a>
                                        </div>
                                    </div>
                                </div>
                                <table class="table my-3" id="example" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">File</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Isi</th>
                                            <th scope="col" class="text-center" style="width: 20%">Action</th>
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
                                                            class="btn btn-sm btn-warning m-1" title="Edit seputar pengadaan" style="width: 75px">Edt
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger m-1" title="Hapus seputar pengadaan" style="width: 75px">
                                                            Hapus
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
