@extends('user.main')
@section('content')
    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Detail Berita</h1>
                {{-- <a href="" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h5 text-white">Detail Berita</a> --}}
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                @php
                    // Ekstrak semua tag heading (h1, h2, h3, h4, h5, h6)
                    preg_match_all('/<h[1-6][^>]*>(.*?)<\/h[1-6]>/is', $berita->konten, $headingMatches);

                    // Ekstrak semua tag <img>
                    preg_match_all('/<img[^>]+>/i', $berita->konten, $imgMatches);

                    $headings = $headingMatches[0]; // Array dari semua tag heading
                    $images = $imgMatches[0]; // Array dari semua tag <img>

                    // Hapus tag heading dan gambar dari konten untuk mendapatkan sisa teks
                    $hapus_heading = preg_replace('/<h[1-6][^>]*>(.*?)<\/h[1-6]>/is', '', $berita->konten);
                    $hapus_image = preg_replace('/<img[^>]+>/i', '', $hapus_heading);
                    $teks = \Illuminate\Support\Str::limit($hapus_image, 50);
                    $img = implode('', $images);

                    $imgSrc = '';
                    if (!empty($images)) {
                        preg_match('/src=["\']?([^"\'>]+)["\']?/', $images[0], $srcMatch);
                        $imgSrc = $srcMatch[1] ?? ''; // URL gambar pertama
                    }
                @endphp
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        {{-- <img class="img-fluid w-100 rounded mb-5" src="{{ $imgSrc }}" alt=""> --}}
                        <h1 class="mb-4">{{ $berita->judul }}</h1>
                        <div class="news-text">
                            {!! $berita->konten !!}
                        </div>
                    </div>
                    <!-- Blog Detail End -->

                    <!-- Comment List Start -->
                    <div class="mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">{{ isset($berita) ? $berita->komentar()->count() : '0' }} Komentar</h3>
                        </div>
                        @forelse ($berita->komentar()->latest()->paginate(5) as $item)
                            <div class="d-flex mb-4">
                                <img src="{{ asset('assets/img/profile.png') }}" class="img-fluid rounded" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6><a href="#">{{ $item->nama }}</a> <small><i>{{ $item->created_at->format('d F Y') }}</i></small></h6>
                                    <p>{{ $item->komentar }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    <p class="text-center m-0">Tidak ada komentar</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="bg-light rounded p-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Tinggalkan Komentar</h3>
                        </div>
                        <form action="/berita/detail/{{ Crypt::encryptString($berita->id) }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="hidden" name="id_berita" value="{{ $berita }}">
                                    <input type="text" class="form-control bg-white border-0" name="nama"
                                        placeholder="Nama" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-white border-0" name="email"
                                        placeholder="Email" style="height: 55px;" required>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-white border-0" name="komentar" rows="5" placeholder="Komentar..." required></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Tinggalkan
                                        Komentar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <form action="/berita/cari" method="GET">
                            <div class="input-group">
                                <input type="text" name="s" class="form-control p-3 m-0"
                                    placeholder="Cari disini...">
                                <button type="submit" class="btn btn-primary px-4 m-0"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- Search Form End -->

                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Kategori</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            @foreach ($kategoriBerita as $item)
                                <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2"
                                    href="/berita/by-kategori/{{ Crypt::encryptString($item->id) }}"><i
                                        class="bi bi-arrow-right me-2"></i>{{ $item->nama }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Category End -->

                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Berita Terbaru</h3>
                        </div>
                        @foreach ($recent as $item)
                            @php
                                preg_match('/<img[^>]+src="([^">]+)"/i', $item->konten, $matches);
                                $item->img = isset($matches[1]) ? $matches[1] : asset('assets/img/profile.png');
                            @endphp
                            <div class="d-flex rounded overflow-hidden mb-3">
                                <img class="img-fluid" src="{{ $item->img }}"
                                    style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                <a href="/berita/detail/{{ Crypt::encryptString($item->id) }}"
                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0"
                                    style="width: 100%">
                                    <p>{{ $item->judul }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- Recent Post End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
