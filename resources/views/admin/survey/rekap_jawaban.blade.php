@extends('admin.main')
@section('title', 'Lihat Jawaban')
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
                                        <h4>Rekapitulasi Survey</h4>
                                    </div>
                                </div>
                                <table id="example" class="table" style="width:100%;">
                                    <thead class="table">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Judul Survey</th>
                                            <th>Diisi pada</th>
                                            <th style="width: 30%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table">
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($jawaban_pg as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><img src="{{ asset('/storage/users-avatar/' . $item->user->avatar) }}"
                                                        class="circle"
                                                        style="width: 50px; height:50px; border-radius: 50%; object-fit: cover">{{ $item->user->name }}
                                                </td>
                                                <td>{{ $item->survey->judul_survey }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td class="text-center">
                                                    <form
                                                        action="{{ route('jawaban.hapus', ['user_id' => $item->user_id, 'survey_id' => $item->survey_id, 'tanggal' => $item->tanggal]) }}"
                                                        method="GET" onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        name="detail">
                                                        <a href="{{ route('jawaban.detail', ['user_id' => $item->user_id, 'survey_id' => $item->survey_id, 'tanggal' => $item->tanggal]) }}"
                                                            class="btn btn-sm btn-success" title="Lihat detail">
                                                            Detail
                                                        </a>
                                                        <button type="submit" class="btn btn-sm btn-danger" title="hapus"
                                                            name="submit">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        {{-- @foreach ($jawaban_isian as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><img src="{{ asset('/storage/users-avatar/' . $item->user->avatar) }}"
                                                        class="circle"
                                                        style="width: 50px; height:50px; border-radius: 50%; object-fit: cover">{{ $item->user->name }}
                                                </td>
                                                <td>{{ $item->survey->judul_survey }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td class="text-center">
                                                    <form
                                                        action="{{ route('jawaban.hapus', ['user_id' => $item->user_id, 'survey_id' => $item->survey_id, 'tanggal' => $item->tanggal]) }}"
                                                        method="GET" onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        name="detail">
                                                        <a href="{{ route('jawaban.detail', ['user_id' => $item->user_id, 'survey_id' => $item->survey_id, 'tanggal' => $item->tanggal]) }}"
                                                            class="btn btn-sm btn-success" title="Lihat detail" >
                                                            Lihat detail jawaban
                                                        </a>
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            title="Lihat detail" name="submit">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach --}}
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
