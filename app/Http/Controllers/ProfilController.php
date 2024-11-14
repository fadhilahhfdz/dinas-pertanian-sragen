<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\InformasiPublik;
use App\Models\Profil;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profil = Profil::all();

        return view('admin.profil.index', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profil.create');
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

            Profil::create($request->all());

            return redirect('/admin/profil')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/profil/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
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

        $profil = Profil::findOrFail($decryptId);

        $dropdownInformasiPublik = InformasiPublik::all();
        $dropdownProfil = Profil::all();

        $informasi = Informasi::first();
        $sosmed = Sosmed::first();

        return view('user.profil', compact('profil', 'dropdownInformasiPublik', 'dropdownProfil', 'informasi', 'sosmed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profil = Profil::findOrFail($id);

        return view('admin.profil.edit', compact('profil'));
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

            $profil = Profil::findOrFail($id);

            $profil->update($request->all());

            return redirect('/admin/profil')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("admin/profil/edit/{$id}")->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);
        $profil->delete();

        return redirect('/admin/profil')->with('sukses', 'Data berhasil dihapus');
    }
}
