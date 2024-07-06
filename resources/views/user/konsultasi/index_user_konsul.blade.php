@extends ('user.main')
@section('navbar')
    @auth
        <div class="container">
            <div class="container pt-5">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Konsultasi</h6>
                </div>
            </div>
        </div>

        <div class="container-fluid p-5">
            <div class="card table-responsive shadow p-5" style="border: none">
                <div class="row">
                    <div class="col-lg-3">
                        <a href="{{ route('create.konsul.user') }}" type="button" class="btn btn-danger mb-3"
                            style="background-color: #8C0C14; border:none;">Buat Konsultasi Baru</a>
                    </div>
                    <div class="col-lg-9 d-grid gap-2 d-md-flex justify-content-md-end">
                        <p>{{ Auth::user()->name }}</p>
                        <small>{{ '(' . Auth::user()->role . ')' }}</small>
                        <a href="{{ route('profile.edit') }}" target="_blank">
                            <img src="{{ asset('/storage/users-avatar/' . Auth::user()->avatar) }}" class="circle mx-auto"
                                style="width: 30px; height:30px; border-radius: 50%; object-fit: cover"></a>
                    </div>
                    <table id="example" class="table" style="width:100%;">
                        <thead class="table">
                            <tr>
                                <th>No</th>
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
                            @foreach ($user_konsul as $item)
                                @if ($item->user_id == Auth::user()->id)
                                    @if ($item->is_deleted == 'no')
                                        <tr>
                                            <td>{{ $no++ }}</td>
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
                                                    action="{{ route('hapus.konsul.user', $item->id) }}" method="GET">
                                                    <a href="{{ route('show.konsul.user', $item->id) }}"
                                                        class="btn btn-sm btn-dark m-1" type="button"
                                                        title="Lihat detail konsultasi" style="width: 75px">

                                                        Lihat
                                                    </a>
                                                    @if ($item->status != 'Terkirim')
                                                        <a href="#" class="btn btn-sm btn-warning disabled m-1"
                                                            style="width: 75px">
                                                            Edit
                                                        </a>
                                                    @else
                                                        <a href="{{ route('edit.konsul.user', $item->id) }}"
                                                            class="btn btn-sm btn-warning m-1" title="Edit konsultasi"
                                                            style="width: 75px">
                                                            Edit
                                                        </a>
                                                    @endif
                                                    @if ($item->status == 'Terkirim')
                                                        <button type="submit" class="btn btn-sm btn-danger m-1"
                                                            title="Hapus konsultasi" style="width: 75px">
                                                            Hapus
                                                        </button>
                                                    @else
                                                        <button type="submit" class="btn btn-sm disabled btn-danger m-1"
                                                            title="Hapus konsultasi" style="width: 75px">
                                                            Hapus
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
            $('#example').DataTable();
        </script>
    @endauth
@endsection
