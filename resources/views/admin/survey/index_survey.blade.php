@extends('admin.main')
@section('title', 'Survey')
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
                                        <h3>Survey</h3>
                                    </div>
                                    <div class="col">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('survey.create') }}" class="btn btn-md btn-success mb-3"
                                                style="background-color: #8C0C14; border:none">Buat
                                                Survey</a>
                                            <a href="{{ route('jawaban.index') }}" class="btn btn-md btn-success mb-3"
                                                style="background-color: #8C0C14; border:none">Rekapitulasi Survey</a>
                                        </div>
                                    </div>
                                </div>
                                <table id="example" class="table" style="width:100%;">
                                    <thead class="table">
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Survey</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th style="width: 40%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table">
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($survey as $item)
                                            @if ($item->is_deleted == 'no')
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->judul_survey }}</td>
                                                    <td>{{ $item->tanggal_buat }}</td>
                                                    <td>
                                                        @if ($item->status == 'Active')
                                                            <h6><span class="badge bg-primary">{{ $item->status }}</span></h6>
                                                        @else
                                                            <h6><span class="badge bg-secondary">{{ $item->status }}</span></h6>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('survey.destroy', $item->id) }}" method="GET">
                                                            <a href="{{ route('pertanyaan.index', $item->id) }}"
                                                                class="btn btn-sm btn-success m-1" title="Lihat Pertanyaan">
                                                                Lihat Pertanyaan
                                                            </a>
                                                            <a href="{{ route('survey.edit', $item->id) }}"
                                                                class="btn btn-sm btn-warning m-1" title="Edit Survey"
                                                                style="width: 75px">
                                                                Edit
                                                            </a>
                                                            <button type="submit" class="btn btn-sm btn-danger m-1"
                                                                title="Hapus Survey" style="width: 75px">
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
