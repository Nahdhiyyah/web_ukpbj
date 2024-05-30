@extends ('user.main')

@section('navbar')
    <div class="container pt-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Berita</h6>
            </div>
        </div>
    </div>

    <div class="container-fluid p-5">
        <div class="card table-responsive shadow p-5" style="border: none">
            <div class="row">
                <table id="example" class="table" style="width:100%; ">
                    <thead class="table">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                        </tr>
                    </thead>
                    <tbody class="table">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($berita as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><a href="{{ route('show.berita.home', $item->id) }}"> {{ $item->judul }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script>
        $('#example').DataTable();
    </script>
    
@endsection
