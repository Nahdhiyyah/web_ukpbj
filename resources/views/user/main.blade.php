<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    {{-- Datatables --}}
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">

    <title>UKPBJ Banyuwangi</title>
</head>

<body style="background-image: url(public/img/bg_session.png);">
    <!-- Brand & Contact Start -->
    <div class="container-fluid py-0 px-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row align-items-center top-bar">
            <div class="col-lg-4 col-md-12 text-center text-lg-start">
                <a href="" class="navbar-brand m-0 p-0">
                    <img src="public/img/UKPBJ Logo.png" alt="Logo" width="200">
                </a>
            </div>
            <div class="col-lg-8 col-md-7 d-none d-lg-block">
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle" style="color: #8C0C14;">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Email</p>
                                <h6 class="mb-0">ukpbj.banyuwangi@gmail.com</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle " style="color: #8C0C14;">
                                <i class="bi bi-clock"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Jam Buka</p>
                                <h6 class="mb-0">Mon - Fri, 7:00 - 14:00</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle" style="color: #8C0C14;">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Telepon</p>
                                <h6 class="mb-0">(0333) 425001 - 425011</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Brand & Contact End -->

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s"
        style="background-color: #8C0C14;">
        <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
        <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto p-3 p-lg-0">
                <a href="{{ route('home') }}" class="nav-item nav-link active">Beranda</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profil</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="{{ route('home.profil') }}" class="dropdown-item">Tentang Kami</a>
                        <a href="{{ route('home.struktur') }}" class="dropdown-item">Struktur Organisasi</a>
                        <a href="{{ route('home.tupoksi') }}" class="dropdown-item">Tupoksi</a>
                    </div>
                </div>


                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Publikasi</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="{{ route('pengumuman.home') }}" class="dropdown-item">Pengumuman</a>
                        <a href="{{ route('berita.home') }}" class="dropdown-item">Berita</a>
                        <a href="{{ route('home.gallery') }}" class="dropdown-item">Gallery</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Data Pengadaan</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="{{ route('tender.home') }}" class="dropdown-item">Tender</a>
                        <a href="{{ route('nontender.home') }}" class="dropdown-item">Non Tender</a>
                        <a href="{{ route('e_purchasing.home') }}" class="dropdown-item">E-Purchasing</a>
                        <a href="{{ route('pencatatan.swakelola.home') }}" class="dropdown-item">Pencatatan
                            Swakelola</a>
                        <a href="{{ route('pencatatan.non_spk.home') }}" class="dropdown-item">Pencatatan
                            Non SPK</a>

                        {{-- link sirup error --}}
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="dropdown-item dropdown-toggle"
                                data-bs-toggle="dropdown">Sirup</a>
                            <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                                <a href="{{ route('sirup_swakelola.home') }}" class="dropdown-item">Swakelola</a>
                                <a href="{{ route('penyedia.home') }}" class="dropdown-item">Penyedia</a>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="{{ route('home.user.konsul') }}" class="dropdown-item">Konsultasi</a>
                        <a href="{{ route('home.user.survey') }}" class="dropdown-item">Survey Kepuasan</a>
                        <a href="{{ route('home.user.pengaduan') }}" class="dropdown-item">Pusat Pengaduan</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pusat Informasi</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="{{ route('materi.home') }}" class="dropdown-item">Materi/Informasi</a>
                        <a href="{{ route('pengadaan.home') }}" class="dropdown-item">Seputar Pengadaan</a>
                    </div>
                </div>

                <a href="{{ route('produkhukum.home') }}" class="nav-item nav-link">Produk Hukum</a>
                <a href="{{ route('home.kontak') }}" class="nav-item nav-link">Kontak</a>
            </div>
            @auth
                <form method="POST" action="{{ route('logout') }}" class="p-3">
                    @csrf
                    <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm"
                        onclick="event.preventDefault();
                            this.closest('form').submit();">Sign
                        Out
                    </a>
                </form>
            @else
                <div class="btn-group">
                    <a href="{{ route('login') }}" type="button" class="btn btn-light btn-sm m-auto">Sign
                        in</a>
                    <a href="{{ route('register') }}" type="button" class="btn btn-outline-light btn-sm m-auto">Sign
                        up</a>
                </div>
            @endauth
    </nav>
    <!--navbar end-->
    @include('sweetalert::alert')
    @yield('navbar')
    @include('user.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"
        style="background-color: #8C0C14; border:none"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
</body>

</html>
