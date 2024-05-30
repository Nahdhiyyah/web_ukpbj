@extends('admin.main')
@section('title', 'Staff')
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
                                        <h3>Staff</h3>
                                    </div>
                                    <div class="col">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('staff.create') }}" class="btn btn-md btn-success mb-3"
                                                style="background-color: #8C0C14; border:none">Buat
                                                Data Staff</a>
                                        </div>
                                    </div>
                                </div>
                                <table class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">NIP</th>
                                            <th scope="col" class="text-center" style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($staff as $item)
                                            @if ($item->is_deleted == 'no')
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td class="text-center">
                                                        <img src="{{ asset('/storage/staff/' . $item->gambar) }}"
                                                            class="rounded"
                                                            style="width: 150px; height:150px; object-fit:cover">
                                                    </td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->jabatan }}</td>
                                                    <td>{{ $item->nip }}</td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('staff.destroy', $item->id) }}" method="GET">

                                                            <a href="{{ route('staff.edit', $item->id) }}"
                                                                class="btn btn-sm btn-warning m-1" title="Edit Staff"
                                                                style="width: 75px">
                                                                Edit
                                                            </a>
                                                            {{-- @csrf
                                                        @method('DELETE') --}}
                                                            <button type="submit" class="btn btn-sm btn-danger m-1"
                                                                title="Hapus Staff" style="width: 75px">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @empty
                                            <div class="alert alert-danger">
                                                Staff belum Tersedia.
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
        </div>
    @endauth
@endsection
