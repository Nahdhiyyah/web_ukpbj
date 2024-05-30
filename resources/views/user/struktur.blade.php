@extends('user.main')
@section('navbar')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Struktur Organisasi</title>
    </head>
    <style>
        .center {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            flex: 1 0 100%;
        }
    </style>

    <body>
        <div class="container pt-5 pb-3">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Struktur Organisasi</h6>
                </div>
            </div>
        </div>

        <div class="center pb-5">
            <img src="public/img/struktur.png" alt="" width="1200" class="img-fluid">
        </div>

    </body>

    </html>
@endsection
