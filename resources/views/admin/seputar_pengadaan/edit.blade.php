@extends('admin.main')
@section('title', 'Seputar Pengadaan')
@section('content')
    @auth
        {{-- <x-app-layout> --}}
        <div class="content-wrapper">
            <div class="container" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 p-5 shadow rounded">
                            <h3 class="mx-auto">Edit Data Seputar Pengadaan</h3>
                            <div class="card-body">
                                <form action="{{ route('pengadaan.update', $pengadaan->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label class="font-weight-bold">FILE</label>
                                        <p>{{ $pengadaan->file }}</p>
                                        <input type="file" id="file" class="form-control" name="file">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">JUDUL</label>
                                        <input type="text" id="judul"
                                            class="form-control @error('judul') is-invalid @enderror" name="judul"
                                            value="{{ old('judul', $pengadaan->judul) }}"
                                            placeholder="Masukkan Judul Seputar Pengadaan">

                                        <!-- error message untuk title -->
                                        @error('judul')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">ISI</label>
                                        <textarea id="isi" class="form-control textarea @error('isi') is-invalid @enderror" name="isi" rows="5"
                                            placeholder="Masukkan Isi Seputar Pengadaan">{{ old('isi', $pengadaan->isi) }}</textarea>

                                        <!-- error message untuk content -->
                                        @error('isi')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-md btn-primary"
                                        style="background-color: #8C0C14; border:none">UPDATE</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                CKEDITOR.replace('isi');
            </script>
        </div>
        {{-- </x-app-layout> --}}
    @endauth
@endsection
