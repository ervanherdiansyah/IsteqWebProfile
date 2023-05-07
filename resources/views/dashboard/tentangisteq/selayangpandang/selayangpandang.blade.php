@extends('dashboard.index')
@section('title', 'Selayang Pandang')
@section('content')

    <style>
        .scroll {
            width: 100%;
            overflow-y: scroll;
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/tentang/selayangpandang') }}">Sambutan Kepala Yayasan</a></li>
                            <li class="breadcrumb-item active">Sambutan Kepala Yayasan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Mengubah Tampilan Sambutan -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Sambutan Kepala Yayasan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                            data-target="#tambah">
                            <i class="fas fa-plus"></i>
                            Tambah
                        </button>
                        <!-- Modal Tambah Start -->
                        <div class="modal fade text-left" id="tambah" tabindex="-1" aria-labelledby="tambahLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahLabel">Tambah Sambutan Kepala Yayasan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/tentang/selayangpandang/create/sambutan/') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file"
                                                    class="form-control @error('gambar') is-invalid @enderror"
                                                    name="gambar" id="image" onchange="previewImage()">
                                                @error('logo')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input class="form-control @error('nama') is-invalid @enderror"
                                                    name="nama" placeholder="Enter..." value="">
                                                @error('nama')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Sambutan</label>
                                                <textarea class="form-control @error('sambutan') is-invalid @enderror" name="sambutan" id="editor"
                                                    placeholder="Enter..." value=""></textarea>
                                                @error('sambutan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                            </div>
                                        </form>
                                        <!-- form end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Tambah End -->
                        {{-- {{ $errors }} --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered projects">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>
                                            Gambar
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Sambutan
                                        </th>
                                        <th style="width: 15%">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sambutan as $data)
                                        <tr style="text-align: justify;">
                                            <td>
                                                <img src="{{ asset('storage/' . $data->gambar) }}"
                                                    style="display:block; margin:auto; max-width: 100%">
                                            </td>
                                            <td>
                                                {{ $data->nama }}
                                            </td>
                                            <td>
                                                {!! $data->sambutan !!}
                                            </td>
                                            <td class="project-actions text-center">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#ubah{{ $data->id }}">
                                                    <i class="fas fa-edit"></i>
                                                    Ubah
                                                </button>
                                                <!-- Modal Ubah Start -->
                                                <div class="modal fade text-left" id="ubah{{ $data->id }}"
                                                    tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ubahLabel">Ubah Sambutan Kepala Yayasan</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form
                                                                    action="{{ url('/admin/tentang/selayangpandang/update/sambutan') }}/{{ $data->id }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Gambar</label>
                                                                        <img src="{{ asset('storage/' . $data->gambar) }}"
                                                                            style="display:block; margin:auto; max-width: 100%">
                                                                        <input type="file"
                                                                            class="form-control @error('gambar') is-invalid @enderror"
                                                                            name="gambar" value="" id="image"
                                                                            onchange="previewImage()">
                                                                        @error('gambar')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input class="form-control" name="nama"
                                                                            placeholder="Enter..."
                                                                            value="{{ $data->nama }}">
                                                                        @error('nama')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Sambutan</label>
                                                                        <textarea class="form-control" name="sambutan" id="editor2" placeholder="Enter..." value="">{{ $data->sambutan }}</textarea>
                                                                        @error('sambutan')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary btn-sm"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm">Simpan</button>
                                                                    </div>
                                                                </form>
                                                                <!-- form end -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Ubah End -->
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#destroy{{ $data->id }}">
                                                    <i class="fas fa-trash"></i>
                                                    Hapus
                                                </button>
                                                <!-- Modal Ubah Start -->
                                                <div class="modal fade text-left" id="destroy{{ $data->id }}"
                                                    tabindex="-1" aria-labelledby="destroyLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="destroyLabel">Delete</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <p>apakah anda yakin ingin menghapus data ini?</p>
                                                                <!-- form end -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{ url('/admin/tentang/selayangpandang') }}"
                                                                    class="btn btn-success btn-sm">kembali</a>
                                                                <a href="{{ url('/admin/tentang/selayangpandang/destroy/sambutan') }}/{{ $data->id }}"
                                                                    class="btn btn-danger btn-sm">delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Hapus End -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mengubah Tampilan Sejarah -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Sejarah</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                            data-target="#tambah1">
                            <i class="fas fa-plus"></i>
                            Tambah
                        </button>
                        <!-- Modal Tambah Start -->
                        <div class="modal fade text-left" id="tambah1" tabindex="-1" aria-labelledby="tambahLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahLabel">Tambah Sejarah</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/tentang/selayangpandang/create/sejarah') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file"
                                                    class="form-control @error('gambar') is-invalid @enderror"
                                                    name="gambar" id="image" onchange="previewImage()">
                                                @error('gambar')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Heading</label>
                                                <input class="form-control @error('heading') is-invalid @enderror"
                                                    name="heading" placeholder="Enter..." value="">
                                                @error('heading')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="editor3"
                                                    placeholder="Enter..." value=""></textarea>
                                                @error('deskripsi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                            </div>
                                        </form>
                                        <!-- form end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Tambah End -->
                        {{-- {{ $errors }} --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered projects">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>
                                            Gambar
                                        </th>
                                        <th>
                                            Heading
                                        </th>
                                        <th>
                                            Deskripsi
                                        </th>
                                        <th style="width: 15%">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sejarah as $data)
                                        <tr style="text-align: justify;">
                                            <td>
                                                <img src="{{ asset('storage/' . $data->gambar) }}"
                                                    style="display:block; margin:auto; max-width: 100%">
                                            </td>
                                            <td>
                                                {{ $data->heading }}
                                            </td>
                                            <td>
                                                {!! $data->deskripsi !!}
                                            </td>
                                            <td class="project-actions text-center">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#ubah1{{ $data->id }}">
                                                    <i class="fas fa-edit"></i>
                                                    Ubah
                                                </button>
                                                <!-- Modal Ubah Start -->
                                                <div class="modal fade text-left" id="ubah1{{ $data->id }}"
                                                    tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ubahLabel">Ubah Sambutan Kepala Yayasan</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form
                                                                    action="{{ url('/admin/tentang/selayangpandang/update/sejarah') }}/{{ $data->id }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Gambar</label>
                                                                        <img src="{{ asset('storage/' . $data->gambar) }}"
                                                                            style="display:block; margin:auto; max-width: 100%">
                                                                        <input type="file"
                                                                            class="form-control @error('gambar') is-invalid @enderror"
                                                                            name="gambar" value="" id="image"
                                                                            onchange="previewImage()">
                                                                        @error('gambar')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Heading</label>
                                                                        <input class="form-control" name="heading"
                                                                            placeholder="Enter..."
                                                                            value="{{ $data->heading }}">
                                                                        @error('heading')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Deskripsi</label>
                                                                        <textarea class="form-control" name="deskripsi" id="editor4" placeholder="Enter..." value="">{{ $data->deskripsi }}</textarea>
                                                                        @error('deskripsi')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary btn-sm"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm">Simpan</button>
                                                                    </div>
                                                                </form>
                                                                <!-- form end -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Ubah End -->
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#destroy1{{ $data->id }}">
                                                    <i class="fas fa-trash"></i>
                                                    Hapus
                                                </button>
                                                <!-- Modal Ubah Start -->
                                                <div class="modal fade text-left" id="destroy1{{ $data->id }}"
                                                    tabindex="-1" aria-labelledby="destroyLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="destroyLabel">Delete</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <p>apakah anda yakin ingin menghapus data ini?</p>
                                                                <!-- form end -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{ url('/admin/tentang/selayangpandang') }}"
                                                                    class="btn btn-success btn-sm">kembali</a>
                                                                <a href="{{ url('/admin/tentang/selayangpandang/destroy/sejarah') }}/{{ $data->id }}"
                                                                    class="btn btn-danger btn-sm">delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Hapus End -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mengubah Tampilan Visi Misi -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Visi Misi</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                            data-target="#tambah2">
                            <i class="fas fa-plus"></i>
                            Tambah
                        </button>
                        <!-- Modal Tambah Start -->
                        <div class="modal fade text-left" id="tambah2" tabindex="-1" aria-labelledby="tambahLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahLabel">Tambah Visi Misi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/tentang/selayangpandang/create/visimisi') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Visi</label>
                                                <textarea class="form-control @error('visi') is-invalid @enderror" name="visi" id="editor5"
                                                    placeholder="Enter..." value=""></textarea>
                                                @error('visi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Misi</label>
                                                <textarea class="form-control @error('misi') is-invalid @enderror" name="misi" id="editor6"
                                                    placeholder="Enter..." value=""></textarea>
                                                @error('misi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            {{-- <div class="form-group">
                                                <label>Tujuan</label>
                                                <textarea class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" id="editor7"
                                                    placeholder="Enter..." value=""></textarea>
                                                @error('tujuan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                            </div>
                                        </form>
                                        <!-- form end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Tambah End -->
                        {{-- {{ $errors }} --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered projects">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>
                                            Visi
                                        </th>
                                        <th>
                                            Misi
                                        </th>
                                        <th style="width: 15%">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visimisi as $data)
                                        <tr style="text-align: justify;">
                                            <td>
                                                {!! $data->visi !!}
                                            </td>
                                            <td>
                                                {!! $data->misi !!}
                                            </td>
                                            {{-- <td>
                                                {!! $data->tujuan !!}
                                            </td> --}}
                                            <td class="project-actions text-center">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#ubah2{{ $data->id }}">
                                                    <i class="fas fa-edit"></i>
                                                    Ubah
                                                </button>
                                                <!-- Modal Ubah Start -->
                                                <div class="modal fade text-left" id="ubah2{{ $data->id }}"
                                                    tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ubahLabel">Ubah Visi Misi</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form
                                                                    action="{{ url('/admin/tentang/selayangpandang/update/visimisi') }}/{{ $data->id }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Visi</label>
                                                                        <textarea class="form-control" name="visi" id="editor8" placeholder="Enter..." value="">{{ $data->visi }}</textarea>
                                                                        @error('visi')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Misi</label>
                                                                        <textarea class="form-control" name="misi" id="editor9" placeholder="Enter..." value="">{{ $data->misi }}</textarea>
                                                                        @error('misi')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    {{-- <div class="form-group">
                                                                        <label>Tujuan</label>
                                                                        <textarea class="form-control" name="tujuan" id="editor0" placeholder="Enter..." value="">{{ $data->tujuan }}</textarea>
                                                                        @error('tujuan')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div> --}}
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary btn-sm"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm">Simpan</button>
                                                                    </div>
                                                                </form>
                                                                <!-- form end -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Ubah End -->
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#destroy2{{ $data->id }}">
                                                    <i class="fas fa-trash"></i>
                                                    Hapus
                                                </button>
                                                <!-- Modal Ubah Start -->
                                                <div class="modal fade text-left" id="destroy2{{ $data->id }}"
                                                    tabindex="-1" aria-labelledby="destroyLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="destroyLabel">Delete</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <p>apakah anda yakin ingin menghapus data ini?</p>
                                                                <!-- form end -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{ url('/admin/tentang/selayangpandang') }}"
                                                                    class="btn btn-success btn-sm">kembali</a>
                                                                <a href="{{ url('/admin/tentang/selayangpandang/destroy/visimisi') }}/{{ $data->id }}"
                                                                    class="btn btn-danger btn-sm">delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Hapus End -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mengubah Tampilan Biografi Pimpinan -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Biografi Pimpinan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                            data-target="#tambah3">
                            <i class="fas fa-plus"></i>
                            Tambah
                        </button>
                        <!-- Modal Tambah Start -->
                        <div class="modal fade text-left" id="tambah3" tabindex="-1" aria-labelledby="tambahLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahLabel">Tambah Biografi Pimpinan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/tentang/selayangpandang/create/biografi') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file"
                                                    class="form-control @error('gambar') is-invalid @enderror"
                                                    name="gambar" id="image" onchange="previewImage()">
                                                @error('gambar')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input class="form-control @error('nama') is-invalid @enderror"
                                                    name="nama" placeholder="Enter..." value="">
                                                @error('nama')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="editor11"
                                                    placeholder="Enter..." value=""></textarea>
                                                @error('deskripsi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                            </div>
                                        </form>
                                        <!-- form end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Tambah End -->
                        {{-- {{ $errors }} --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered projects">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>
                                            Gambar
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Deskripsi
                                        </th>
                                        <th style="width: 15%">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($biografi as $data)
                                        <tr style="text-align: justify;">
                                            <td>
                                                <img src="{{ asset('storage/' . $data->gambar) }}"
                                                    style="display:block; margin:auto; max-width: 100%">
                                            </td>
                                            <td>
                                                {{ $data->nama }}
                                            </td>
                                            <td>
                                                {!! $data->deskripsi !!}
                                            </td>
                                            <td class="project-actions text-center">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#ubah3{{ $data->id }}">
                                                    <i class="fas fa-edit"></i>
                                                    Ubah
                                                </button>
                                                <!-- Modal Ubah Start -->
                                                <div class="modal fade text-left" id="ubah3{{ $data->id }}"
                                                    tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ubahLabel">Ubah Biografi Pimpinan</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form
                                                                    action="{{ url('/admin/tentang/selayangpandang/update/biografi') }}/{{ $data->id }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Gambar</label>
                                                                        <img src="{{ asset('storage/' . $data->gambar) }}"
                                                                            style="display:block; margin:auto; max-width: 100%">
                                                                        <input type="file"
                                                                            class="form-control @error('gambar') is-invalid @enderror"
                                                                            name="gambar" value="" id="image"
                                                                            onchange="previewImage()">
                                                                        @error('gambar')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input class="form-control" name="nama"
                                                                            placeholder="Enter..."
                                                                            value="{{ $data->nama }}">
                                                                        @error('nama')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Deskripsi</label>
                                                                        <textarea class="form-control" name="deskripsi" id="editor12" placeholder="Enter..." value="">{{ $data->deskripsi }}</textarea>
                                                                        @error('deskripsi')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary btn-sm"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm">Simpan</button>
                                                                    </div>
                                                                </form>
                                                                <!-- form end -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Ubah End -->
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#destroy3{{ $data->id }}">
                                                    <i class="fas fa-trash"></i>
                                                    Hapus
                                                </button>
                                                <!-- Modal Ubah Start -->
                                                <div class="modal fade text-left" id="destroy3{{ $data->id }}"
                                                    tabindex="-1" aria-labelledby="destroyLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="destroyLabel">Delete</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <p>apakah anda yakin ingin menghapus data ini?</p>
                                                                <!-- form end -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{ url('/admin/tentang/selayangpandang') }}"
                                                                    class="btn btn-success btn-sm">kembali</a>
                                                                <a href="{{ url('/admin/tentang/selayangpandang/destroy/biografi') }}/{{ $data->id }}"
                                                                    class="btn btn-danger btn-sm">delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Hapus End -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('script')
    <script>
        let editor;
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .then(edit => {
                editor = edit;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
