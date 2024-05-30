    @extends('admin.main')
    @section('title', 'Lihat Jawaban')
    @section('content')
        @auth
            <div class="content-wrapper">
                <div class="container-fluid" style="padding-top: 0.5cm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card p-2 shadow-md" style="border: none">
                                <div class="card-body table-responsive p-3">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Detail Jawaban Survey</h4>
                                        </div>
                                    </div>
                                    <div class="row my-5">
                                        <div class="col-md-1">
                                            <img src="{{ asset('/storage/users-avatar/' . $jawaban_pg[0]->user->avatar) }}"
                                                style="width: 75px; height:75px;  object-fit: cover">
                                        </div>
                                        <div class="col-md-2">
                                            <h6>Nama</h6>
                                            <h6>Email</h6>
                                            <h6>Judul Survey</h6>
                                        </div>
                                        <div class="col-md-9">
                                            <h6>: {{ $jawaban_pg[0]->user->name }}</h6>
                                            <h6>: {{ $jawaban_pg[0]->user->email }}</h6>
                                            <h6>: {{ $jawaban_pg[0]->survey->judul_survey }}</h6>
                                        </div>
                                    </div>
                                    <h5 class="text-center">Jawaban Pilihan Ganda</h5>
                                    <table id="example" class="table" style="width:100%;">
                                        <thead class="table">
                                            <tr>
                                                <th>No</th>
                                                <th>Pertanyaan</th>
                                                <th class="text-center">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($jawaban_pg as $item)
                                                <tr>
                                                    <td>{{ $no++ }}.</td>
                                                    <td>
                                                        {!! $item->pertanyaan->pertanyaan !!}
                                                    </td>
                                                    <td class="text-center">{{ $item->jawaban_pg }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                    <div class="row my-5 justify-content-center">
                                        <div class="col-auto d-flex align-items-center">
                                            <small class="me-2">Total nilai:</small>
                                            <h4 class="me-4">{{ $total }}</h4>
                                            <small class="me-2">Predikat:</small>
                                            <h4>{{ $predikat }}</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card p-3 shadow-md">
                                <div class="text-center mt-3">
                                    <h5>Jawaban Isian</h5>
                                </div>
                                @foreach ($jawaban_isian as $item)
                                    <div class="mt-2 mx-3">
                                        <p>{!! $item->pertanyaan->pertanyaan !!}</p>
                                        <div class="card p-3">{{ $item->jawaban_isian }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('#example').DataTable();
            </script>
        @endauth
    @endsection
