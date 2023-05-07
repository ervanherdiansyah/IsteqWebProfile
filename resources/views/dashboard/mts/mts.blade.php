@extends('dashboard.index')
@section('title', 'Berita')
@section('content')

    <style>
        .scroll {
            width: 100%;
            overflow-y: scroll;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/mts/') }}">MTs</a></li>
                            <li class="breadcrumb-item active">MTs</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Profile SMA -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Profile MTs</h3>
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
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahLabel">Tambah Profile MTs</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/mts/profile/create') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input class="form-control @error('judul') is-invalid @enderror"
                                                    name="judul" placeholder="Enter..." value="">
                                                @error('judul')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="editor" placeholder="Enter..."
                                                    value=""></textarea>
                                                @error('body')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
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
                                                <label>Nama Kepala Sekolah</label>
                                                <input class="form-control @error('nama') is-invalid @enderror"
                                                    name="nama" placeholder="Enter..." value="">
                                                @error('nama')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Jabatan</label>
                                                <input class="form-control @error('jabatan') is-invalid @enderror"
                                                    name="jabatan" placeholder="Enter..." value="">
                                                @error('jabatan')
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
                            <table class="table table-striped table-bordered projects ">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>
                                            Judul
                                        </th>
                                        <th>
                                            Deskripsi
                                        </th>
                                        <th>
                                            Gambar
                                        </th>
                                        <th>
                                            Nama Kepala Sekolah
                                        </th>
                                        <th>
                                            jabatan
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mts as $data)
                                        <tr style="text-align: justify;">
                                            <td>
                                                {{ $data->judul }}
                                            </td>
                                            <td>
                                                {!! $data->body !!}
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/' . $data->gambar) }}"
                                                    style="display:block; margin:auto; max-width: 100%">
                                            </td>
                                            <td>
                                                {{ $data->nama }}
                                            </td>
                                            <td>
                                                {{ $data->jabatan }}
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
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ubahLabel">Ubah Profile MTs
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form
                                                                    action="{{ url('/admin/mts/profile/update') }}/{{ $data->id }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Judul</label>
                                                                        <input
                                                                            class="form-control @error('judul') is-invalid @enderror"
                                                                            name="judul" placeholder="Enter..."
                                                                            value="{{ $data->judul }}">
                                                                        @error('judul')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Deskripsi</label>
                                                                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="editor2"
                                                                            placeholder="Enter..." value="{{ $data->body }}">{{ $data->body }}</textarea>
                                                                        @error('body')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Gambar</label>
                                                                        <img src="{{ asset('storage/' . $data->gambar) }}"
                                                                            style="display:block; margin:auto; max-width: 100%">
                                                                        <input type="file"
                                                                            class="form-control @error('gambar') is-invalid @enderror"
                                                                            name="gambar" id="image"
                                                                            onchange="previewImage()">
                                                                        @error('logo')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nama Kepala Sekolah</label>
                                                                        <input
                                                                            class="form-control @error('nama') is-invalid @enderror"
                                                                            name="nama" placeholder="Enter..."
                                                                            value="{{ $data->nama }}">
                                                                        @error('nama')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Jabatan</label>
                                                                        <input
                                                                            class="form-control @error('jabatan') is-invalid @enderror"
                                                                            name="jabatan" placeholder="Enter..."
                                                                            value="{{ $data->jabatan }}">
                                                                        @error('jabatan')
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
                                                                <a href="{{ url('/admin/mts/profile') }}"
                                                                    class="btn btn-success btn-sm">kembali</a>
                                                                <a href="{{ url('/admin/mts/profile/destroy') }}/{{ $data->id }}"
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

        <!-- Mengubah Tampilan Sambutan -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Sambutan Kepala Sekolah</h3>
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
                                        <h5 class="modal-title" id="tambahLabel">Tambah Kepala Sekolah</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/mts/sambutan/create') }}"
                                            method="POST" enctype="multipart/form-data">
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
                                                <textarea class="form-control @error('sambutan') is-invalid @enderror" name="sambutan" id="editor3"
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
                                                                <h5 class="modal-title" id="ubahLabel">Ubah Sambutan
                                                                    Kepala Sekolah</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form
                                                                    action="{{ url('/admin/mts/sambutan/update/') }}/{{ $data->id }}"
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
                                                                        <textarea class="form-control" name="sambutan" id="editor4" placeholder="Enter..." value="">{{ $data->sambutan }}</textarea>
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
                                                                <a href="{{ url('/admin/mts') }}"
                                                                    class="btn btn-success btn-sm">kembali</a>
                                                                <a href="{{ url('/admin/mts/sambutan/destroy') }}/{{ $data->id }}"
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
                                        <form action="{{ url('/admin/mts/visimisi/create') }}"
                                            method="POST" enctype="multipart/form-data">
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
                                            <div class="form-group">
                                                <label>Tujuan</label>
                                                <textarea class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" id="editor7"
                                                    placeholder="Enter..." value=""></textarea>
                                                @error('tujuan')
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
                                            Visi
                                        </th>
                                        <th>
                                            Misi
                                        </th>
                                        <th>
                                            Tujuan
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
                                            <td>
                                                {!! $data->tujuan !!}
                                            </td>
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
                                                                    action="{{ url('/admin/mts/visimisi/update') }}/{{ $data->id }}"
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
                                                                    <div class="form-group">
                                                                        <label>Tujuan</label>
                                                                        <textarea class="form-control" name="tujuan" id="editor0" placeholder="Enter..." value="">{{ $data->tujuan }}</textarea>
                                                                        @error('tujuan')
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
                                                                <a href="{{ url('/admin/mts') }}"
                                                                    class="btn btn-success btn-sm">kembali</a>
                                                                <a href="{{ url('/admin/mts/visimisi/destroy') }}/{{ $data->id }}"
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

        <!-- Mengubah Tampilan Organigram -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Struktur Organisasi</h3>
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
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahLabel">Tambah Struktur Organisasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/mts/organigram/create') }}" method="POST"
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
                                                <label>Tahun Periode</label>
                                                <input class="form-control @error('tahun_periode') is-invalid @enderror"
                                                    name="tahun_periode" placeholder="Enter..." value="">
                                                @error('tahun_periode')
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
                                        <th style="width: 50%">
                                            Gambar
                                        </th>
                                        <th>
                                            Tahun Periode
                                        </th>
                                        <th>
                                            Update at
                                        </th>
                                        <th style="width: 15%">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($struktur as $data)
                                        <tr style="text-align:justify;">
                                            <td>
                                                <img src="{{ asset('storage/' . $data->gambar) }}"
                                                    style="display:block; margin:auto; max-width: 50%">
                                            </td>
                                            <td>
                                                {{ $data->tahun_periode }}
                                            </td>
                                            <td>
                                                {{$data->updated_at->isoFormat('D MMMM Y')}}
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
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ubahLabel">Ubah Struktur Organisasi</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form
                                                                    action="{{ url('/admin/mts/organigram/update') }}/{{ $data->id }}"
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
                                                                        <label>Tahun Periode</label>
                                                                        <input class="form-control" name="tahun_periode"
                                                                            placeholder="Enter..."
                                                                            value="{{ $data->tahun_periode }}">
                                                                        @error('tahun_periode')
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
                                                                <a href="{{ url('/admin/mts') }}"
                                                                    class="btn btn-success btn-sm">kembali</a>
                                                                <a href="{{ url('/admin/mts/organigram/destroy') }}/{{ $data->id }}"
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
    </div>
    <!-- /.content-wrapper -->

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
