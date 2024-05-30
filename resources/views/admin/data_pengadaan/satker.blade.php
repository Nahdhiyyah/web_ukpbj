@extends('admin.main')
@section('title', 'Data Satker')
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
                                            <h3>Data Satuan Kerja</h3>
                                        </div>
                                        <div class="col d-grid gap-2 d-md-flex justify-content-md-end"><a
                                                href="{{ route('satker.insert') }}" class="btn btn-md btn-success mb-3"
                                                 style="background-color: #8C0C14; border:none">Muat Data Satuan Kerja</a>
                                        </div>
                                    </div>
                                    <table class="table my-3" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Satuan Kerja</th>
                                                <th>Kode Satuan Kerja</th>
                                                <th>Kode Satuan Kerja STR</th>
                                                <th>Nama KLPD</th>
                                                <th>Kode KLPD</th>
                                                <th>Jenis KLPD</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @forelse ($satker as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->nama_satker }}</td>
                                                    <td>{{ $item->kd_satker }}</td>
                                                    <td>{{ $item->kd_satker_str }}</td>
                                                    <td>{{ $item->nama_klpd }}</td>
                                                    <td>{{ $item->kd_klpd }}</td>
                                                    <td>{{ $item->jenis_klpd }}</td>
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

                <script>
                    //message with toastr
                    @if (session()->has('success'))

                        toastr.success('{{ session('success') }}', 'BERHASIL!');
                    @elseif (session()->has('error'))

                        toastr.error('{{ session('error') }}', 'GAGAL!');
                    @endif
                </script>
            </div>
        </body>
    @endauth
@endsection
