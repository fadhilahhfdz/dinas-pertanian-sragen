<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ isset($informasi) ? \Illuminate\Support\Str::upper($informasi->nama) : 'web' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ isset($informasi) ? $informasi->logo : '' }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('template-user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template-user/lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('template-user/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('template-user/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i
                            class="fa fa-phone-alt me-2"></i>{{ isset($informasi) ? $informasi->telepon : '' }}</small>
                    <small class="text-light"><i
                            class="fa fa-envelope-open me-2"></i>{{ isset($informasi) ? $informasi->email : '' }}</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                        href="{{ isset($sosmed) ? $sosmed->x : '' }}" target="_blank"><i
                            class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                        href="{{ isset($sosmed) ? $sosmed->facebook : '' }}" target="_blank"><i
                            class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                        href="{{ isset($sosmed) ? $sosmed->instagram : '' }}" target="_blank"><i
                            class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle"
                        href="{{ isset($sosmed) ? $sosmed->youtube : '' }}" target="_blank"><i
                            class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-2">
            <a href="/" class="navbar-brand p-0">
                <div class="nav-logo-text">
                    <img src="{{ isset($informasi) ? asset($informasi->logo) : '' }}" width="75">
                    <h1 class="m-0">{{ isset($informasi) ? $informasi->nama : 'Lorem Ipsum' }}</h1>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="/" class="nav-item nav-link">Beranda</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profil</a>
                        @foreach ($dropdownProfil as $item)
                            <div class="dropdown-menu m-0">
                                <a href="/profil/{{ Crypt::encryptString($item->id) }}"
                                    class="dropdown-item">{{ $item->judul }}</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi
                            Publik</a>
                        @foreach ($dropdownInformasiPublik as $item)
                            <div class="dropdown-menu m-0">
                                <a href="/informasi-publik/{{ Crypt::encryptString($item->id) }}"
                                    class="dropdown-item">{{ $item->judul }}</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pelayanan Umum</a>
                        @foreach ($dropdownPelayananUmum as $item)
                            <div class="dropdown-menu m-0">
                                <a href="/pelayanan-umum/{{ Crypt::encryptString($item->id) }}"
                                    class="dropdown-item">{{ $item->judul }}</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Program
                            Kegiatan</a>
                        @foreach ($dropdownProgramKegiatan as $item)
                            <div class="dropdown-menu m-0">
                                <a href="/program-kegiatan/{{ Crypt::encryptString($item->id) }}"
                                    class="dropdown-item">{{ $item->judul }}</a>
                            </div>
                        @endforeach
                    </div>
                    <a href="/berita" class="nav-item nav-link">Berita</a>
                    <a href="/galeri" class="nav-item nav-link">Galeri</a>
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <div
                            class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                            <a href="#" class="navbar-brand">
                                <img src="{{ isset($informasi) ? asset($informasi->logo) : '' }}" width="100">
                            </a>
                            <p class="mt-3 mb-4">{{ isset($informasi) ? \Illuminate\Support\Str::limit($informasi->deskripsi, 200) : '' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="row gx-5">
                            <div class="col-lg-4 col-md-12 pt-5 mb-5">
                                <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                    <h3 class="text-light mb-0">Tentang Kami</h3>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-geo-alt text-primary me-2"></i>
                                    <p class="mb-0">{{ isset($informasi) ? $informasi->alamat : '' }}</p>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-envelope-open text-primary me-2"></i>
                                    <p class="mb-0">{{ isset($informasi) ? $informasi->email : '' }}</p>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-telephone text-primary me-2"></i>
                                    <p class="mb-0">{{ isset($informasi) ? $informasi->telepon : '' }}</p>
                                </div>
                                <div class="d-flex mt-4">
                                    <a class="btn btn-primary btn-square me-2"
                                        href="{{ isset($sosmed) ? $sosmed->x : '' }}" target="_blank"><i
                                            class="fab fa-twitter fw-normal"></i></a>
                                    <a class="btn btn-primary btn-square me-2"
                                        href="{{ isset($sosmed) ? $sosmed->facebook : '' }}" target="_blank"><i
                                            class="fab fa-facebook-f fw-normal"></i></a>
                                    <a class="btn btn-primary btn-square me-2"
                                        href="{{ isset($sosmed) ? $sosmed->youtube : '' }}" target="_blank"><i
                                            class="fab fa-youtube fw-normal"></i></a>
                                    <a class="btn btn-primary btn-square"
                                        href="{{ isset($sosmed) ? $sosmed->instagran : '' }}" target="_blank"><i
                                            class="fab fa-instagram fw-normal"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-white" style="background: #061429;">
            <div class="container text-center">
                <div class="row justify-content-end">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                            <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">2024</a>. All
                                Rights Reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
                class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('template-user/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('template-user/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('template-user/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('template-user/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('template-user/lib/owlcarousel/owl.carousel.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('template-user/js/main.js') }}"></script>
        <script>
            document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
                anchor.addEventListener("click", function(e) {
                    e.preventDefault();

                    const target = document.querySelector(this.getAttribute("href"));

                    if (target) {
                        target.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                        });
                    }
                });
            });
        </script>
</body>

</html>
