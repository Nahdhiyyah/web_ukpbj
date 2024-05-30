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
            <div class="container-fluid">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;"> Detail Pengumuman</h6>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card border-0 shadow rounded p-5">
                <div class="row">
                    <img class="mx-auto" src="{{ asset('storage/pengumuman/' . $pengumuman->gambar) }}" height="300px"
                        width="600px" class="w-50 rounded" style="object-fit: cover">
                </div>
                <hr>
                <div class="row">
                    <h3><b>{{ $pengumuman->judul }}</b></h3>
                </div>
                <div class="row mb-3">
                    <small>{{ $pengumuman->user->name }}</small>
                    <small><i class="far fa-calendar-alt"></i> {{ $pengumuman->tanggal }}</small>
                </div>

                <p>{!! html_entity_decode($pengumuman->isi) !!}</p>
                <p>Sumber: <a href="{{ asset('storage/document/' . $pengumuman->document) }}"
                        target="_blank">{{ $pengumuman->document }}</a>
                </p>
            </div>
        </div>

    </body>

    </html>
@endsection
