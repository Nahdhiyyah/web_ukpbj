@extends('user.main')
@section('navbar')
@include('includes.pengaduan.style')

{{-- @section('content') --}}
{{-- <body style="background-image: url(img/bg_session.png);"> --}}
  <div class="container py-5">
      <div class="container">
          <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; ">
              <h6 class="section-title bg-white text-center px-3" style="color: #8C0C14;">Detail Laporan Pengaduan</h6>
          </div>
      </div>
  </div>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <div
          class="text-gray-800 text-sm font-semibold px-4 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400 ">
          <h5 class="mt-2">Nama Pengadu : {{ $item->user->name }}</h5>
          <h5 class="mt-2">Email Pengadu : {{ $item->user->email }}</h5>
          <h5 class="mt-2">Judul Pengaduan : {{ $item->judul }}</h5>
          <h5 class="mt-2">Tanggal Pengaduan : {{ $item->created_at->format('l, d F Y') }}</h5>
          {{-- <h5 class="mt-2">Tanggal Pengaduan di Tanggapi: {{ $item->tangap->created_at->format('l, d F Y - H:i:s') }}</h5> --}}
          <h5 class="mt-2">Status :
            @if($item->status =='Belum di Proses')
            <span
                  class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                  {{ $item->status }}
            </span>
            @elseif ($item->status =='Sedang di Proses')
            <span
                  class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                  {{ $item->status }}
            </span>
            @else
            <span
                  class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                  {{ $item->status }}
                </span>
            @endif
          </h5>
        </div>

        <div class="px-4 py-3 mb-8 flex text-gray-800 bg-white rounded-lg shadow-md dark:bg-gray-800">
          <div class="text-center flex-1 dark:text-gray-400">
            <h4 class="mb-8 font-semibold">- Keterangan -</h4>
            <p class="text-gray-800 dark:text-gray-400">
              {{ $item->isi}}
            </p>
          </div>
        </div>
        <div class="px-4 py-3 mb-2 flex bg-white rounded-lg shadow-md dark:text-gray-400   dark:bg-gray-800">

          <div class="text-center flex-1">
            <h4 class="mb-8 font-semibold">- Tanggapan Admin -</h4>
            <p class="text-gray-800 dark:text-gray-400">
              @if (empty($tanggap->tanggapan))
              Belum ada tanggapan
              @else
              {{ $tanggap->tanggapan}}
              @endif
            </p>
          </div>
        </div>
      </div>
    </div>

</main>
@endsection
