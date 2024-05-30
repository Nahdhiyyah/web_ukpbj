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
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Gallery</h6>
                </div>
            </div>
        </div>
        <div class="container-fluid align-items-center px-5">
            <div class="row align-items-center">
                @foreach ($grouped as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="service-item d-block rounded text-center h-100 p-4 m-3 bg-white" href="{{route('detail.gallery', $item[0]->kategori)}}">
                            <img class="img-fluid rounded mb-4" src="{{ asset('storage/gallery/' . $item[0]->gambar) }}"
                                alt="" style="object-fit: cover; height:15rem">
                            <h5 class="mb-0">{{ $item[0]->kategori }}</h5>
                            <small><i class="fas fa-calendar-alt"></i> {{ $item[0]->tanggal }}</small>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
    </html>
@endsection
