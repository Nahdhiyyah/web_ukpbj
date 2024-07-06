@extends('user.main')
@section('navbar')
    @auth
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="container-fluid px-5 py-5">
                <div class="container">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                        <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Survey</h6>
                    </div>
                </div>

                <div class="container-fluid py-5">
                    <div class="row">
                        @foreach ($survey as $item)
                            @if ($item->is_deleted == 'no' && $item->status == 'Active')
                                <div class="col-4 my-3">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title">Survey</h5>
                                                </div>
                                                <div class="col">
                                                    <div class="d-grid justify-content-md-end">
                                                        <h6><span class="badge bg-primary">{{ $item->status }}</span></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="card-text">{{ $item->judul_survey }}</p>
                                            <a href="{{ route('index.pertanyaan.user', $item->id) }}" class="btn btn-danger"
                                                style="background-color: #8C0C14; border:none">Isi Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </body>
        </html>
    @endauth
@endsection
