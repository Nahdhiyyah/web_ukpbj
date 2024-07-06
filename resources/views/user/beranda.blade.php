@extends('user.main')

@section('navbar')
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!--Bootstrap icon-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/bootstrap.min.css">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="public/lib/animate/animate.min.css" rel="stylesheet">
        <link href="public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="public/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <title>UKPBJ Banyuwangi</title>

        <style>
        </style>
    </head>
    <style>
        .table {
            text-decoration-color: black;
        }
    </style>

    <body>
        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    {{-- <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1">
                        <img class="img-fluid" src="public/img/Banner 1.png" alt="Image">
                    </button>
                    <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                        <img class="img-fluid" src="public/img/Banner 2.png" alt="Image">
                    </button>
                    <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                        <img class="img-fluid" src="public/img/Banner 3.png" alt="Image">
                    </button> --}}

                    @foreach ($banner as $index => $item)
                        <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="{{ $index }}"
                            class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $index + 1 }}">
                            <img class="img-fluid" src="{{ asset('/storage/banner/' . $item->gambar) }}" alt="Image">
                        </button>
                    @endforeach
                </div>

                <div class="carousel-inner">
                    {{-- <div class="carousel-item active">
                        <img class="img-fluid w-100" src="public/img/Banner 1.png" alt="Image">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid w-100" src="public/img/Banner 2.png" alt="Image">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid w-100" src="public/img/Banner 3.png" alt="Image">
                    </div> --}}
                    @foreach ($banner as $index => $item)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img class="img-fluid w-100" src="{{ asset('/storage/banner/' . $item->gambar) }}" alt="Image">
                        </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->


        <div class="container-xxl py-5">
            <div class="container-xxl g-5">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-2" style="color: #8C0C14;">Data Paket Pengadaan Barang
                        Dan Jasa</h6>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            {{-- <i class="fa fa-certificate fa-4x text-primary mb-4"></i> --}}
                            <img class="img-fluid rounded mb-4" src="public/img/1.png" alt="">
                            <h5 class="mb-3">Tender</h5>
                            <h1 class="display-5 mb-0" data-toggle="counter-up">
                                {{ number_format($tender->count(), 0, ',', '.') }}
                            </h1>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            {{-- <i class="fa fa-users-cog fa-4x text-primary mb-4"></i> --}}
                            <img class="img-fluid rounded mb-4" src="public/img/2.png" alt="">
                            <h5 class="mb-3">Non Tender</h5>
                            <h1 class="display-5 mb-0" data-toggle="counter-up">
                                {{ number_format($non_tender->count(), 0, ',', '.') }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a href="{{ route('e_purchasing.home') }}">
                            <div class="fact-item bg-light rounded text-center h-100 p-5">
                                {{-- <i class="fa fa-users fa-4x text-primary mb-4"></i> --}}
                                <img class="img-fluid rounded mb-4" src="public/img/3.png" alt="">
                                <h5 class="mb-3">E-Purchasing</h5>
                                <h1 class="display-5 mb-0" data-toggle="counter-up">
                                    {{ number_format($e_purchasing->count(), 0, ',', '.') }}</h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            {{-- <i class="fa fa-check fa-4x text-primary mb-4"></i> --}}
                            <img class="img-fluid rounded mb-4" src="public/img/4.png" alt="">
                            <h5 class="mb-3">Pencatatan</h5>
                            <h1 class="display-5 mb-0" data-toggle="counter-up">
                                {{ number_format($p_swakelola->count(), 0, ',', '.') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengumuman Start -->
        <div class="container-fluid py-5">
            <div class="container-fluid">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Pengumuman</h6>
                </div>

                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    @foreach ($pengumuman as $item)
                        <div class="testimonial-item bg-light rounded p-4">
                            <div class="d-flex align-items-center mb-4">
                                <img class="flex-shrink-0 rounded-circle border p-1" src="public/img/icon-pengumuman.png"
                                    alt="">
                                <div class="ms-4">
                                    <h5 class="mb-1">{{ $item->judul }}</h5>
                                    <span>{{ $item->tanggal }}</span>
                                </div>
                            </div>
                            <span>{!! Str::words(strip_tags($item->isi), $limit = 20, $end = ' ...') !!}</span>
                            <a class="text-end" style="color: #8C0C14; font-size:11pt"
                                href="{{ route('show.pengumuman.home', $item->id) }}"><i>selengkapnya</i></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Pengumuman End -->

        <!-- Berita Start -->
        <div class="container-fluid py-5">
            <div class="container-fluid">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14">Berita</h6>
                </div>

                <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($berita as $item)
                        {{-- <div class="project-item border rounded h-100 p-4" data-dot="01"> --}}
                        <div class="card border-0 shadow p-3 h-100 my-5" data-dot="{{ $no++ }}">
                            <div class="position-relative mb-4">
                                <img class="img-fluid rounded mx-auto"
                                    src="{{ asset('/storage/berita/' . $item->gambar) }}" alt="" height="50px"
                                    style="object-fit: cover">
                                {{-- <a href="img/project-1.jpg" type="img" src="{{ asset('/storage/berita/' . $item->gambar) }}" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a> --}}
                            </div>
                            <h6>{{ $item->judul }}</h6>
                            <span>{!! Str::words(strip_tags($item->isi), $limit = 20, $end = ' ...') !!}</span>
                            <a class="text-end" href="{{ route('show.berita.home', $item->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#8c0c14"
                                    class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Berita End -->

    </body>

    </html>
@endsection
