@extends ('user.main')
 
@section('navbar')

    <body style="background-image: url(img/bg_session.png);">
        <div class="container py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
                    <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Data Laporan Pengaduan</h6>
                </div>
            </div> 
        </div>

        <div class="container-fluid">
            <div class="card shadow p-5" style="border: none">
                <div class="row">
                  <div class="col-lg-3">
                    <a href="{{ route('pengaduan.create')}}" type="button" class="btn btn-primary mb-3"
                        style="background-color: #8C0C14; border:none;">Buat Pengaduan Baru</a>
                </div>
                    <table id="example" class="table" style="width:100%; ">
                        <thead>
                            <tr>
                              <th>No.</th>
                              <th>Judul Pengaduan</th>
                              <th>Tanggal</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($items as $item)
                            @if($item->user_id == Auth::user()->id)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->created_at->format('l, d F Y') }}</td>
                                    @if($item->status =='Belum di Proses')
                                    <td>
                                      <span
                                        class="badge rounded-pill bg-danger">
                                        {{ $item->status }}
                                      </span>
                                    </td>
                                    @elseif ($item->status =='Sedang di Proses')
                                    <td>
                                      <span
                                        class="badge rounded-pill bg-warning text-dark">
                                        {{ $item->status }}
                                      </span>
                                    </td>
                                    @else
                                    <td>
                                      <span
                                        class="badge rounded-pill bg-success">
                                        {{ $item->status }}
                                      </span>
                                    </td>
                                    @endif
                                    <td>
                                      <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                          action="{{ route('pengaduan.hapus',$item->id) }}" method="POST"
                                          id="delete">

                                          {{-- @if ($item->status != 'Terkirim') --}}
                                              <a href="{{ route('pengaduan.lihat',$item->id) }}"
                                                  class="btn btn-sm btn-warning m-1" type="button"
                                                  title="Lihat detail Pengaduan" style="width: 75px">
                                                  Lihat
                                              </a>
                                          {{-- @else --}}
                                              {{-- <a href="#"
                                                  style="width: 75px" class="btn btn-sm btn-info m-1"
                                                  type="button" title="Terima konsultasi">Terima</a> --}}
                                          {{-- @endif --}}
                                          {{-- @if ($item->status == 'Selesai') --}}
                                              {{-- <a href="#"
                                                  class="btn btn-sm btn-warning disabled m-1" style="width: 75px">
                                                  Edit
                                              </a> --}}
                                          {{-- @else --}}
                                              {{-- <a href="#"
                                                  class="btn btn-sm btn-warning m-1" title="Edit balasan"
                                                  style="width: 75px">
                                                  Edit
                                              </a> --}}
                                          {{-- @endif
                                          @csrf
                                          @method('DELETE') --}}
                                          @csrf
                                          @method('delete')
                                          <button type="submit" class="btn btn-sm btn-danger m-1"
                                              title="Hapus data Pengaduan" style="width: 75px">
                                              Hapus
                                          </button>
                                      </form>
                                  </td>
                                </tr>
                              @endif
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <script>
          $('#example').DataTable();
        </script>
    </body>
    </html> 
@endsection










{{-- @extends('user.main')
@section('navbar')

@section('title')
Laporan Data Pengaduan
@endsection
@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Laporan Data Pengaduan User
    </h2>
    <button style="background: #18762e; height: 30px; border-radius: 5px; padding: 5px; padding-bottom:10px">
      <a href="{{ route('pengaduan.create')}}"
        class="flex items-center justify-between  text-sm font-medium leading-5 text-white rounded-lg dark:text-white-400 focus:outline-none focus:shadow-outline-gray"
        aria-label="Detail">
        + Tambah Pengaduan 
      </a>
    </button><br>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }} </li>
            @endforeach
          </ul>
        </div>
        @endif
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">No.</th>
              <th class="px-4 py-3">Judul Pengaduan</th>
              <th class="px-4 py-3">Tanggal</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">Aksi</th>
            </tr>
          </thead>
          @php
          $no = 1;
          @endphp
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($items as $item)
            @if($item->user_id == Auth::user()->id)
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3 text-sm">
                  {{ $no++ }}
                </td>
                <td class="px-4 py-3 text-sm">
                  {{ $item->judul }}
                </td>
                <td class="px-4 py-3 text-sm">
                  {{ $item->created_at->format('l, d F Y - H:i:s') }}
                </td>
                @if($item->status =='Belum di Proses')
                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                    {{ $item->status }}
                  </span>
                </td>
                @elseif ($item->status =='Sedang di Proses')
                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                    {{ $item->status }}
                  </span>
                </td>
                @else
                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                    {{ $item->status }}
                  </span>
                </td>
                @endif

                <td class="px-4 py-3">
                  <div class="flex items-center space-x-4 text-sm">     
                    <a href="{{ route('pengaduan.lihat',$item->id) }}" 
                      class="flex items-center justify-between  text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                      aria-label="Detail">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </a> 
                    <form action="{{ route('pengaduan.hapus',$item->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button
                        class="flex items-center justify-between  text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                        aria-label="Delete">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                        </svg>
                      </button> 
                    </form>
                  </div>
                </td>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
</main>
@endsection  --}}
