@extends('user.main')
@section('navbar')

    <body>
        <div class="container pt-5">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Data Sirup Swakelola</h6>
                </div>
            </div>
        </div>
        <div class="container-fluid p-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-2 shadow-lg" style="border: none">
                        <div class="card-body table-responsive p-3">
                            <table class="table my-3" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode RUP</th>
                                        <th>Nama Paket</th>
                                        <th>Nama Satuan Kerja</th>
                                        <th>Pagu RUP</th>
                                        <th>Tipe Swakelola</th>
                                        <th>Status Umumkan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($swakelola as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->kode_rup }}</td>
                                            <td>{{ $item->nama_paket }}</td>
                                            <td>{{ $item->nama_satker }}</td>
                                            <td>{{ number_format($item->pagu_rup, 0, ',', '.') }}</td>
                                            <td>{{ $item->tipe_swakelola }}</td>
                                            <td>{{ $item->status_umumkan }}</td>
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
    @endsection
