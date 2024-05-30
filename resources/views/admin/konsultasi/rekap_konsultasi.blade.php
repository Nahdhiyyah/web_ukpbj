@extends('admin.main')
@section('title', 'Rekap Konsultasi')
@section('content')
    @auth
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="col py-3">
                    <h3>Rekapitulasi Konsultasi Bulan {{ date('F', time()) }} {{ date('Y', time()) }}</h3>
                    <div class="row">
                        <div class="col-6 my-3">
                            <div class="card text-success shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Selesai</h4>
                                            <h1>{{ $konsul_selesai }}</h1>
                                        </div>
                                        <div class="col text-end mt-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75"
                                                fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0" />
                                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 my-3">
                            <div class="card shadow text-warning border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Sedang diproses</h4>
                                            <h1>{{ $konsul_diproses }}</h1>
                                        </div>
                                        <div class="col text-end mt-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75"
                                                fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card shadow text-danger border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Butuh feedback</h4>
                                            <h1>{{ $konsul_butuhfeedback }}</h1>
                                        </div>
                                        <div class="col text-end mt-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70"
                                                fill="currentColor" class="bi bi-chat-right-dots" viewBox="0 0 16 16">
                                                <path
                                                    d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                                                <path
                                                    d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card border-0 text-info shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Terkirim</h4>
                                            <h1>{{ $konsul_terkirim }}</h1>
                                        </div>
                                        <div class="col text-end mt-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75"
                                                fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <a class="btn btn-primary" href="{{ route('cetak.rekap.konsul') }}" target="_blank"
                            role="button">Export Rekapitulasi Konsultasi</a>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
