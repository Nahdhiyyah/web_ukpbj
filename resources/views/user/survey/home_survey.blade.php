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
        <div class="container-fluid px-5 py-3">
        </div>
        <div class="container-fluid">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Survey</h6>
                </div>
            </div>
        </div>
        <div class="container-fluid py-5">
            <div class="card shadow py-5 my-3 mx-5" style="border: none">
                <div class="row px-5">
                    <div class="col-lg-6 pr-auto">
                        <img class="img-fluid" src="public/img/survey.png" alt="konsultasi" width="500px"
                            style="float: right;">
                    </div>
                    <div class="col-lg-6 my-auto px-2">
                        <h3>Selamat datang di survey pelayanan publik UKPBJ Kabupaten Banyuwangi</h3>
                        <h5>Silahkan isi survey ini berdasarkan penilaian anda</h5>
                        <a href="{{ route('index.survey.user') }}" class="btn btn-primary"
                            style="background-color: #8C0C14; border:none" type="button">Isi sekarang!</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
@endsection
