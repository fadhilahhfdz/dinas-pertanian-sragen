<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sosmed = Sosmed::all();

        return view('admin.tampilan.sosmed.index', compact('sosmed'));
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
                'instagram' => 'nullable|string|max:255',
                'facebook' => 'nullable|string|max:255',
                'youtube' => 'nullable|string|max:255',
                'x' => 'nullable|string|max:255',
            ]);

            if (Sosmed::count() >= 1) {
                return redirect('/admin/sosmed')->with('error', 'Anda hanya bisa menambahkan 1 data');
            }

            Sosmed::create($request->all());

            return redirect('/admin/sosmed')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/sosmed')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sosmed $sosmed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sosmed = Sosmed::findOrFail($id);

        return view('admin.tampilan.sosmed.edit', compact('sosmed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'instagram' => 'nullable|string|max:255',
                'facebook' => 'nullable|string|max:255',
                'youtube' => 'nullable|string|max:255',
                'x' => 'nullable|string|max:255',
            ]);

            $sosmed = Sosmed::findOrFail($id);

            $sosmed->update($request->all());

            return redirect('/admin/sosmed')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("/admin/sosmed/edit/{$id}")->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sosmed = Sosmed::findOrFail($id);
        $sosmed->delete();

        return redirect('/admin/sosmed')->with('sukses', 'Data berhasil dihapus');
    }
}
