@extends('admin.main')
@section('title', 'Non Tender')
@section('content')
    @auth

        <body>
            <div class="content-wrapper">
                <div class="container-fluid" style="padding-top: 0.5cm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card p-2 shadow-md" style="border: none">
                                <div class="card-body table-responsive p-3">
                                    <div class="row">
                                        <div class="col">
                                            <h3>Data Non Tender</h3>
                                        </div>
                                        <div class="col d-grid gap-2 d-md-flex justify-content-md-end"><a
                                                href="{{ route('nontender.insert') }}" class="btn btn-md btn-success mb-3"
                                                 style="background-color: #8C0C14; border:none">Muat Data Non
                                                Tender</a>
                                        </div>
                                        <table class="table my-3" id="example" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Paket</th>
                                                    <th>Satuan Kerja</th>
                                                    <th>HPS</th>
                                                    <th>Nilai Pengadaan</th>
                                                    <th>Efisiensi</th>
                                                    <th>Rekanan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($nontender as $item)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $item->nama_paket }}</td>
                                                        <td>{{ $item->nama_satker }}</td>
                                                        <td>{{ number_format($item->hps, 0, ',', '.') }}</td>
                                                        <td>{{ number_format($item->nilai_kontrak, 0, ',', '.') }}</td>

                                                        @if ($item->nilai_kontrak == 1)
                                                            <td>{{ number_format($item->hps - $item->nilai_kontrak, 0, ',', '.') }}
                                                            </td>
                                                        @else
                                                            <td>{{ number_format($item->hps - $item->nilai_negosiasi, 0, ',', '.') }}
                                                            </td>
                                                        @endif

                                                        <td>{{ $item->nama_penyedia }}</td>
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
                        $('#example').DataTable();
                    </script>
                </div>
            </div>
        </body>
    @endauth
@endsection
