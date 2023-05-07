@extends('dashboard.index')
@section('title', 'Divisi')
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
                            <li class="breadcrumb-item"><a href="{{ url('/admin/tentang/divisi') }}">Divisi</a></li>
                            <li class="breadcrumb-item active">Divisi</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Divisi -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Divisi</h3>
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
                                        <h5 class="modal-title" id="tambahLabel">Tambah Divisi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/tentang/divisi/create') }}" method="POST"
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
                                                <label>Nama Divisi</label>
                                                <input class="form-control @error('nama') is-invalid @enderror"
                                                    name="nama" placeholder="Enter..." value="">
                                                @error('nama')
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
                                        <th style="width: 50%">
                                            Gambar
                                        </th>
                                        <th>
                                            Nama Divisi
                                        </th>
                                        <th style="width: 15%">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($divisi as $data)
                                        <tr style="text-align: justify;">
                                            <td>
                                                <img src="{{ asset('storage/' . $data->gambar) }}"
                                                    style="display:block; margin:auto; max-width: 20%">
                                            </td>
                                            <td>
                                                {{ $data->nama }}
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
                                                                <h5 class="modal-title" id="ubahLabel">Ubah Divisi
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form
                                                                    action="{{ url('/admin/tentang/divisi/update') }}/{{ $data->id }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
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
                                                                        <label>Nama Divisi</label>
                                                                        <input
                                                                            class="form-control @error('nama') is-invalid @enderror"
                                                                            name="nama" placeholder="Enter..."
                                                                            value="{{ $data->nama }}">
                                                                        @error('nama')
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
                                                                <a href="{{ url('/admin/tentang/divisi') }}"
                                                                    class="btn btn-success btn-sm">kembali</a>
                                                                <a href="{{ url('/admin/tentang/divisi/destroy') }}/{{ $data->id }}"
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

        <!-- Our Team -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Our Team</h3>
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
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahLabel">Tambah Our Team</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/tentang/divisi/create/team') }}" method="POST"
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
                                                <label>Divisi</label>
                                                <select name="divisi_id" id="" class="form-control">
                                                    <option disabled selected value="">Pilih Divisi</option>
                                                    @foreach ($divisi as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kategori_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nama </label>
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
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="" class="form-control">
                                                    <option disabled selected value="">Pilih Status</option>
                                                    <option value="leader">Leader</option>
                                                    <option value="member">Member</option>
                                                </select>
                                                @error('status')
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
                                        <th style="width: 30%">
                                            Gambar
                                        </th>
                                        <th>
                                            Nama 
                                        </th>
                                        <th>
                                            Divisi
                                        </th>
                                        <th>
                                            Jabatan
                                        </th>
                                        <th style="width: 15%">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($team as $data)
                                        <tr style="text-align: justify;">
                                            <td>
                                                <img src="{{ asset('storage/' . $data->gambar) }}"
                                                    style="display:block; margin:auto; max-width: 20%">
                                            </td>
                                            <td>
                                                {{ $data->nama }}
                                            </td>
                                            <td>
                                                {{ $data->divisi->nama }}
                                            </td>
                                            <td>
                                                {{ $data->jabatan }}
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
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ubahLabel">Ubah Our Team
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form
                                                                    action="{{ url('/admin/tentang/divisi/update/team') }}/{{ $data->id }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
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
                                                                        <label>Divisi</label>
                                                                        <select name="divisi_id" id=""
                                                                            class="form-control">
                                                                            <option value="{{ $data->divisi_id }}">
                                                                                {{ $data->divisi->nama }}
                                                                            </option>
                                                                            @foreach ($divisi as $d)
                                                                                <option value="{{ $d->id }}">
                                                                                    {{ $d->nama }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('kategori_id')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nama </label>
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
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <select name="status" id=""
                                                                            class="form-control">
                                                                            <option value="{{ $data->status }}">
                                                                                {{ $data->status }}
                                                                            </option>
                                                                            <option value="leader">Leader</option>
                                                                            <option value="member">Member</option>
                                                                        </select>
                                                                        @error('status')
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
                                                                <a href="{{ url('/admin/tentang/divisi') }}"
                                                                    class="btn btn-success btn-sm">kembali</a>
                                                                <a href="{{ url('/admin/tentang/divisi/destroy/team') }}/{{ $data->id }}"
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
