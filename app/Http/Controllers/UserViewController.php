<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\FotoTampilan;
use App\Models\Informasi;
use App\Models\InformasiPublik;
use App\Models\PelayananUmum;
use App\Models\Profil;
use App\Models\ProgramKegiatan;
use App\Models\Sosmed;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function index()
    {
        $dropdownInformasiPublik = InformasiPublik::all();
        $dropdownProfil = Profil::all();
        $dropdownPelayananUmum = PelayananUmum::all();
        $dropdownProgramKegiatan = ProgramKegiatan::all();

        $informasi = Informasi::first();
        $sosmed = Sosmed::first();
        $fotoTampilan = FotoTampilan::all();
        $berita = Berita::latest()->paginate(3);

        return view('user.index', compact('dropdownInformasiPublik', 'informasi', 'sosmed', 'dropdownProfil', 'dropdownPelayananUmum', 'berita', 'fotoTampilan', 'dropdownProgramKegiatan'));
    }

    public function fallback()
    {
        $dropdownInformasiPublik = InformasiPublik::all();
        $dropdownProfil = Profil::all();
        $dropdownPelayananUmum = PelayananUmum::all();
        $dropdownProgramKegiatan = ProgramKegiatan::all();

        $informasi = Informasi::first();
        $sosmed = Sosmed::first();

        return view('user.404', compact('dropdownInformasiPublik', 'dropdownProfil', 'dropdownPelayananUmum', 'dropdownProgramKegiatan', 'informasi', 'sosmed'));
    }
}
