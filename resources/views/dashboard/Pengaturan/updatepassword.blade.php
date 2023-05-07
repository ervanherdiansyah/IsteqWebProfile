@extends('dashboard.index')
@section('title', 'Update Password')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="/dashboard">Ubah Password</a></li>
                            <li class="breadcrumb-item active">Ubah Password</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content Visi Admin -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Ubah Password</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('updatepassword') }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Current Password</label>
                                        <input type="password" name="current_password" class="form-control"
                                            id="current_password" id="current_password">
                                        @error('current_password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation">
                                        @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary btn-sm">Submit</button>
                                </form>
                            </div>
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
