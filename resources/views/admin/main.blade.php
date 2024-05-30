<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - UKPBJ</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('tampilan/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('tampilan/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('tampilan/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('tampilan/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('tampilan/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('tampilan/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('tampilan/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('tampilan/dist/css/adminlte.min.css') }}">

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
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-align-justify"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
                </li>
            </ul>
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="nav-link"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">Logout</a>
                    </form>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        {{-- @include('layouts.navigation') --}}

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ asset('tampilan/docs/assets/img/ukpbj.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">UKPBJ</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('/storage/users-avatar/' . Auth::user()->avatar) }}"
                            class="img-circle elevation-2" alt="User Image"
                            style="width: 35px; height:35px; border-radius: 50%; object-fit: cover">
                    </div>
                    <div class="info">
                        <span>
                            <a href="{{ route('profile.edit') }}" class="d-block"
                                target="__blank"><b>{{ Auth::user()->name }}
                                </b>
                            </a>
                            <small class="text-light">{{ '(' . Auth::user()->role . ')' }}</small>
                        </span>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-bullhorn nav-icon"></i>
                                <p>
                                    Publikasi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('pengumuman.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengumuman</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('berita.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Berita</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Data Pengadaan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('tender.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tender</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('nontender.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Non Tender</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('e_purchasing.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>E-Purchasing</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('satker.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Satuan Kerja</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('swakelola.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pencatatan Swakelola</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pencatatan Non SPK</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../forms/validation.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Sirup
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-circle nav-icon"></i>
                                                <p>Swakelola</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../forms/validation.html" class="nav-link">
                                                <i class="fas fa-circle nav-icon"></i>
                                                <p>Penyedia</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Layanan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Survey</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('daftar.konsul.admin') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Konsultasi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-globe"></i>
                                <p>
                                    Pusat Informasi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('materi.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Materi / Informasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('pengadaan.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Seputar Pengadaan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('produk.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-suitcase"></i>
                                <p>
                                    Produk Hukum
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gallery.index') }}" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>
                        @if (Auth::user()->role == 'super_admin')
                            <li class="nav-item">
                                <a href="{{ route('manage.user.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-user-plus"></i>
                                    <p>
                                        User
                                    </p>
                                </a>
                            </li>
                        @endif

                        <div class="border-top pt-3 mt-3" style="border-color: darkgrey"></div>
                        <li class="nav-item">
                            {{-- <div class="border-top pt-3 mt-3" style="border-color: darkgrey"> --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="nav-link"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="nav-icon fas fa-power-off"></i>
                                    <p>Logout</p>
                                </a>
                            </form>
                            {{-- </div> --}}
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        
        @include('sweetalert::alert')
        @yield('content')

        <footer class="main-footer">
            <strong>UKPBJ Banyuwangi &copy; 2023.</strong>
        </footer>

        <!-- jQuery -->
        <script src="{{ asset('tampilan/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('tampilan/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('tampilan/plugins/chart.js/Chart.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('tampilan/dist/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('tampilan/dist/js/demo.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('tampilan/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Sparkline -->
        <script src="{{ asset('tampilan/plugins/sparklines/sparkline.js') }}"></script>
        <!-- JQVMap -->
        <script src="{{ asset('tampilan/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('tampilan/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('tampilan/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('tampilan/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('tampilan/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('tampilan/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- Summernote -->
        <script src="{{ asset('tampilan/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('tampilan/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('tampilan/dist/js/pages/dashboard.js') }}"></script>


        <!-- Page specific script -->
        <script>
            $(function() {
                /* ChartJS
                 * -------
                 * Here we will create a few charts using ChartJS
                 */

                //--------------
                //- AREA CHART -
                //--------------

                // Get context with jQuery - using jQuery's .get() method.
                var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

                var areaChartData = {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                            label: 'Digital Goods',
                            backgroundColor: 'rgba(60,141,188,0.9)',
                            borderColor: 'rgba(60,141,188,0.8)',
                            pointRadius: false,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: [28, 48, 40, 19, 86, 27, 90]
                        },
                        {
                            label: 'Electronics',
                            backgroundColor: 'rgba(210, 214, 222, 1)',
                            borderColor: 'rgba(210, 214, 222, 1)',
                            pointRadius: false,
                            pointColor: 'rgba(210, 214, 222, 1)',
                            pointStrokeColor: '#c1c7d1',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                    ]
                }

                var areaChartOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: false,
                            }
                        }]
                    }
                }

                // This will get the first returned node in the jQuery collection.
                new Chart(areaChartCanvas, {
                    type: 'line',
                    data: areaChartData,
                    options: areaChartOptions
                })

                //-------------
                //- LINE CHART -
                //--------------
                var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
                var lineChartOptions = $.extend(true, {}, areaChartOptions)
                var lineChartData = $.extend(true, {}, areaChartData)
                lineChartData.datasets[0].fill = false;
                lineChartData.datasets[1].fill = false;
                lineChartOptions.datasetFill = false

                var lineChart = new Chart(lineChartCanvas, {
                    type: 'line',
                    data: lineChartData,
                    options: lineChartOptions
                })

                //-------------
                //- DONUT CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
                var donutData = {
                    labels: [
                        'Chrome',
                        'IE',
                        'FireFox',
                        'Safari',
                        'Opera',
                        'Navigator',
                    ],
                    datasets: [{
                        data: [700, 500, 400, 600, 300, 100],
                        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    }]
                }
                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                })

                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                var pieData = donutData;
                var pieOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: pieData,
                    options: pieOptions
                })

                //-------------
                //- BAR CHART -
                //-------------
                var barChartCanvas = $('#barChart').get(0).getContext('2d')
                var barChartData = $.extend(true, {}, areaChartData)
                var temp0 = areaChartData.datasets[0]
                var temp1 = areaChartData.datasets[1]
                barChartData.datasets[0] = temp1
                barChartData.datasets[1] = temp0

                var barChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false
                }

                new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                })

                //---------------------
                //- STACKED BAR CHART -
                //---------------------
                var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
                var stackedBarChartData = $.extend(true, {}, barChartData)

                var stackedBarChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    }
                }

                new Chart(stackedBarChartCanvas, {
                    type: 'bar',
                    data: stackedBarChartData,
                    options: stackedBarChartOptions
                })
            })
        </script>
        @stack('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>
