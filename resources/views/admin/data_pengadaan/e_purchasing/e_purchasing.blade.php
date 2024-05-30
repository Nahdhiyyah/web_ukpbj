@extends('admin.main')
@section('title', 'E Purchasing')
@section('content')
    @auth

        {{-- <body> --}}
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-2 shadow-md" style="border: none">
                            <div class="card-body table-responsive">
                                <div class="row">
                                    <div class="col">
                                        <h3>Data E-Purchasing</h3>
                                    </div>
                                    <div class="col">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('e_purchasing.insert') }}" class="btn btn-md btn-success mb-3"
                                                 style="background-color: #8C0C14; border:none">Muat Data E-Purchasing</a>
                                            <a href="{{ route('komoditas.insert') }}" class="btn btn-md btn-primary mb-3"
                                                 style="background-color: #8C0C14; border:none">Muat Data Komoditas</a>
                                        </div>
                                    </div>
                                </div>

                                <table class="table" id="example" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Satuan Kerja</th>
                                            <th scope="col">Kode Satuan Kerja STR</th>
                                            <th scope="col">Nama Paket</th>
                                            <th scope="col">Jumlah Jenis Produk</th>
                                            <th scope="col">Kuantitas</th>
                                            <th scope="col">Ongkos Kirim</th>
                                            <th scope="col">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($grouped as $items => $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item[0]->nama_satker }} <b><a
                                                            href="{{ route('e_purchasing.detail.satker', $item[0]->kd_satker) }}">{{ '[' . $item[0]->kd_satker . ']' }}</a></b>
                                                </td>
                                                <td>{{ $item[0]->kd_satker_str }}</td>
                                                <td>{{ $item[0]->nama_paket }} <b><a
                                                            href="{{ route('e_purchasing.detail', $item[0]->no_paket) }}">{{ '[' . $item[0]->no_paket . ']' }}</a></b>
                                                </td>
                                                <td>{{ $item[0]->jml_jenis_produk }}</td>
                                                <td>{{ $item[0]->kuantitas }}</td>
                                                <td>{{ $item[0]->ongkos_kirim }}</td>
                                                <td>Rp. {{ number_format($item[0]->total_harga, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
            $('#example').DataTable();
        </script>
    @endauth
@endsection
