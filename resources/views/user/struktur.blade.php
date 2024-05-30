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
        <div class="container-fluid pt-5 pb-3">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Struktur Organisasi</h6>
                </div>
            </div>
        </div>

        <div class="center pb-5">
            <img src="public/img/struktur.png" alt="" width="1200" class="img-fluid">
        </div>
        <!-- Staff Start -->
        <div class="container-fluid py-5">
            <div class="container-fluid">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14">Staff</h6>
                </div>

                <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($staff as $item)
                        @if ($item->is_deleted == 'no')
                            <div class="row md-12">
                                <div class="col md-3">
                                    <div class="card border-0 shadow p-3 my-5" style="align-items: center; height:400px"
                                        data-dot="{{ $no++ }}">
                                        <div class="my-2">
                                            <img class="img-fluid border rounded-circle p-2 mb-4 mx-auto"
                                                style="object-fit: cover; width:200px; height:200px"
                                                src="{{ asset('storage/staff/' . $item->gambar) }}" alt="Staff">
                                        </div>
                                        <h5 class="text-center">{{ $item->nama }}</h5>
                                        <small class="text-center mb-2">{{ $item->jabatan }}</small>
                                        <small class="text-center"><b>NIP. {{ $item->nip }}</b></small>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!-- staff End -->
    </body>

    </html>
@endsection
