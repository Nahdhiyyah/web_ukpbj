@extends('user.main')

@section('navbar')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
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

        <div class="container py-5">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Tupoksi bagian pengadaan
                        barang dan Jasa</h6>
                </div>
            </div>
        </div>

        <div class="center">
            <iframe class="text-center" src="{{ asset('/storage/document/tupoksi.pdf') }}" width="800"
                height="900" height="600"></iframe>
        </div>

    </body>

    </html>
@endsection
