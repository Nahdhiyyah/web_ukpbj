@extends('admin.main')
@section('title', 'Gallery')
@section('content')
    @auth
        <x-app-layout>
            <div class="content-wrapper">
                <div class="container mt-5 mb-5" style="padding-top: 0.5cm">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card border-0 shadow-sm rounded">
                                <div class="card-body">
                                    <img src="{{ asset('storage/gallery/' . $gallery->gambar) }}" class="w-100 rounded">
                                    <hr>
                                    <h4>{{ $gallery->judul }}</h4>
                                    <p class="tmt-3">
                                        {{ $gallery->tanggal }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="js/app.js"></script>
                <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
            </div>
        </x-app-layout>
    @endauth
@endsection
