@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                                    Edit Profile
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/admin/user-profile/{{ $user->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="username">Username:</label>
                                            <input type="text" id="username" name="username" class="form-control"
                                                value="{{ $user->username }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password">Password Baru:</label>
                                            <input type="password" id="password" name="password" class="form-control">
                                            <div id="warning-message" style="color: red; display: none;">
                                                Password minimal 8 karakter dan 1 huruf kapital
                                            </div>
                                            <small class="text-danger">*kosongkan jika tidak mengubah password</small>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-sm btn-primary"><i
                                                class="fab fa-telegram-plane"></i> Simpan</button>
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
        $(document).ready(function() {
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
        })
    </script>
@endpush