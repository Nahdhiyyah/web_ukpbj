@extends ('user.main')
@section('navbar')
    <div class="container pt-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Data Pencatatan Swakelola</h6>
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
                            <th>Nama Paket</th>
                            <th>Satuan Kerja</th>
                            <th>Pagu RUP</th>
                            <th>Realisasi</th>
                            <th>Status Paket</th>
                        </tr>
                    </thead>
                    <tbody class="table">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($swakelola as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_paket }}</td>
                                <td>{{ $item->nama_satker }}</td>
                                <td>{{ number_format($item->pagu, 0, ',', '.') }}</td>
                                <td>{{ number_format($item->total_realisasi, 0, ',', '.') }}</td>
                                <td>{{ $item->status_swakelola_pct_ket }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $('#example').DataTable();
    </script>
@endsection
