@extends('admin.main')
@section('title', 'Data Sirup Penyedia')
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
                                            <h3>Data Sirup Penyedia</h3>
                                        </div>
                                        <div class="col d-grid gap-2 d-md-flex justify-content-md-end"><a
                                                href="{{ route('penyedia.insert') }}" class="btn btn-md btn-success mb-3"
                                                style="background-color: #8C0C14; border:none">Muat Data Sirup Penyedia</a>
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
                                                <th>Metode Pemilihan</th>
                                                <th>Status Umumkan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($penyedia as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->kd_rup }}</td>
                                                    <td>{{ $item->nama_paket }}</td>
                                                    <td>{{ $item->nama_satker }}</td>
                                                    <td>{{ $item->pagu }}</td>
                                                    <td>{{ $item->metode_pengadaan }}</td>
                                                    <td>{{ $item->status_umumkan_rup }}</td>
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
