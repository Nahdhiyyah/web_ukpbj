@extends('admin.main')
@section('title', 'berita')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid mt-5 mb-5" style="padding-top: 0.5cm">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card border-0 shadow-sm rounded p-5">
                            <img class="mx-auto" src="{{ asset('storage/berita/' . $berita->gambar) }}" height="300px"
                                width="600px" class="w-50 rounded" style="object-fit: cover">
                            <hr>
                            <div class="row">
                                <div class="col my-auto">
                                    <h4><b>{{ $berita->judul }}</b></h4>
                                </div>
                                <div class="col">
                                    <div class="d-grid justify-content-md-end">
                                        <p>Dibuat oleh : <b>{{ $berita->user->name }}</b></p>
                                        <p>Pada {{ $berita->tanggal }}</p>
                                    </div>
                                </div>
                            </div>

                            <p class="mb-3">{!! html_entity_decode($berita->isi) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endauth
@endsection
