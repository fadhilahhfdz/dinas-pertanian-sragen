@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Informasi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Informasi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Edit Data Informasi
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/admin/informasi/edit/{{ $informasi->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Nama Website :</label>
                                                <input type="text" name="nama" class="form-control"
                                                    placeholder="Cth: DINAS PERTANIAN" value="{{ $informasi->nama }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="logo">Logo :</label>
                                                <input type="file" name="logo" class="form-control" accept="image/*">
                                                <small class="text-danger">*Biarkan kosong jika tidak ingin mengubah
                                                    logo.</small>
                                                <small class="text-danger">*Max 2MB.</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telepon">No Telepon :</label>
                                                <input type="number" name="telepon" class="form-control"
                                                    value="{{ $informasi->telepon }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email :</label>
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ $informasi->email }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alamat">Alamat :</label>
                                                <textarea name="alamat" cols="5" rows="3" class="form-control">{{ $informasi->alamat }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi :</label>
                                                <textarea name="deskripsi" cols="5" rows="3" class="form-control">{{ $informasi->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/admin/informasi" class="btn btn-sm btn-outline-secondary mx-2"><i
                                            class="fas fa-caret-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-sm btn-primary"><i
                                            class="fab fa-telegram-plane"></i> Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
