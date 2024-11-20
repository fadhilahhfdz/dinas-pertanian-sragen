@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Berita</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Berita</li>
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
                                    Tambah Berita
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="/admin/berita/create" method="POST">
                                    @csrf
                                    <div class="d-flex justify-content-end">
                                        <a href="/admin/berita" class="btn btn-sm btn-outline-secondary mx-2"><i
                                                class="fas fa-caret-left"></i> Kembali</a>
                                        <button type="submit" class="btn btn-sm btn-primary"><i
                                                class="fab fa-telegram-plane"></i> Submit</button>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="judul">Judul Berita</label>
                                            <input type="text" id="judul" name="judul" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="author">Nama Author</label>
                                            <input type="text" id="author" name="author" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="id_kategori">Kategori Berita</label>
                                            <div class="input-group">
                                                <select class="form-control" name="id_kategori" required>
                                                    <option>--Pilih Kategori--</option>
                                                    @foreach ($kategoriBerita as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <small><a href="/admin/berita/kategori" style="text-decoration: underline">tambah kategori</a></small>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="konten">Konten Berita</label>
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