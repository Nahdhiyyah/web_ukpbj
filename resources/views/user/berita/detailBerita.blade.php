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

        <div class="container-fluid p-5">
            <div class="card px-5 py-5 shadow-lg">
                <div class="row">
                    <center class="pb-4">
                        <img src="{{ asset('/storage/berita/' . $berita->gambar) }}" style="width: 400px; align: center"
                            class="center" alt="">
                    </center>
                    <h1 class="center" style="text-align: justify;">{{ $berita->judul }}</h1>
                    <div style="color: black">{!!html_entity_decode($berita->isi)!!}</div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
