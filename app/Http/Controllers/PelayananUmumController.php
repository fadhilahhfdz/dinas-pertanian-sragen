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

class PelayananUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelayananUmum = PelayananUmum::all();

        return view('admin.pelayanan-umum.index', compact('pelayananUmum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelayanan-umum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'konten' => 'required',
            ]);

            PelayananUmum::create($request->all());

            return redirect('/admin/pelayanan-umum')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/pelayanan-umum/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
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

        $pelayananUmum = PelayananUmum::findOrFail($decryptId);

        $dropdownPelayananUmum = PelayananUmum::all();
        $dropdownInformasiPublik = InformasiPublik::all();
        $dropdownProfil = Profil::all();
        $dropdownProgramKegiatan = ProgramKegiatan::all();

        $informasi = Informasi::first();
        $sosmed = Sosmed::first();

        return view('user.pelayanan-umum', compact('pelayananUmum', 'dropdownPelayananUmum', 'dropdownInformasiPublik', 'dropdownProfil', 'informasi', 'sosmed', 'dropdownProgramKegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pelayananUmum = PelayananUmum::findOrFail($id);

        return view('admin.pelayanan-umum.edit', compact('pelayananUmum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'konten' => 'required',
            ]);

            $pelayanUmum = PelayananUmum::findOrFail($id);

            $pelayanUmum->update($request->all());

            return redirect('/admin/pelayanan-umum')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("/admin/pelayanan-umum/edit/{$id}")->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelayananUmum = PelayananUmum::findOrFail($id);
        $pelayananUmum->delete();

        return redirect('/admin/pelayanan-umum')->with('sukses', 'Data berhasil dihapus');
    }
}
