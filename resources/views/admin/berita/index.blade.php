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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Berita</h3>

                                <div class="card-tools">
                                    <div class="card-header-form">
                                        <a href="/admin/berita/create" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-2">
                                <table class="table table-hover text-wrap" id="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul Berita</th>
                                            <th>Author</th>
                                            <th>Kategori</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($berita as $b)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td style="width: 300px">{{ $b->judul }}</td>
                                                <td style="width: 300px">{{ $b->author }}</td>
                                                <td><div class="badge badge-success">{{ $b->kategori ? $b->kategori->nama : 'Data tidak tersedia' }}</div></td>
                                                <td><div class="badge badge-info">{{ $b->updated_at->format('d F Y') }}</div></td>
                                                <td>
                                                    <a href="/admin/berita/edit/{{ $b->id }}" class="btn btn-sm btn-warning text-white"><i class="fas fa-edit"></i> Edit</a>
                                                    {{-- <a href="/admin/berita/show/{{ $b->id }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Detail</a> --}}
                                                    <a href="/admin/berita/delete/{{ $b->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        })
    </script>
@endpush