<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\InformasiPublik;
use App\Models\PelayananUmum;
use App\Models\Profil;
use App\Models\ProgramKegiatan;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class InformasiPublikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasiPublik = InformasiPublik::all();

        return view('admin.informasi-publik.index', compact('informasiPublik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.informasi-publik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:225',
                'konten' => 'required',
            ]);

            InformasiPublik::create($request->all());

            return redirect('/admin/informasi-publik')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/informasi-publik/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
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

        $informasiPublik = InformasiPublik::findOrFail($decryptId);

        $dropdownInformasiPublik = InformasiPublik::all();
        $dropdownProfil = Profil::all();
        $dropdownPelayananUmum = PelayananUmum::all();
        $dropdownProgramKegiatan = ProgramKegiatan::all();

        $informasi = Informasi::first();
        $sosmed = Sosmed::first();

        return view('user.informasi-publik', compact('informasiPublik', 'dropdownInformasiPublik', 'informasi', 'sosmed', 'dropdownProfil', 'dropdownPelayananUmum', 'dropdownProgramKegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $informasiPublik = InformasiPublik::findOrFail($id);

        return view('admin.informasi-publik.edit', compact('informasiPublik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:225',
                'konten' => 'required',
            ]);

            $informasiPublik = InformasiPublik::findOrFail($id);

            $informasiPublik->update($request->all());

            return redirect('/admin/informasi-publik')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("/admin/informasi-publik/edit/{$id}")->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $informasiPublik = InformasiPublik::findOrFail($id);
        $informasiPublik->delete();

        return redirect('/admin/informasi-publik')->with('sukses', 'Data berhasil dihapus');
    }
}
