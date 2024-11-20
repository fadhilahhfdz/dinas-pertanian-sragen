<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriBerita = KategoriBerita::all();

        return view('admin.berita.kategori.index', compact('kategoriBerita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:100'
            ]);

            KategoriBerita::create($request->all());

            return redirect('/admin/berita/kategori')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/berita/kategori')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriBerita $kategoriBerita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategoriBerita = KategoriBerita::findOrFail($id);

        return view('admin.berita.kategori.edit', compact('kategoriBerita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:100'
            ]);

            $kategoriBerita = KategoriBerita::findOrFail($id);

            $kategoriBerita->update($request->all());

            return redirect('/admin/berita/kategori')->with('sukses', 'Data berhasil diupdate');
        } catch(\Exception $e) {
            return redirect("/admin/berita/kategori/edit/{$id}")->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategoriBerita = KategoriBerita::findOrFail($id);
        $kategoriBerita->delete();

        return redirect('/admin/berita/kategori')->with('sukses', 'Data berhasil dihapus');
    }
}
