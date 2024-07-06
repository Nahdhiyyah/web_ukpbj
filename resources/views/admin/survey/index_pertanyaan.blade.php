@extends('admin.main')
@section('title', 'Pertanyaan Survey')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-2 shadow-md" style="border: none">
                            <div class="card-body table-responsive p-3">
                                <div class="row">
                                    <div class="col">
                                        <h4>Pertanyaan Survey {{ $survey->judul_survey }}</h4>
                                    </div>
                                    <div class="col">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('pertanyaan.create', $survey->id) }}"
                                                class="btn btn-md btn-success mb-3"
                                                style="background-color: #8C0C14; border:none">Buat
                                                Pertanyaan</a>
                                        </div>
                                    </div>
                                </div>
                                <table id="example" class="table" style="width:100%;">
                                    <thead class="table">
                                        <tr>
                                            <th>No</th>
                                            <th>Pertanyaan</th>
                                            <th>Jenis Pertanyaan</th>
                                            <th style="width: 30%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table">
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($pertanyaan as $item)
                                            @if ($item->is_deleted == 'no')
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{!! html_entity_decode($item->pertanyaan) !!}</td>
                                                    <td>{{ $item->jenis }}</td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('pertanyaan.hapus', $item->id) }}"
                                                            method="GET">
                                                            <button type="submit" class="btn btn-sm btn-danger m-1"
                                                                title="Hapus" style="width: 75px">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#example').DataTable();
        </script>
    @endauth
@endsection
