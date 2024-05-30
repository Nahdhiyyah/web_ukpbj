@extends('admin.main')
@section('title', 'Konsultasi')
@section('content')
    @auth
        <div class="content-wrapper p-5">
            <div class="container-fluid pb-5">
                <div class="card border-0 p-5 shadow">
                    <div class="row">
                        <div class="col">
                            <small>Subjek : </small>
                            <h3 class="center" style="text-align: justify;">{{ $user_konsul->subjek }}</h3>
                        </div>
                        <div class="col mb-3">
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
                        <div class="row">
                            <hr>
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
                    </div>
                    <div class="d-grid gap-2 justify-content-md-end">
                        <a href="{{ route('create.balas.admin', $user_konsul->id) }}" class="btn btn-primary px-3"
                            type="button" style="background-color: #8C0C14; border:none">Buat Balasan</a>
                    </div>
                </div>

                @foreach ($admin_konsul as $item)
                    @if ($user_konsul->id == $item->user_konsul_id)
                        <div class="card border-0 p-5 shadow">
                            <div class="row mb-2">
                                <div class="col my-auto">
                                    <h3>Pesan Balasan</h3>
                                </div>
                                <div class="col">
                                    <div class="d-grid justify-content-md-end">
                                        <h6>Dibalas oleh : <b>{{ $item->name }}</b> <small>{{'('.$item->role.')'}}</small></h6>
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
        </div>
    @endauth
@endsection
