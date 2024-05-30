@extends('user.main')
{{-- @section('title', 'Data Sirup Penyedia') --}}
@section('navbar')
        <body>
            <div class="container pt-5">
                <div class="container">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                        <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Data Sirup Penyedia</h6>
                    </div>
                </div>
            </div>
                <div class="container-fluid pt-5 px-5" style="padding-top: 0.5cm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card p-2 shadow" style="border: none">
                                <div class="card-body table-responsive p-3">
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
@endsection
