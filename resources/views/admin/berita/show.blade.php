@extends('admin.main')
@section('title', 'berita')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid mt-5 mb-5" style="padding-top: 0.5cm">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card border-0 shadow-sm rounded">
                            {{-- <div class="card-body"> --}}
                                <img src="{{ asset('storage/berita/' . $berita->gambar) }}" class="w-50 rounded">
                                <hr>
                                <h4>{{ $berita->judul }}</h4>
                                <p class="mt-3">
                                    {{ $berita->tanggal }}
                                </p>

                                <p class="mb-3">{!! html_entity_decode($berita->isi) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>
            {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
        </div>
    @endauth
@endsection
