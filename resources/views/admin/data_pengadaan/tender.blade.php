@extends('admin.main')
@section('title', 'Tender')
@section('content')
    @auth

        <body>
            <div class="content-wrapper">
                <div class="container-fluid" style="padding-top: 0.5cm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card p-2 shadow-md" style="border: none">
                                <div class="card-body table-responsive p-3">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h3>Data Tender</h3>
                                        </div>
                                        {{-- <div class="col">
                                            @php
                                                $ta = session()->GET('sess_ta');
                                            @endphp
                                            <form action="{{ route('set_tahun') }}" method="POST">
                                                <select class="form-select mb-3" aria-label=".form-select example"
                                                    name="tahun_anggaran" onchange="this.form.submit()">
                                                    
                                                    <option <?php if (!empty($ta)) {
                                                        if ($ta == '2023') {
                                                            echo 'selected';
                                                        }
                                                    } ?> value="2023">2023</option>
                                                    <option <?php if (!empty($ta)) {
                                                        if ($ta == '2023') {
                                                            echo 'selected';
                                                        }
                                                    } ?> value="2024">2024</option>
                                                </select>
                                            </form>
                                        </div> --}}
                                        <div class="col">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <a href="{{ route('tender.insert') }}" class="btn btn-md btn-success"
                                                    style="background-color: #8C0C14; border:none">Muat Data Tender</a>
                                                {{-- <a href="{{ route('tender2.insert') }}" class="btn btn-md btn-primary"
                                                    style="background-color: #8C0C14; border:none">Muat Data Tender 2</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table my-3" id="example" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Tender</th>
                                                <th>Satuan Kerja</th>
                                                <th>Pagu</th>
                                                <th>HPS</th>
                                                {{-- <th>Nilai Tender</th>
                                                    <th>Efisiensi</th>
                                                    <th>Rekanan</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($tender as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->kd_tender }}</td>
                                                    <td>{{ $item->nama_satker }}</td>
                                                    <td>{{ number_format($item->pagu, 0, ',', '.') }}</td>
                                                    <td>{{ number_format($item->hps, 0, ',', '.') }}</td>
                                                    {{-- Menentukan nilai tender --}}
                                                    {{-- @if ($item->nilai_kontrak == 1)
                                                            <td>{{ number_format($item->nilai_kontrak, 0, ',', '.') }}
                                                            </td>
                                                        @elseif ($item->nilai_negosiasi == 1)
                                                            <td>{{ number_format($item->nilai_negosiasi, 0, ',', '.') }}
                                                            </td>
                                                        @else
                                                            <td>{{ number_format($item->nilai_terkoreksi, 0, ',', '.') }}
                                                            </td>
                                                        @endif --}}

                                                    {{-- Menentukan nilai efiensi --}}
                                                    {{-- @if ($item->nilai_kontrak == 1)
                                                            <td>{{ number_format($item->hps - $item->nilai_kontrak, 0, ',', '.') }}
                                                                <b>{{ ' (' . round((($item->hps - $item->nilai_kontrak) / $item->hps) * 100) . '%)' }}</b>
                                                            </td>
                                                        @else
                                                            <td>{{ number_format($item->hps - $item->nilai_negosiasi, 0, ',', '.') }}
                                                                <b>{{ ' (' . round((($item->hps - $item->nilai_negosiasi) / $item->hps) * 100) . '%)' }}</b>
                                                            </td>
                                                        @endif --}}
                                                    {{-- <td>{{ $item->nama_penyedia }}</td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $('#example').DataTable();
                </script>
            </div>
            </div>
        </body>
    @endauth
@endsection
