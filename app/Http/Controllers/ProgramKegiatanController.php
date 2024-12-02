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

class ProgramKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programKegiatan = ProgramKegiatan::all();

        return view('admin.program-kegiatan.index', compact('programKegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.program-kegiatan.create');
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

            ProgramKegiatan::create($request->all());

            return redirect('/admin/program-kegiatan')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/program-kegiatan/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
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

        $programKegiatan = ProgramKegiatan::findOrFail($decryptId);

        $dropdownProgramKegiatan = ProgramKegiatan::all();
        $dropdownPelayananUmum = PelayananUmum::all();
        $dropdownInformasiPublik = InformasiPublik::all();
        $dropdownProfil = Profil::all();

        $informasi = Informasi::first();
        $sosmed = Sosmed::first();

        return view('user.program-kegiatan', compact('programKegiatan', 'dropdownProgramKegiatan','dropdownPelayananUmum', 'dropdownInformasiPublik', 'dropdownProfil', 'informasi', 'sosmed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $programKegiatan = ProgramKegiatan::findOrFail($id);

        return view('admin.program-kegiatan.edit', compact('programKegiatan'));
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

            $programKegiatan = ProgramKegiatan::findOrFail($id);

            $programKegiatan->update($request->all());

            return redirect('/admin/program-kegiatan')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("/admin/program-kegiatan/edit/{$id}")->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $programKegiatan = ProgramKegiatan::findOrFail($id);
        $programKegiatan->delete();

        return redirect('/admin/program-kegiatan')->with('sukses', 'Data berhasil di hapus');
    }
}
