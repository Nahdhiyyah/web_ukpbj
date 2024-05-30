@extends('user.main')
@section('navbar')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <style>
        .center {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            flex: 1 0 100%;
        }
    </style>

    <body>
        <div class="container py-5">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Profil</h6>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row g-5">
                <h1 class="col-lg-6 col-md-12 py-5 ">UKPBJ Kabupaten Banyuwangi</h1>
                <p class="col-lg-6 col-md-12 py-5" style="text-align: justify; color:black">UKPBJ sebagai pusat keunggulan
                    Pengadaan
                    Barang/Jasa adalah unit kerja yang memiliki
                    karakter strategis, kolaboratif, berorientasi pada
                    kinerja, proaktif dan mampu melakukan perbaikan
                    berkelanjutan sehingga merupakan pendorong
                    dalam penciptaan nilai tambah dan manfaat
                    dalam kegiatan pengadaan barang/jasa di Indonesia.
                </p>
            </div>
        </div>
        <hr />

        <div class="container">
            <div class="row g-5">
                <p class="col-lg-6 col-md-12 py-5 " style="text-align: justify; color:black">Dasar hukum Pembentukan UKPBJ
                    Kabupaten Banyuwangi : <br />
                    Peraturan Presiden Nomor 16 Tahun
                    2018 Tentang Pengadaan Barang/Jasa
                    Pemerintah<br />
                    Permendagri No. 112 Tahun 2018
                    Tentang Pembentukan Unit Kerja
                    Pengadaan Barang/Jasa Lingkungan
                    Pemerintah Daerah Provinsi dan
                    Kabupaten/Kota; <br />
                    Perlem LKPP nomor 14 Tahun 2018
                    tentang Unit Kerja Pengadaan Barang/Jasa; <br />

                    Peraturan Bupati Banyuwangi
                    No. 04 Tahun 2019 Tentang Kedudukan,
                    Susunan Organisasi, Tugas Dan Fungsi
                    Serta Tata Kerja Sekretariat Daerah
                    Kabupaten Banyuwangi. <br />

                <h1 class="col-lg-6 col-md-12 py-5 " style="text-align: center;">Dasar Dasar Hukum</h1>
            </div>
        </div>
        <hr />

        <div class="container">
            <div class="row g-5">
                <h1 class="col-lg-6 col-md-12 py-5 ">Tugas UKPBJ</h1>
                <p class="col-lg-6 col-md-12 py-5" style="text-align: justify; color:black">UKPBJ pemerintah daerah provinsi
                    dan pemerintah
                    daerah kabupaten/kota mempunyai tugas
                    menyelenggarakan dukungan Pengadaan
                    Barang/Jasa pada pemerintah daerah provinsi
                    dan daerah kabupaten/kota.</p>
            </div>
        </div>
        <hr />

        <div class="container">
            <div class="row g-5">
                <p class="col-lg-6 col-md-12 py-5" style="text-align: justify; color:black">Dalam rangka pelaksanaan tugas,
                    UKPBJ mempunyai fungsi: <br />
                    a. pengelolaan pengadaan barang/jasa; <br />
                    b. pengelolaan layanan pengadaan
                    secara elektronik; <br />
                    c. pembinaan dan advokasi pengadaan
                    barang/jasa; dand. pelaksanaan tugas
                    lain yang diberikan oleh kepala daerah
                    yang berkaitan dengan tugas dan fungsi</p>



                <h1 class="col-lg-6 col-md-12 py-5 " style="text-align: center;">Fungsi UKPBJ</h1>
            </div>
        </div>


        <div class="center">
            <iframe src="{{ asset('/storage/document/PERBUP_88_TAHUN_2021_SOTK_SETDA1.pdf') }}" width="800"
                height="600"></iframe>
        </div>
    </body>

    </html>
@endsection
