@extends('user.main')
@section('navbar')
@include('includes.pengaduan.style')

    <body>
        <main class="h-full pb-16 overflow-y-auto">
            <div class="container px-6 mx-auto grid">
                <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
                </h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pengaduan.store') }} " method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="px-4 py-3 mb-8 bg-red-300 rounded-lg shadow-xl shadow-lg dark:bg-gray-800 bg-white">
                      <label class="block text-sm">
                        {{-- <button style="background: #18762e; height: 30px; border-radius: 5px; padding: 5px; padding-bottom:10px">
                            <a href="{{ route('pengaduan.laporan')}}"
                              class="flex items-center justify-between  text-sm font-medium leading-5 text-white rounded-lg dark:text-white-400 focus:outline-none focus:shadow-outline-gray"
                              aria-label="Detail">
                              Lihat Laporan Pengaduan
                            </a>
                          </button> --}}
                            <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
                                Form Pengaduan
                            </h2>
                            <h6 class="my-3 font-semibold text-gray-700 dark:text-gray-200">Judul Pengaduan</h6>
                            <input type="text"
                              class="block w-full mt-1 text-sm border-2 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
                              rows="8" type="text" placeholder="Masukkan Judul Pengaduan"
                              name="judul"
                              value="{{ old('judul') }}" name="judul">
                            <h6 class="my-3 font-semibold text-gray-700 dark:text-gray-200">Isi Pengaduan</h6>
                            <textarea
                                class="block w-full mt-1 text-sm border-2 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
                                rows="8" type="text" placeholder="Masukkan Isi Pengaduan Dengan Jelas"
                                name="isi"
                                value="{{ old('isi') }}" name="isi"></textarea>
                        </label>

                        <label for="image" class="block mt-4 text-sm">
                          <h6 class="my-3 font-semibold text-gray-700 dark:text-gray-100">File Pendukung</h6>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="file" value="{{ old('file') }}" name="file" />
                        </label>
                        <button style="width: 100%" type="submit"
                            class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                            Laporkan
                        </button>
                        <button style="width: 100%" type="back"
                        class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-red">
                        <a href="{{ route('pengaduan.detail')}}">Lihat Data Laporan</a>
                    </button>
                    </div>
                </form>
        </main>


    </body>

    </html>
@endsection
