@extends('admin.main')
@section('title', 'Pengaduan')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="card border-0 p-5 shadow">
                    <div class="row">

                        <div class="col">
                            <small>Nama Pengadu : <b><u>{{ $pengaduan->user->name }}</u></b></small><br>
                            <small>Judul Pengaduan : </small>
                            <h3 class="center" style="text-align: justify;">{{ $pengaduan->judul }}</h3>
                        </div>
                        <div class="col mb-3">
                            <div class="d-grid justify-content-md-end">
                                @if ($pengaduan->status == 'Terkirim')
                                    <span class="badge rounded-pill bg-primary text-light">{{ $pengaduan->status }}</span>
                                @elseif ($pengaduan->status == 'Sedang diproses')
                                    <span class="badge rounded-pill bg-warning text-dark">{{ $pengaduan->status }}</span>
                                @elseif ($pengaduan->status == 'Selesai')
                                    <span class="badge rounded-pill bg-success text-light">{{ $pengaduan->status }}</span>
                                @endif
                                <small class="mt-3"><i>{{ $pengaduan->created_at }}</i></small>
                            </div>
                        </div>

                    </div>

                    <div class="alert alert-success" role="alert">
                        <div class="row">
                            <p style="text-align: justify; color: black;">{!! html_entity_decode($pengaduan->isi) !!}</p>
                            <p> <i class="fas fa-paperclip"></i>
                                @if ($pengaduan->attachment == true)
                                    <a href="{{ asset('/storage/pengaduan/' . $pengaduan->attachment) }}" target="_blank"
                                        style="color: #8C0C14"><small>{{ $pengaduan->attachment }}</small></a>
                            </p>
                        @else
                            <small><i>{{ $pengaduan->attachment }}</i></small>
                            @endif
                        </div>
                    </div>



                    @if ($pengaduan->status == 'Terkirim' || $pengaduan->status == 'Sedang diproses')
                        @if ($pengaduan->balasan == 'Belum ada balasan')
                            <div class="d-grid gap-2 justify-content-md-end">
                                <a href="{{ route('create.balaspengaduan.admin', $pengaduan->id) }}"
                                    class="btn btn-primary px-3" type="button"
                                    style="background-color: #8C0C14; border:none">Buat Balasan</a>
                            </div>
                        @else
                            <div class="d-grid gap-2 justify-content-md-end">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalEditStatus">
                                    Edit Status Pengaduan
                                </button>
                            </div>
                        @endif
                    @endif
                    @if ($pengaduan->balasan && $pengaduan->user_id_petugas)
                        <hr class="my-5">
                        <div class="row mb-2">
                            <div class="col my-auto">
                                <h3>Pesan Balasan</h3>
                            </div>
                            <div class="col">
                                <div class="d-grid justify-content-md-end">
                                    <h6>Dibalas oleh : <b>{{ $pengaduan->user_petugas->name }}</b>
                                        <small>{{ '(' . $pengaduan->user_petugas->role . ')' }}</small>
                                    </h6>
                                    <small><i>Pada {{ $pengaduan->created_at }}</i></small>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                            <div class="row">
                                <p style="text-align: justify; color: black;">{!! html_entity_decode($pengaduan->balasan) !!}</p>
                            </div>
                        </div>
                </div>
            </div>
        @else
            <hr class="my-5">
            <div class="alert alert-secondary" role="alert">
                <div class="row">
                    <p style="text-align: center; color: black;">{!! html_entity_decode($pengaduan->balasan) !!}</p>
                </div>
            </div>
            @endif
        </div>
        </div>


        {{-- MODAL --}}
        <div class="modal fade" id="modalEditStatus" tabindex="-1" role="dialog" aria-labelledby="modalEditStatusLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditStatusLabel">Edit Status Pengaduan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formEditStatus" action="{{ route('statuspengaduan.update', $pengaduan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="Sedang diproses"
                                        {{ $pengaduan->status === 'Sedang diproses' ? 'selected' : '' }}>Sedang diproses
                                    </option>
                                    <option value="Selesai" {{ $pengaduan->status === 'Selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="btnSaveChanges" onclick="submitForm()" class="btn btn-primary">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <script>
            function submitForm() {
                document.getElementById('formEditStatus').submit();
            }
        </script>

    @endauth
@endsection
