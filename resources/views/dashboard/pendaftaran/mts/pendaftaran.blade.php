@extends('dashboard.index')
@section('title', 'Organisasi dan Tata Kerja')
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
                            <li class="breadcrumb-item"><a href="{{ url('/admin/pendaftaran/mts') }}">Pendaftaran MTs</a></li>
                            <li class="breadcrumb-item active">Pendaftaran MTs</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Mengubah Tampilan Pendaftran Santri -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Pendaftaran MTs</h3>
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
                                        <h5 class="modal-title" id="tambahLabel">Tambah Pendaftaran MTs</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/pendaftaran/mts/create') }}" method="POST"
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
                                                <label>Tahun Ajaran</label>
                                                <input class="form-control @error('tahun_ajaran') is-invalid @enderror"
                                                    name="tahun_ajaran" placeholder="Enter..." value="">
                                                @error('tahun_ajaran')
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
                                            Tahun Ajaran
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendaftaran as $data)
                                        <tr style="text-align: justify;">
                                            <td>
                                                <img src="{{ asset('storage/' . $data->gambar) }}"
                                                    style="display:block; margin:auto; max-width: 50%">
                                            </td>
                                            <td>
                                                {{ $data->tahun_ajaran }}
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
                                                                <h5 class="modal-title" id="ubahLabel">Ubah Pendaftaran MTs</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form
                                                                    action="{{ url('/admin/pendaftaran/mts/update') }}/{{ $data->id }}"
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
                                                                        <input class="form-control" name="tahun_ajaran"
                                                                            placeholder="Enter..."
                                                                            value="{{ $data->tahun_ajaran }}">
                                                                        @error('tahun_ajaran')
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
                                                                <a href="{{ url('/admin/pendaftaran/mts') }}"
                                                                    class="btn btn-success btn-sm">kembali</a>
                                                                <a href="{{ url('/admin/pendaftaran/mts/destroy') }}/{{ $data->id }}"
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

        <!-- Mengubah Tampilan Biaya Pendaftran Santri -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Biaya Pendaftaran MTs</h3>
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
                                        <h5 class="modal-title" id="tambahLabel">Tambah Biaya Pendaftaran MTs</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/pendaftaran/mts/create/biaya') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Nama Rincian</label>
                                                <input class="form-control @error('nama') is-invalid @enderror"
                                                    name="nama" placeholder="Enter..." value="">
                                                @error('nama')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Biaya Rincian</label>
                                                <input class="form-control @error('harga') is-invalid @enderror"
                                                    name="harga" placeholder="Enter..." value="">
                                                @error('harga')
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
                                            Nama Rincian
                                        </th>
                                        <th>
                                            Biaya Rincian
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($biaya as $data)
                                        <tr style="text-align: justify;">
                                            <td>
                                                {{ $data->nama }}
                                            </td>
                                            <td>
                                                {{ $data->harga }}
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
                                                                <h5 class="modal-title" id="ubahLabel">Ubah Biaya Pendaftaran MTs</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form
                                                                    action="{{ url('/admin/pendaftaran/mts/update/biaya') }}/{{ $data->id }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Nama Rincian</label>
                                                                        <input class="form-control" name="nama"
                                                                            placeholder="Enter..."
                                                                            value="{{ $data->nama }}">
                                                                        @error('nama')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Biaya Rincian</label>
                                                                        <input class="form-control" name="harga"
                                                                            placeholder="Enter..."
                                                                            value="{{ $data->harga }}">
                                                                        @error('harga')
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
                                                                <a href="{{ url('/admin/pendaftaran/mts') }}"
                                                                    class="btn btn-success btn-sm">kembali</a>
                                                                <a href="{{ url('/admin/pendaftaran/mts/destroy/biaya') }}/{{ $data->id }}"
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
