@extends('user.main')
@section('navbar')
    <div class="container pt-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Produk Hukum</h6>
            </div>
        </div>
    </div>

    <div class="container-fluid p-5">
        <div class="card shadow p-5" style="border: none">
            <div class="row">
                <table id="example" class="table" style="width:100%;">
                    <thead class="table">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Nomor</th>
                            <th>Tahun</th>
                            <th>Tentang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($prohum as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->nomor }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>{!! html_entity_decode($item->isi) !!}</td>
                                <td class="text-center">
                                    <a href="{{ asset('/storage/produks/' . $item->file) }}" target="_blank"
                                        style="color: #8C0C14"><button class="btn btn-sm btn-dark border-0" style="background-color: #8C0C14; width:75px">Lihat</button></a>
                                </td>
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
