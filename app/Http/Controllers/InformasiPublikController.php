<?php

namespace App\Http\Controllers;

use App\Models\InformasiPublik;
use Illuminate\Http\Request;

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
    public function show(InformasiPublik $informasiPublik)
    {
        //
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
