@extends('admin.main')
@section('title', 'Banner')
@section('content')
    @auth

        {{-- <body> --}}
        <div class="content-wrapper">
            <div class="container-fluid" style="padding-top: 0.5cm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-2 shadow-lg" style="border: none">
                            <div class="card-body table-responsive p-3">
                                <div class="row">
                                    <div class="col">
                                        <h3>Banner</h3>
                                    </div>
                                    <div class="col">
                                        <div class="d-grid mb-2 gap-2 d-md-flex justify-content-md-end">
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modalbuatbanner" style="background-color: #8c0c14">
                                                Buat Banner
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <table class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nomor</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($banner as $item)
                                            <tr>
                                                <td>{{ $item->nomor }}</td>
                                                <td><img src="{{ asset('/storage/banner/' . $item->gambar) }}" width="300px">
                                                </td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('banner.destroy', $item->id) }}" method="GET">
                                                        <button type="button" class="btn btn-sm btn-warning"
                                                            data-toggle="modal" data-target="#modaleditbanner"
                                                            onclick="editBanner('{{ $item->id }}', '{{ $item->nomor }}', '{{ $item->gambar }}')">
                                                            Edit
                                                        </button>
                                                        <button type="submit" class="btn btn-sm btn-danger m-1" title="Hapus"
                                                            style="width: 75px">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Buat Banner --}}
            <div class="modal fade" id="modalbuatbanner" tabindex="-1" role="dialog" aria-labelledby="modalBuatBannerLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalBuatBannerLabel">Buat Banner Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formBuatBanner" action="{{ route('banner.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label for="status">Nomor</label>
                                    <input type="number" class="form-control" name="nomor">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="status">Gambar</label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                        name="gambar">
                                </div>
                                @error('gambar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnSave" onclick="submitBuatForm()"
                                    class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                function submitBuatForm() {
                    document.getElementById('formBuatBanner').submit();
                }
            </script>
            {{-- end modal buat banner --}}


            {{-- Modal Update Banner --}}
            <div class="modal fade" id="modaleditbanner" tabindex="-1" role="dialog" aria-labelledby="modalEditBannerLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditBannerLabel">Edit Banner</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formEditBanner" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label for="status">Nomor</label>
                                    <input type="number" id="editNomor" value="{{ old('nomor') }}" class="form-control"
                                        name="nomor">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="status">Gambar</label>
                                    <input type="file" id="editGambar"
                                        class="form-control  @error('gambar') is-invalid @enderror" name="gambar">
                                </div>
                                @error('gambar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnSave" onclick="submitForm()"
                                    class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                function editBanner(id, nomor, gambar) {
                    document.getElementById('formEditBanner').action = "{{ route('banner.update', '') }}" + id;
                    document.getElementById('editNomor').value = nomor;
                    document.getElementById('editGambar').src = '/storage/banner/' + gambar;
                }

                function submitForm() {
                    document.getElementById('formEditBanner').submit();
                }
            </script>
            {{-- End Modal Update Banner --}}

            <script>
                $('#example').DataTable();
            </script>
        </div>
    @endauth
@endsection
