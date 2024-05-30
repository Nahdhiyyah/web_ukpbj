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
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Kontak</h6>
                </div>
            </div>
        </div>
        <div class="container py-2">
            <div class="row g-5">
                <h1 class="col-lg-6 col-md-12 py-2 ">Hubungi Kami</h1>

                <div class="col-lg-6 col-md-12 py-2" style="text-align: justify; color:black">
                    <img src="img/UKPBJ Logo.png" alt="ukpbj" width="250">
                    <p> Bagian Pengadaan Barang dan Jasa <br /> Sekretariat Daerah Kabupaten Banyuwangi <br />
                        <br />
                        Jalan Jenderal A. Yani No. 100 Banyuwangi 68411 <br />
                        Call Center : ( 0333 ) 425001 - 425011 Faks (0333) 428500 <br />
                        Email : ukpbj.banyuwangi@gmail.com <br />
                    </p>
                </div>
            </div>
            <hr />

            <div class="row g-5">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.810521206532!2d114.36461597402108!3d-8.221801382517864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd15bd5016fee33%3A0xd6bac09ca7d1cb4f!2sBagian%20Pengadaan%20Barang%20dan%20Jasa%20Kab.%20Banyuwangi!5e0!3m2!1sen!2sid!4v1696904431223!5m2!1sen!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy" height="500px"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </body>

    </html>
@endsection
