<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Informasi;
use App\Models\InformasiPublik;
use App\Models\KategoriBerita;
use App\Models\PelayananUmum;
use App\Models\Profil;
use App\Models\ProgramKegiatan;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::orderBy('updated_at', 'desc')->get();

        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriBerita = KategoriBerita::all();
        return view('admin.berita.create', compact('kategoriBerita'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|max:255',
                'author' => 'required|string|max:255',
                'konten' => 'required',
                'id_kategori' => 'required|exists:kategori_beritas,id'
            ], [
                'id_kategori.required' => 'silahkan pilih kategori dengan benar',
                'id_kategori.exists' => 'silahkan pilih kategori dengan benar',
            ]);

            Berita::create($request->all());

            return redirect('/admin/berita')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/berita/create')->with('gagal', 'Data gagal disimpan, ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $decryptId = Crypt::decryptString($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Id tidak valid');
        }

        $berita = Berita::findOrFail($decryptId);
        $kategoriBerita = KategoriBerita::all();
        $recent = Berita::latest()->paginate(5);

        // dropdown
        $dropdownInformasiPublik = InformasiPublik::all();
        $dropdownProfil = Profil::all();
        $dropdownPelayananUmum = PelayananUmum::all();
        $dropdownProgramKegiatan = ProgramKegiatan::all();

        $informasi = Informasi::first();
        $sosmed = Sosmed::first();

        return view('user.berita.detail-berita', compact('berita', 'kategoriBerita', 'recent', 'dropdownInformasiPublik', 'dropdownProfil', 'dropdownPelayananUmum', 'informasi', 'sosmed', 'dropdownProgramKegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $kategoriBerita = KategoriBerita::all();

        return view('admin.berita.edit', compact('berita', 'kategoriBerita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'judul' => 'required|max:255',
                'author' => 'required|string|max:255',
                'konten' => 'required',
                'id_kategori' => 'required|exists:kategori_beritas,id'
            ], [
                'id_kategori.required' => 'silahkan pilih kategori dengan benar',
                'id_kategori.exists' => 'silahkan pilih kategori dengan benar',
            ]);

            $berita = Berita::findOrFail($id);

            $berita->update($request->all());

            return redirect('/admin/berita')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("/admin/berita/edit/{$id}")->with('gagal', 'Data gagal diupdate, ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect('/admin/berita')->with('sukses', 'Data berhasil dihapus');
    }

    public function berita_all()
    {
        // dropdown
        $dropdownInformasiPublik = InformasiPublik::all();
        $dropdownProfil = Profil::all();
        $dropdownPelayananUmum = PelayananUmum::all();
        $dropdownProgramKegiatan = ProgramKegiatan::all();

        $informasi = Informasi::first();
        $sosmed = Sosmed::first();

        $berita = Berita::latest()->paginate(10);
        $kategoriBerita = KategoriBerita::all();

        return view('user.berita.berita-all', compact('dropdownInformasiPublik', 'dropdownProfil', 'informasi', 'sosmed', 'berita', 'kategoriBerita', 'dropdownPelayananUmum', 'dropdownProgramKegiatan'));
    }

    public function berita_by_kategori($id)
    {
        try {
            $decryptId = Crypt::decryptString($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Id tidak valid');
        }

        $kategoriBerita = KategoriBerita::findOrFail($decryptId);
        $berita = Berita::where('id_kategori', $decryptId)->latest()->paginate(10);
        $kategoriBeritaAll = KategoriBerita::all();

        // dropdown
        $dropdownInformasiPublik = InformasiPublik::all();
        $dropdownProfil = Profil::all();
        $dropdownPelayananUmum = PelayananUmum::all();
        $dropdownProgramKegiatan = ProgramKegiatan::all();

        $informasi = Informasi::first();
        $sosmed = Sosmed::first();

        return view('user.berita.berita-by-kategori', compact('kategoriBerita', 'berita', 'kategoriBeritaAll', 'dropdownInformasiPublik', 'dropdownProfil', 'dropdownPelayananUmum', 'informasi', 'sosmed', 'dropdownProgramKegiatan'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('s');
        $hasil = Berita::where('judul', 'LIKE', "%{$searchQuery}%")
                            ->orWhere('author', 'LIKE', "%{$searchQuery}%")
                            ->orWhere('konten', 'LIKE', "%{$searchQuery}%")
                            ->orWhereHas('kategori', function($query) use ($searchQuery) {
                                $query->where('nama', 'LIKE', "%{$searchQuery}%");
                            })
                            ->latest()->paginate(5);
        
        $kategoriBerita = KategoriBerita::all();

        // dropdown
        $dropdownInformasiPublik = InformasiPublik::all();
        $dropdownProfil = Profil::all();
        $dropdownPelayananUmum = PelayananUmum::all();
        $dropdownProgramKegiatan = ProgramKegiatan::all();

        $informasi = Informasi::first();
        $sosmed = Sosmed::first();

        return view('user.berita.cari-berita', compact('hasil', 'kategoriBerita', 'dropdownInformasiPublik', 'dropdownProfil', 'dropdownPelayananUmum', 'informasi', 'sosmed', 'dropdownProgramKegiatan'));
    }
}
