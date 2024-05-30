@extends('admin.main')
@section('title', 'Pencatatan Swakelola')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="card p-2 shadow-md" style="border: none">
                    <div class="card-body table-responsive p-3">
                        <div class="row">
                            <div class="col">
                                <h3>Pencatatan Swakelola</h3>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('swakelola.insert') }}" class="btn btn-md btn-success mb-3"
                                         style="background-color: #8C0C14; border:none">Muat Data
                                        Pencatatan Swakelola</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-striped my-3" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Paket</th>
                                        <th>Satuan Kerja</th>
                                        <th>Pagu RUP</th>
                                        <th>Realisasi</th>
                                        <th>Status Paket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($swakelola as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nama_paket }}</td>
                                            <td>{{ $item->nama_satker }}</td>
                                            <td>{{ number_format($item->pagu, 0, ',', '.') }}</td>
                                            <td>{{ number_format($item->total_realisasi, 0, ',', '.') }}</td>
                                            <td>{{ $item->status_swakelola_pct_ket }}</td>
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

    @endauth
@endsection
