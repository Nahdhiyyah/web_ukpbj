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

        <div class="container-fluid py-4">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;"> Detail Pengumuman</h6>
                </div>
            </div>
        </div>

        <div class="container-fluid pb-5">
            <div class="card border-0 px-5 py-5 mx-5 shadow">
                <div class="row mb-2">
                    <div class="col">
                        <small>Subjek : </small>
                        <h3 class="center" style="text-align: justify;">{{ $user_konsul->subjek }}</h3>
                    </div>


                    <div class="col">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            @if ($user_konsul->status == 'Belum diproses')
                                <span class="badge rounded-pill bg-danger text-light">{{ $user_konsul->status }}</span>
                            @elseif ($user_konsul->status == 'Sedang diproses')
                                <span class="badge rounded-pill bg-warning text-dark">{{ $user_konsul->status }}</span>
                            @elseif ($user_konsul->status == 'Sudah diproses')
                                <span class="badge rounded-pill bg-success text-light">{{ $user_konsul->status }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <p style="text-align: justify; color: black;">{!! html_entity_decode($user_konsul->message) !!}</p>
                    <p> <i class="fas fa-paperclip"></i>
                        @if ($user_konsul->attachment == 1)
                            <a href="{{ asset('/storage/konsultasi/' . $user_konsul->attachment) }}" target="_blank"
                                style="color: #8C0C14">{{ $user_konsul->attachment }}</a>
                    </p>
                @else
                    <small><i>{{ $user_konsul->attachment }}</i></small>
                    @endif
                </div>
                <div class="d-grid gap-2 justify-content-md-end">
                    <a href="{{ route('create.balas.user', $user_konsul->id) }}" class="btn btn-primary px-3" type="button"
                        style="background-color: #8C0C14; border:none">Buat Balasan</a>
                </div>
            </div>
            @foreach ($balasan as $item)
                @if ($user_konsul->id == $item->user_konsul_id)
                    <div class="card border-0 p-5 mx-5 my-3 shadow">
                        <div class="row mb-2">
                            <div class="col my-auto">
                                <h3>Pesan Balasan</h3>
                            </div>
                            <div class="col">
                                <div class="d-grid justify-content-md-end">
                                    <h6>Dibalas oleh : <b>{{ $item->name }}</b> <small>{{ '(' . $item->role . ')' }}</small>
                                    </h6>
                                    <small><i>Pada {{ $item->created_at }}</i></small>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <p style="text-align: justify; color: black;">{!! html_entity_decode($item->balasan) !!}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </body>

    </html>
@endsection
