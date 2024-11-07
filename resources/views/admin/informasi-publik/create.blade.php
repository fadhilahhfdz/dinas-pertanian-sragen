@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Informasi Publik</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Informasi Publik</li>
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
                                    Tambah Data Informasi Publik
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/admin/informasi-publik/create" method="POST">
                                    @csrf
                                    <div class="d-flex justify-content-end">
                                        <a href="/admin/informasi-publik" class="btn btn-sm btn-outline-secondary mx-2"><i
                                                class="fas fa-caret-left"></i> Kembali</a>
                                        <button type="submit" class="btn btn-sm btn-primary"><i
                                                class="fab fa-telegram-plane"></i> Submit</button>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="judul">Judul :</label>
                                            <input type="text" id="judul" name="judul" class="form-control" placeholder="Cth: Regulasi" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="konten">Konten :</label>
                                            <textarea name="konten" class="form-control" id="summernote" required></textarea>
                                        </div>
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

@push('script')
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                height: 300
            });
        })
    </script>
@endpush