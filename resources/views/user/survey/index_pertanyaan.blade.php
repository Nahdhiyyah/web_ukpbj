@extends('user.main')
@section('navbar')
    @auth
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            {{-- <title>Document</title> --}}
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
            <div class="container-fluid px-5 py-3">
                <div class="container">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                        <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Survey</h6>
                    </div>
                </div>

                @php
                    $no = 1;
                @endphp
                <div class="container-fluid py-5">
                    <div class="card shadow p-5 my-3 w-75 mx-auto" style="border: none">
                        <h3 class="mx-auto">{{$pertanyaan[0]->survey->judul_survey}}</h3>
                        <form action="{{ route('survey.store.user') }}" method="POST" enctype="multipart/form-data"
                            id="surveyForm">
                            @foreach ($pertanyaan as $item)
                                @if ($item->survey_id == $item->survey->id)
                                    @csrf
                                    <div class="m-5">
                                        <input type="hidden" name="pertanyaan_id" value="{{ $item->id }}">
                                        <input type="hidden" name="survey_id" value="{{ $item->survey->id }}">
                                        <h5>{{ $no++ }}. {!! $item->pertanyaan !!}</h5>
                                        @if ($item->jenis == 'Pilihan ganda')
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="jawaban_pg[{{ $item->id }}]" id="inlineRadio1{{ $item->id }}"
                                                    value="25" onclick="submitForm()">
                                                <label class="form-check-label" for="inlineRadio1{{ $item->id }}"
                                                    onclick="submitForm()">Kurang
                                                    Baik</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="jawaban_pg[{{ $item->id }}]" id="inlineRadio2{{ $item->id }}"
                                                    value="50" onclick="submitForm()">
                                                <label class="form-check-label" for="inlineRadio2{{ $item->id }}"
                                                    onclick="submitForm()">Cukup
                                                    Baik</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="jawaban_pg[{{ $item->id }}]"
                                                    id="inlineRadio3{{ $item->id }}" value="75" onclick="submitForm()">
                                                <label class="form-check-label" for="inlineRadio3{{ $item->id }}"
                                                    onclick="submitForm()">Baik</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="jawaban_pg[{{ $item->id }}]"
                                                    id="inlineRadio4{{ $item->id }}" value="100" onclick="submitForm()">
                                                <label class="form-check-label" for="inlineRadio4{{ $item->id }}"
                                                    onclick="submitForm()">Sangat
                                                    Baik</label>
                                            </div>
                                        @elseif($item->jenis == 'Isian')
                                            <textarea class="form-control" id="jawaban_isian[{{ $item->id }}]" rows="3"
                                                name="jawaban_isian[{{ $item->id }}]"></textarea>
                                        @endif
                                    </div>
                                @endif
                                <hr>
                            @endforeach
                            <div class="text-end mt-3">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

        </html>
    @endauth
@endsection
