@extends('user.main')
@section('navbar')
    <div class="container py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Pencatatan Non SPK</h6>
            </div>
        </div>
    </div>
        <div class="content-wrapper">
            <div class="container-fluid px-5" style="padding-top: 0.5cm">
                <div class="card p-2 shadow p-5" style="border: none">
                    <div class="card-body table-responsive p-3">
                        <div class="col-md-12">
                            <table class="table my-3" id="example">
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
                                    @foreach ($non_spk as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nama_paket }}</td>
                                            <td>{{ $item->nama_satker }}</td>
                                            <td>{{ number_format($item->pagu, 0, ',', '.') }}</td>
                                            <td>{{ number_format($item->total_realisasi, 0, ',', '.') }}</td>
                                            <td>{{ $item->status_nontender_pct }}</td>
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
        
@endsection
