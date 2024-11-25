@extends('user.main')
@section('content')
    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Berita</h1>
                <h6 class="display-4 text-white animated zoomIn">Hasil Pencarian:</h6>
                {{-- <a href="" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h5 text-white">Blog Grid</a> --}}
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="row g-5">
                        @forelse ($hasil as $item)
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
                            <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                                <div class="blog-item bg-light rounded overflow-hidden">
                                    <div class="blog-img position-relative overflow-hidden">
                                        <img class="img-fluid" src="{{ $imgSrc }}" alt="">
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
                        @empty
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    <p class="text-center m-0">Tidak ada hasil yang ditemukan.</p>
                                </div>
                            </div>
                        @endforelse
                        <div class="col-12 wow slideInUp" data-wow-delay="0.1s">
                            {{ $hasil->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
                <!-- Blog list End -->

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
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
