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
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;"> Detail Konsultasi</h6>
                </div>
            </div>
        </div>

        <div class="container-fluid pb-5">
            <div class="card border-0 px-5 py-5 mx-5 shadow">
                <div class="row">
                    <div class="col">
                        <small>Subjek : </small>
                        <h3 class="center" style="text-align: justify;">{{ $user_konsul->subjek }}</h3>
                    </div>
                    <div class="col">
                        <div class="d-grid justify-content-md-end">
                            @if ($user_konsul->status == 'Terkirim')
                                <span class="badge rounded-pill bg-primary text-light">{{ $user_konsul->status }}</span>
                            @elseif ($user_konsul->status == 'Sedang diproses')
                                <span class="badge rounded-pill bg-warning text-dark">{{ $user_konsul->status }}</span>
                            @elseif ($user_konsul->status == 'Butuh feedback')
                                <span class="badge rounded-pill bg-danger text-light">{{ $user_konsul->status }}</span>
                            @elseif ($user_konsul->status == 'Selesai')
                                <span class="badge rounded-pill bg-success text-light">{{ $user_konsul->status }}</span>
                            @endif
                            <small class="mt-3"><i>{{ $user_konsul->created_at }}</i></small>
                        </div>
                        
                    </div>
                </div>
                <hr>
                <div class="row">
                    <p style="text-align: justify; color: black;">{!! html_entity_decode($user_konsul->isi) !!}</p>
                    <p><i class="fas fa-paperclip"></i>
                        @if ($user_konsul->attachment == true)
                            <a href="{{ asset('/storage/konsultasi/' . $user_konsul->attachment) }}" target="_blank"
                                style="color: #8C0C14"><small>{{ $user_konsul->attachment }}</small></a>
                    </p>
                @else
                    <small><i>{{ $user_konsul->attachment }}</i></small>
                    @endif
                </div>
                @if ($user_konsul->status =='Butuh feedback')
                    <div class="d-grid gap-2 justify-content-md-end">
                        <a href="{{ route('create.balas.user', $user_konsul->id) }}" class="btn btn-primary px-3"
                            type="button" style="background-color: #8C0C14; border:none">Buat Balasan</a>
                    </div>
                @endif
            </div>
            @foreach ($balasan as $item)
                @if ($user_konsul->id == $item->konsul_id)
                    <div class="card border-0 p-5 mx-5 my-3 shadow">
                        <div class="row mb-2">
                            <div class="col my-auto">
                                <h3>Pesan Balasan</h3>
                            </div>
                            <div class="col">
                                <div class="d-grid justify-content-md-end">
                                    <h6>Dibalas oleh : <b>{{ $item->user->name }}</b>
                                        <small>{{ '(' . $item->user->role . ')' }}</small>
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
