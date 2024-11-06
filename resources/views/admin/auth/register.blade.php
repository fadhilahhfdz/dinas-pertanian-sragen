<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template-admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('template-admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template-admin/dist/css/adminlte.min.css') }}">

    {{-- izitoast --}}
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <p class="h1"><b>Admin</b></p>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Register untuk memulai sesi anda</p>

                <form action="/register" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password"
                            name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div id="warning-message" style="color: red; display: none;">
                            Password minimal 8 karakter dan 1 huruf kapital
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
            </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('template-admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template-admin/dist/js/adminlte.min.js') }}"></script>

    {{-- izitoast --}}
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>

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
    @endif

    <script>
        function validasiInput(inputElement) {
            // Membuang karakter angka dari nilai input
            inputElement.value = inputElement.value.replace(/[^a-zA-Z]/g, '');
        }

        // Ambil referensi ke elemen input password
        const passwordInput = document.getElementById('password');

        // Tambahkan event listener untuk memeriksa input setiap kali pengguna mengetik
        passwordInput.addEventListener('input', function() {
            // Ambil nilai password dari input
            const password = passwordInput.value;

            // Periksa panjang password
            const isLengthValid = password.length >= 8;

            // Periksa apakah setidaknya satu huruf kapital ada di dalam password
            const hasCapitalLetter = /[A-Z]/.test(password);

            // Jika panjang password tidak mencukupi atau tidak memiliki huruf kapital
            if (!isLengthValid || !hasCapitalLetter) {
                // Tampilkan pesan kesalahan
                document.getElementById('warning-message').style.display = 'block';
            } else {
                // Hapus pesan kesalahan jika password valid
                document.getElementById('warning-message').style.display = 'none';
            }
        });
    </script>
</body>

</html>
