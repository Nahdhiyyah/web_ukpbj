@extends('user.main')
@section('navbar')
    {{-- @auth --}}
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
            {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <p>{{ Auth::user()->name }}</p>
                <small>{{ '(' . Auth::user()->role . ')' }}</small>
                <a href="{{ route('profile.edit') }}" target="_blank">
                    <img src="{{ asset('/storage/users-avatar/' . Auth::user()->avatar) }}" class="circle mx-auto"
                        style="width: 30px; height:30px; border-radius: 50%; object-fit: cover"></a>
            </div> --}}
        </div>
        <div class="container-fluid">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Pengaduan</h6>
                </div>
            </div>
        </div>
        <div class="container-fluid py-5">
            <div class="card shadow py-5 my-3 mx-5" style="border: none">
                <div class="row px-5">
                    <div class="col-lg-6 pr-auto">
                        <img class="img-fluid" src="public/img/pengaduan.png" alt="konsultasi" width="500px"
                            style="float: right;">
                    </div>
                    <div class="col-lg-6 my-auto px-2">
                        {{-- <h2>Hai, {{ Auth::user()->name }}</h2> --}}
                        <h2>Ada yang bisa kami bantu ?</h2>
                        <a href="{{ route('daftar.pengaduan.user') }}" class="btn btn-danger"
                            style="background-color: #8C0C14; border:none" type="button">Adukan Sekarang !</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
    {{-- @endauth --}}
@endsection
