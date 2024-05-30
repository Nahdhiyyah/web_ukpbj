@extends('admin.main')
@section('title', 'Konsultasi')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-2 shadow-md" style="border: none">
                            <div class="card-body table-responsive p-3">
                                <div class="row">
                                    <div class="col">
                                        <h3>Konsultasi</h3>
                                    </div>
                                    <div class="col">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('rekap.konsul') }}" class="btn btn-md btn-success mb-3"
                                                style="background-color: #8C0C14; border:none">Rekapitulasi Konsultasi</a>
                                        </div>
                                    </div>
                                </div>
                                <table id="example" class="table" style="width:100%;">
                                    <thead class="table">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama User</th>
                                            <th>Subjek</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th style="width: 30%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table">
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($admin_konsul as $item)
                                            @if ($item->is_deleted == 'no')
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td><img src="{{ asset('/storage/users-avatar/' . $item->user->avatar) }}"
                                                            class="circle"
                                                            style="width: 50px; height:50px; border-radius: 50%; object-fit: cover">{{ $item->user->name }}
                                                    </td>
                                                    <td>{{ $item->subjek }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>
                                                        @if ($item->status == 'Terkirim')
                                                            <span
                                                                class="badge rounded-pill bg-primary text-light">{{ $item->status }}</span>
                                                        @elseif ($item->status == 'Sedang diproses')
                                                            <span
                                                                class="badge rounded-pill bg-warning text-dark">{{ $item->status }}</span>
                                                        @elseif ($item->status == 'Butuh feedback')
                                                            <span
                                                                class="badge rounded-pill bg-danger text-light">{{ $item->status }}</span>
                                                        @elseif ($item->status == 'Selesai')
                                                            <span
                                                                class="badge rounded-pill bg-success text-light">{{ $item->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('destroy.konsul.admin', $item->id) }}"
                                                            method="GET">
                                                            @if ($item->status != 'Terkirim')
                                                                <a href="{{ route('show.balas.admin', $item->id) }}"
                                                                    class="btn btn-sm btn-dark m-1" role="button"
                                                                    title="Lihat detail konsultasi" style="width: 75px">
                                                                    Lihat
                                                                </a>
                                                            @else
                                                                <a href="{{ route('show.balas.status', $item->id) }}"
                                                                    style="width: 75px" class="btn btn-sm btn-info m-1"
                                                                    title="Terima konsultasi" role="button">Terima</a>
                                                            @endif
                                                            {{-- @if ($item->status == 'Selesai')
                                                                <a href="{{ route('balasan.edit', $item->id) }}"
                                                                    class="btn btn-sm btn-warning disabled m-1"
                                                                    style="width: 75px" role="button">
                                                                    Edit
                                                                </a>
                                                            @else
                                                                <a href="{{ route('balasan.edit', $item->id) }}"
                                                                    class="btn btn-sm btn-warning m-1" title="Edit balasan"
                                                                    style="width: 75px" role="button">
                                                                    Edit
                                                                </a>
                                                            @endif --}}
                                                            @if ($item->status == 'Terkirim')
                                                                <button type="submit" class="btn btn-sm btn-danger m-1"
                                                                    title="Hapus konsultasi" style="width: 75px">
                                                                    Hapus
                                                                </button>
                                                            @else
                                                                <button type="submit"
                                                                    class="btn btn-sm disabled btn-danger m-1"
                                                                    title="Hapus konsultasi" style="width: 75px">
                                                                    Hapus
                                                                </button>
                                                            @endif
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#example').DataTable();
        </script>
    @endauth
@endsection
