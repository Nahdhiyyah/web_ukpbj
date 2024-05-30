<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Rekap Pengaduan {{ now() }}</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th,
        {
        font-size: 13pt;
        }
    </style>
    <div class="container text-center">
        <h4>Rekapitulasi Data Pengaduan</h4>
        <h3>Unit Kerja Pengadaan Barang dan Jasa</h3>
        <h4>Pemerintah Daerah Kabupaten Banyuwangi</h4>
        <h5>Bulan {{ date('F', time()) }} Tahun {{ date('Y', time()) }}</h5>
        <table class="table table-bordered my-5">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Status Pengaduan</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    <td>Selesai</td>
                    <td>{{ $pengaduan_selesai }}</td>
                </tr>
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    <td>Sedang diproses</td>
                    <td>{{ $pengaduan_diproses }}</td>
                </tr>
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    <td>Terkirim</td>
                    <td>{{ $pengaduan_terkirim }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
