@extends('admin.main')
@section('title', 'Update Produk Hukum')
@section('content')
    @auth
        {{-- <x-app-layout> --}}
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 p-5 shadow rounded">
                            <h3 class="mx-auto">Edit Produk Hukum</h3>
                            <div class="card-body">
                                <form action="{{ route('prohum.update', $produk->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label class="font-weight-bold">FILE</label>
                                        <p>{{ $produk->file }}</p>
                                        <input type="file" id="file" class="form-control" name="file">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">KATEGORI</label>
                                        <input type="text" id="judul"
                                            class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                                            value="{{ old('kategori', $produk->kategori) }}"
                                            placeholder="Masukkan Kategori Produk Hukum">

                                        <!-- error message untuk title -->
                                        @error('kategori')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">NOMOR</label>
                                        <input type="text" id="judul"
                                            class="form-control @error('nomor') is-invalid @enderror" name="nomor"
                                            value="{{ old('nomor', $produk->nomor) }}"
                                            placeholder="Masukkan Nomor Produk Hukum">

                                        <!-- error message untuk title -->
                                        @error('nomor')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">TAHUN</label>
                                        <input type="number" id="tahun"
                                            class="form-control @error('tahun') is-invalid @enderror" name="tahun"
                                            value="{{ old('tahun', $produk->tahun) }}"
                                            placeholder="Masukkan Tahun Produk Hukum" min="1950" max="2030">

                                        <!-- error message untuk title -->
                                        @error('tahun')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">ISI</label>
                                        <textarea id="isi" class="form-control textarea @error('isi') is-invalid @enderror" name="isi" rows="5"
                                            placeholder="Masukkan Isi Produk Hukum">{{ old('isi', $produk->isi) }}</textarea>

                                        <!-- error message untuk content -->
                                        @error('isi')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-md btn-primary" style="background-color: #8C0C14; border:none">UPDATE</button>
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
     
    @endauth
@endsection
