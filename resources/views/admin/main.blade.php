<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dinas Pertanian - Admin
    </title>

    {{-- <link rel="icon" href="{{ asset('assets/img/favicon.png') }}"> --}}

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template-admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('template-admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('template-admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('template-admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template-admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('template-admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('template-admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('template-admin/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template-admin/plugins/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('template-admin/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template-admin/plugins/datatables/new/css/dataTables.bootstrap4.min.css') }}">

    {{-- izitoast --}}
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">

    {{-- chart js --}}
    <link rel="stylesheet" href="{{ asset('template-admin/plugins/chart.js/Chart.css') }}">
    <link rel="stylesheet" href="{{ asset('template-admin/plugins/chart.js/Chart.min.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li><a href="/logout" class="btn btn-sm btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <p class="brand-link">
                <img src="{{ asset('assets/img/home.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Dinas Pertanian</span>
            </p>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('assets/img/profile.png') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="/admin/profile/{{ auth()->user()->id }}"
                            class="d-block">{{ auth()->user()->username }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="/admin/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">KONTEN</li>
                        <li class="nav-item">
                            <a href="/admin/profil" class="nav-link">
                                <i class="fas fa-minus nav-icon"></i>
                                <p>Profil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/informasi-publik" class="nav-link">
                                <i class="fas fa-minus nav-icon"></i>
                                <p>Informasi Publik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/pelayanan-umum" class="nav-link">
                                <i class="fas fa-minus nav-icon"></i>
                                <p>Pelayanan Umum</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/program-kegiatan" class="nav-link">
                                <i class="fas fa-minus nav-icon"></i>
                                <p>Program Kegiatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-newspaper"></i>
                                <p>
                                    Berita
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/berita/kategori" class="nav-link">
                                        <i class="fas fa-th nav-icon"></i>
                                        <p>Kategori Berita</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/berita" class="nav-link">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Tambah Berita</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">PENGATURAN TAMPILAN</li>
                        <li class="nav-item">
                            <a href="/admin/informasi" class="nav-link">
                                <i class="fas fa-pencil-alt nav-icon"></i>
                                <p>Informasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/foto-tampilan" class="nav-link">
                                <i class="fas fa-image nav-icon"></i>
                                <p>Foto Tampilan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/kontak" class="nav-link">
                                <i class="fas fa-phone-square-alt nav-icon"></i>
                                <p>Kontak</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/waktu-layanan" class="nav-link">
                                <i class="fas fa-tasks nav-icon"></i>
                                <p>Waktu Layanan</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <p class="m-0">Copyright &copy; 2024 All rights reserved.</p>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('template-admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('template-admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('template-admin/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('template-admin/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('template-admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('template-admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('template-admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('template-admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template-admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('template-admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('template-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('template-admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template-admin/dist/js/adminlte.js') }}"></script>
    {{-- <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('template-admin/dist/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('template-admin/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('template-admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template-admin/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('template-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template-admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template-admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

    {{-- izitoast --}}
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>

    {{-- chart js --}}

    <script src="{{ asset('template-admin/plugins/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('template-admin/plugins/chart.js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('template-admin/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('template-admin/plugins/chart.js/Chart.min.js') }}"></script>

    @if (session('sukses'))
        <script>
            iziToast.success({
                title: 'Berhasil',
                message: '{{ session('sukses') }}',
                position: 'topRight'
            });
        </script>
    @elseif (session('gagal'))
        <script>
            iziToast.error({
                title: 'Gagal',
                message: '{{ session('gagal') }}',
                position: 'topRight'
            });
        </script>
    @elseif (session('error'))
        <script>
            iziToast.error({
                title: 'Error',
                message: '{{ session('error') }}',
                position: 'topRight'
            });
        </script>
    @endif

    </script>
    @stack('script')
</body>

</html>