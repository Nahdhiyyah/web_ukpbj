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

        <div class="container pt-5">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;"> Detail Seputar Pengadaan</h6>
                </div>
            </div>
        </div>

        <div class="container-fluid p-5">
            <div class="card px-5 shadow-lg" style="border: none">
                <div class="row">
                    <center class="pb-3">
                        <img src="{{ asset('/storage/pengadaans/' . $pengadaan->file) }}" style="width: 300px"
                            class="center" alt="">
                    </center>
                    <h1 class="center" style="text-align: justify;">{{ $pengadaan->judul }}</h1>
                    <p style="text-align: justify; color: black;">{!!html_entity_decode($pengadaan->isi)!!}</p>
                    <p> <b>Sumber :</b>
                        <a href="{{ asset('/storage/pengadaans/' . $pengadaan->file) }}"
                            target="_blank" style="color: #8C0C14">{{ $pengadaan->file }}</a>
                    </p>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
