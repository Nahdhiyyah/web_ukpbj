@extends ('user.main')
@section('navbar')
    <div class="container py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">E Purchasing</h6>
            </div>
        </div>
    </div>
    <div class="container-fluid px-5">
        <div class="row mb-4">
            <div class="col">
                <div class="card shadow p-3 text-center" style="border: none">
                    <p>Jumlah Paket</p>
                    <h2>{{ number_format($e_purchasing->count(), 0, ',', '.') }}</h2>
                </div>
            </div>
            <div class="col">
                <div class="card shadow p-3 text-center" style="border: none">
                    <p>Total Jenis Produk</p>
                    {{-- masih dumy --}}
                    <h2>{{ number_format($e_purchasing->count(), 0, ',', '.') }}</h2>
                </div>
            </div>
            <div class="col">
                <div class="card shadow p-3 text-center" style="border: none">
                    <p>Nilai E-Purchasing</p>
                    {{-- masih dumy --}}
                    <h2>{{ number_format($e_purchasing->count(), 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid px-5">
        <div class="card shadow p-5" style="border: none">
            <div class="row">
                <table id="example" class="table" style="width:100%;">
                    <thead class="table">
                        <tr>
                            <th>No</th>
                            <th>Nama Satuan Kerja</th>
                            <th>Nama Paket</th>
                            <th>Kuantitas</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody class="table">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($grouped as $items => $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item[0]->nama_satker }}<b><a href="{{ route('e_purchasing.home.satker', $item[0]->kd_satker) }}">{{ '[' . $item[0]->kd_satker . ']' }}</a></b></td>
                                <td>{{ $item[0]->nama_paket }}<b><a
                                    href="{{ route('e_purchasing.home.paket', $item[0]->no_paket) }}">{{ '[' . $item[0]->no_paket . ']' }}</a></b></td>
                                <td>{{ $item[0]->kuantitas }}</td>
                                <td>Rp. {{ number_format($item[0]->total_harga, 0, ',', '.') }}</td>
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
