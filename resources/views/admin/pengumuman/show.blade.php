@extends('admin.main')
@section('title', 'Pengumuman')
@section('content')
    @auth
        <x-app-layout>
            <div class="content-wrapper">
                <div class="container mt-5 mb-5" style="padding-top: 0.5cm">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card border-0 shadow-sm rounded">
                                <div class="card-body">
                                    <img src="{{ asset('storage/pengumuman/' . $pengumuman->gambar) }}" class="w-50 rounded">
                                    <hr>
                                    <h4><b>{{ $pengumuman->judul }}</b></h4>
                                    <p class="tmt-3">
                                        {{ $pengumuman->tanggal }}
                                    </p>

                                    <p>{!! html_entity_decode($pengumuman->isi) !!}</p>
                                    <p>Sumber: <a href="{{ asset('storage/document/' . $pengumuman->document) }}"
                                            target="_blank">{{ $pengumuman->document }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

            </div>
        </x-app-layout>
    @endauth
@endsection
