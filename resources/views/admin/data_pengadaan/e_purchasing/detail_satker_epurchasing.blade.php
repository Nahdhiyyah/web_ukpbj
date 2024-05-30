@extends('admin.main')
@section('title', 'E Purchasing')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid mt-5 mb-5" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-2 shadow-md" style="border: none">
                            <div class="card-body table-responsive p-3">

                                <div class="row">

                                    <div class="col p-3 m-2 rounded" style="background-color: rgb(235, 240, 216)">

                                        <small class="text-muted">Satuan Kerja</small><br>
                                        <h5>
                                            <b>{{ $satker[0]->nama_satker }}</b>
                                        </h5>
                                    </div>

                                </div>

                                <table class="table table-striped my-3 " id="example" style="width:100%">
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
                </div>
            </div>


            <script>
                //message with toastr
                @if (session()->has('success'))

                    toastr.success('{{ session('success') }}', 'BERHASIL!');
                @elseif (session()->has('error'))

                    toastr.error('{{ session('error') }}', 'GAGAL!');
                @endif
            </script>
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Your work has been saved",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>

            <script>
                var table = $('#example').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis', 'print']
                });

                table.buttons().container()
                    .appendTo('#example_wrapper .col-md-6:eq(0)');
            </script>
        </div>
    @endauth
@endsection
