@extends('user.main')
@section('content')
    @php
        use App\Models\InformasiPublik;
        use App\Models\Profil;
        use App\Models\PelayananUmum;
        use App\Models\ProgramKegiatan;
        use App\Models\Informasi;
        use App\Models\Sosmed;

        $dropdownInformasiPublik = InformasiPublik::all();
        $dropdownProfil = Profil::all();
        $dropdownPelayananUmum = PelayananUmum::all();
        $dropdownProgramKegiatan = ProgramKegiatan::all();

        $informasi = Informasi::first();
        $sosmed = Sosmed::first();
    @endphp

    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn"></h1>
                {{-- <a href="/" class="h5 text-white">Home</a>
            <i class="far fa-circle text-white px-2"></i>
            <p class="h5 text-white">p> --}}
            </div>
        </div>
    </div>
</div>
    <!-- Navbar End -->

    <div class="container">

    </div>
@endsection
