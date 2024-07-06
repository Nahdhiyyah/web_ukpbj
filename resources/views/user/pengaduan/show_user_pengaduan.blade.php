@extends('user.main')

@section('navbar')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail</title>
    </head>

    <style>
        .div {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            flex: 1 0 100%;
        }
    </style>


    <body style="background-image: url(img/bg_session.png);">

        <div class="container-fluid py-4">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;"> Detail Pengaduan</h6>
                </div>
            </div>
        </div>

        <div class="container-fluid pb-5">
            <div class="card border-0 px-5 py-5 mx-5 shadow">
                <div class="row">
                    <div class="col">
                        <small>Judul pengaduan : </small>
                        <h3 class="center" style="text-align: justify;">{{ $user_pengaduan->judul }}</h3>
                    </div>
                    <div class="col">
                        <div class="d-grid justify-content-md-end">
                            @if ($user_pengaduan->status == 'Terkirim')
                                <span class="badge rounded-pill bg-primary text-light">{{ $user_pengaduan->status }}</span>
                            @elseif ($user_pengaduan->status == 'Sedang diproses')
                                <span class="badge rounded-pill bg-warning text-dark">{{ $user_pengaduan->status }}</span>
                            @elseif ($user_pengaduan->status == 'Selesai')
                                <span class="badge rounded-pill bg-success text-light">{{ $user_pengaduan->status }}</span>
                            @endif
                            <small class="mt-3"><i>{{ $user_pengaduan->created_at }}</i></small>
                        </div>
                    </div>
                </div>
                <div class="alert alert-success" role="alert">
                    <div class="row">
                        <p style="text-align: justify; color: black;">{!! html_entity_decode($user_pengaduan->isi) !!}</p>
                        <p> <i class="fas fa-paperclip"></i>
                            <a href="{{ asset('/storage/pengaduan/' . $user_pengaduan->attachment) }}"
                                target="_blank"><small>{{ $user_pengaduan->attachment }}</small></a>
                        </p>
                    </div>
                </div>

                @if ($user_pengaduan->balasan && $user_pengaduan->user_id_petugas)
                    <hr class="my-5">
                    <div class="row mb-2">
                        <div class="col my-auto">
                            <h3>Pesan Balasan</h3>
                        </div>
                        <div class="col">
                            <div class="d-grid justify-content-md-end">
                                <h6>Dibalas oleh : <b>{{ $user_pengaduan->user_petugas->name }}</b>
                                    <small>{{ '(' . $user_pengaduan->user_petugas->role . ')' }}</small>
                                </h6>
                                <small><i>Pada {{ $user_pengaduan->created_at }}</i></small>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-secondary" role="alert">
                        <div class="row">
                            <p style="text-align: justify; color: black;">{!! html_entity_decode($user_pengaduan->balasan) !!}</p>
                        </div>
                    </div>
            </div>
        @else
            <hr class="my-5">
            <div class="alert alert-secondary" role="alert">
                <div class="row">
                    <p style="text-align: justify; color: black;">{!! html_entity_decode($user_pengaduan->balasan) !!}</p>
                </div>
            </div>
            @endif

            @if ($user_pengaduan->status == 'Selesai')
                <div class="text-center mt-5">
                    <h6>Apakah anda puas dengan pelayanan kami?</h6>
                    <a href="{{ route('index.survey.user') }}" class="btn btn-danger px-3" type="button"
                        style="background-color: #8C0C14; border:none">Isi survey sekarang</a>
                </div>
            @endif
        </div>
        </div>
    </body>

    </html>
@endsection
