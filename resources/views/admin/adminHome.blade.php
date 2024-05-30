@extends('admin.main')
@section('title', 'Dashboard')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{-- <x-app-layout> --}}
        <div class="container-fluid " style="padding-top: 0.5cm">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $tender->count() }}</h3>
                                    <p>Tender</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-book"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $non_tender->count() }}</h3>
                                    <p>Non - Tender</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-search"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $pencatatan->count() }}</h3>
                                    <p>Pencatatan</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-edit"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $e_purchasing->count() }}</h3>
                                    <p>E-Purchasing</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-copy"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->

                <div class="container mt-3">
                    <div class="card">
                        <div class="card-header">
                            Rekapitulasi Survey Perbulan
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div id="grafik_survey"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var rekap_survey = <?php echo json_encode($survey); ?>;
        var bulan = <?php echo json_encode($bulan); ?>;
        
        Highcharts.chart('grafik_survey', {
            title: {
                text: 'Rekapitulasi Survey Pelayanan Publik'
            },
            xAxis: {
                categories: bulan
            },
            yAxis: {
                title: {
                    text: 'Total Penilaian Bulanan'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Total Penilaian',
                data: rekap_survey
            }]
        });
    </script>

@endsection
