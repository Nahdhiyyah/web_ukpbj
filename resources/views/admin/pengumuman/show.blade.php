@extends('admin.main')
@section('title', 'Pengumuman')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid my-5" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded p-5">
                            <div class="row">
                                <img class="mx-auto" src="{{ asset('storage/pengumuman/' . $pengumuman->gambar) }}" height="300px"
                                    width="600px" class="w-50 rounded" style="object-fit: cover">
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col my-auto">
                                    <h4><b>{{ $pengumuman->judul }}</b></h4>
                                </div>
                                <div class="col">
                                    <div class="d-grid justify-content-md-end">
                                        <p>Dibuat oleh : <b>{{ $pengumuman->user->name }}</b></p>
                                        <p>Pada {{ $pengumuman->tanggal }}</p>
                                    </div>
                                </div>
                            </div>
                            <p>{!! html_entity_decode($pengumuman->isi) !!}</p>
                            <p>Sumber: <a href="{{ asset('storage/document/' . $pengumuman->document) }}"
                                    target="_blank">{{ $pengumuman->document }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
