@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sosmed</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Sosmed</li>
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
                                    Edit Data Sosmed
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/admin/sosmed/edit/{{ $sosmed->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="instagram">Link Instagram:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $sosmed->instagram }}"
                                                    name="instagram">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fab fa-instagram"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="facebook">Link Facebook:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $sosmed->facebook }}"
                                                    name="facebook">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fab fa-facebook"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="youtube">Link Youtube:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $sosmed->youtube }}"
                                                    name="youtube">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fab fa-youtube"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="x">Link X (Twitter):</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $sosmed->x }}"
                                                    name="x">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fab fa-twitter"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="/admin/sosmed" class="btn btn-sm btn-outline-secondary mx-2"><i
                                                class="fas fa-caret-left"></i> Kembali</a>
                                        <button type="submit" class="btn btn-sm btn-primary"><i
                                                class="fab fa-telegram-plane"></i> Submit</button>
                                    </div>
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
