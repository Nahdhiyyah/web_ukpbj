@extends ('user.main')

@section('navbar')
    <div class="container pt-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Data Tender</h6>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-5 px-5">
        <div class="card table-responsive shadow p-5" style="border: none">
            <div class="row">
                <table id="example" class="table" style="width:100%;">
                    <thead class="table">
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
                    <tbody class="table">
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
            {{-- </div> --}}
        </div>
    </div>

    <script>
        $('#example').DataTable();
    </script>
@endsection
