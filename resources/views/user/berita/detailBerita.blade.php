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

        <div class="container py-4">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;"> Detail Berita</h6>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card border-0 shadow-sm rounded p-5">
                <div class="row">
                    <img class="mx-auto" src="{{ asset('storage/berita/' . $berita->gambar) }}" height="300px"
                        width="600px" class="w-50 rounded" style="object-fit: cover">
                </div>
                <hr>
                <div class="row">
                    <h4><b>{{ $berita->judul }}</b></h4>
                </div>

                <p class="mb-3">{!! html_entity_decode($berita->isi) !!}</p>

                <div class="row">
                    <small>{{ $berita->user->name }}</small>
                    <small><i class="far fa-calendar-alt"></i> {{ $berita->tanggal }}</small>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
