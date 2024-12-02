@extends('user.main')
@section('content')
    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Galeri</h1>
                {{-- <a href="/" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <p class="h5 text-white"></p> --}}
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->

    <div class="container">
        <div class="row">
            @foreach ($galeri as $item)
                <div class="col-md-4 mb-3 image-gallery" style="margin-bottom: 15px">
                    <div class="card single-image">
                        <img src="{{ asset($item->foto) }}" width="100%" class="card-img-top" alt="image"
                            style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#galeriModal{{ $item->id }}">
                    </div>
                </div>

                <!-- Modal untuk setiap gambar -->
                <div class="modal fade" id="galeriModal{{ $item->id }}" tabindex="-1"
                    aria-labelledby="galeriModalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset($item->foto) }}" width="100%" class="img-fluid"
                                    alt="{{ $item->caption }}">
                            </div>
                            <div class="modal-footer d-flex justify-content-start">
                                <p style="margin-bottom: 0">{{ $item->caption }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12 d-flex justify-content-center mb-4">
                {{ $galeri->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
