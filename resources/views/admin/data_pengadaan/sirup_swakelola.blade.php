@extends('admin.main')
@section('title', 'Data Sirup Swakelola')
@section('content')
    @auth

        <body>
            <div class="content-wrapper">
                <div class="container-fluid" style="padding-top: 0.5cm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card p-2 shadow-lg" style="border: none">
                                <div class="card-body table-responsive p-3">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h3>Data Sirup Swakelola</h3>
                                        </div>
                                        <div class="col d-grid gap-2 d-md-flex justify-content-md-end"><a
                                                href="{{ route('sirup_swakelola.insert') }}" class="btn btn-md btn-success mb-3"
                                                style="background-color: #8C0C14; border:none">Muat Data Sirup Swakelola</a>
                                        </div>
                                    </div>
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
            </div>
        </body>
    @endauth
@endsection
