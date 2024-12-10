@extends('user.main')
@section('content')
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100"
                    src="{{ isset($fotoTampilan[0]) ? $fotoTampilan[0]->foto_tampilan : asset('assets/img/default.png') }}"
                    alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">SELAMAT DATANG DI
                            {{ isset($informasi) ? $informasi->nama : '' }}</h1>
                        <a href="#about" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInUp">Tentang Kami</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100"
                    src="{{ isset($fotoTampilan[1]) ? $fotoTampilan[1]->foto_tampilan : asset('assets/img/default.png') }}"
                    alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">SELAMAT DATANG DI
                            {{ isset($informasi) ? $informasi->nama : '' }}</h1>
                        <a href="#about" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInUp">Tentang Kami</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
    <!-- Navbar & Carousel End -->

    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="about">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="mb-0">Tentang Kami</h1>
                    </div>
                    <p class="mb-4">{{ isset($informasi) ? $informasi->deskripsi : '' }}</p>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Hubungi kami jika ada pertanyaan</h5>
                            <h4 class="text-primary mb-0">{{ isset($informasi) ? $informasi->telepon : '' }}</h4>
                        </div>
                    </div>
                    <a href="https://wa.me/{{ isset($informasi) ? $informasi->telepon : '' }}" target="_blank" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Hubungi Kami</a>
                </div>
                <div class="col-lg-5" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                            src="{{ isset($fotoTampilan[2]) ? $fotoTampilan[2]->foto_tampilan : asset('assets/img/about.png') }}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="mb-0">Berita Terbaru</h1>
            </div>
            <div class="row g-5">
                @foreach ($berita as $item)
                    @php
                        // Ekstrak semua tag heading (h1, h2, h3, h4, h5, h6)
                        preg_match_all('/<h[1-6][^>]*>(.*?)<\/h[1-6]>/is', $item->konten, $headingMatches);

                        // Ekstrak semua tag <img>
                        preg_match_all('/<img[^>]+>/i', $item->konten, $imgMatches);

                        $headings = $headingMatches[0]; // Array dari semua tag heading
                        $images = $imgMatches[0]; // Array dari semua tag <img>

                        // Hapus tag heading dan gambar dari konten untuk mendapatkan sisa teks
                        $hapus_heading = preg_replace('/<h[1-6][^>]*>(.*?)<\/h[1-6]>/is', '', $item->konten);
                        $hapus_image = preg_replace('/<img[^>]+>/i', '', $hapus_heading);
                        $teks = \Illuminate\Support\Str::limit($hapus_image, 75);
                        $img = implode('', $images);

                        $imgSrc = '';
                        if (!empty($images)) {
                            preg_match('/src=["\']?([^"\'>]+)["\']?/', $images[0], $srcMatch);
                            $imgSrc = $srcMatch[1] ?? ''; // URL gambar pertama
                        }
                    @endphp
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                <img class="img-fluid" src="{{ !empty($imgSrc) ? $imgSrc : asset('assets/img/berita.png') }}" alt="">
                                <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4"
                                    href="/berita/by-kategori/{{ Crypt::encryptString($item->kategori->id) }}">{{ $item->kategori->nama }}</a>
                            </div>
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    <small class="me-3"><i
                                            class="far fa-user text-primary me-2"></i>{{ $item->author }}</small>
                                    <small><i
                                            class="far fa-calendar-alt text-primary me-2"></i>{{ $item->updated_at->format('d F Y') }}</small>
                                </div>
                                <h4 class="mb-3">{{ $item->judul }}</h4>
                                <p>{!! $teks !!}</p>
                                <a class="text-uppercase"
                                    href="/berita/detail/{{ Crypt::encryptString($item->id) }}">Baca Selengkapnya <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog Start -->
@endsection
