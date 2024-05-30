@extends('user.main')
@section('navbar')
    <div class="container pt-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">E Purchasing</h6>
            </div>
        </div>
    </div>
    <div class="container-fluid p-5" style="padding-top: 0.5cm">
        <div class="card shadow" style="border: none">
            <div class="card-body table-responsive p-3">
                <div class="row">
                    <div class="col p-3 m-2 rounded" style="background-color: rgb(235, 240, 216)">
                        <small class="text-muted">Satuan Kerja</small><br>
                        <h5>
                            <b>{{ $satker[0]->nama_satker }}</b>
                        </h5>
                    </div>

                </div>

                <table class="table my-3 " id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Paket</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Ongkos Kirim</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($satker as $items => $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_paket }}</td>
                                <td>{{ $item->kuantitas }}</td>
                                <td>{{ $item->ongkos_kirim }}</td>
                                <td>Rp. {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis', 'print']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    </script>
@endsection
