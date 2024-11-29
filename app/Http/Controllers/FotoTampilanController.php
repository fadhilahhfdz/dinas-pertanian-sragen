<?php

namespace App\Http\Controllers;

use App\Models\FotoTampilan;
use Illuminate\Http\Request;

class FotoTampilanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotoTampilan = FotoTampilan::all();

        return view('admin.tampilan.foto-tampilan.index', compact('fotoTampilan'));
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
                'foto_tampilan' => 'required|image|mimes:jepg,png,jpg|max:5120',
            ]);

            if(FotoTampilan::count() >= 3) {
                return redirect('/admin/foto-tampilan')->with('error', 'Anda hanya bisa menambah 3 foto');
            }

            $fotoName = time() . '.' . $request->foto_tampilan->extension();
            $fotoPath = 'foto_tampilan/' . $fotoName;
            $request->foto_tampilan->move(public_path('foto_tampilan'), $fotoName);

            FotoTampilan::create([
                'foto_tampilan' => $fotoPath
            ]);

            return redirect('/admin/foto-tampilan')->with('sukses', 'Foto berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/foto_tampilan')->with('gagal', 'Foto gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FotoTampilan $fotoTampilan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fotoTampilan = FotoTampilan::findOrFail($id);

        return view('admin.tampilan.foto-tampilan.edit', compact('fotoTampilan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'foto_tampilan' => 'image|mimes:jpeg,png,jpg|max:5120',
            ]);

            $fotoTampilan = FotoTampilan::findOrFail($id);

            if ($request->hasFile('foto_tampilan')) {
                if (file_exists(public_path($fotoTampilan->foto_tampilan))) {
                    unlink(public_path($fotoTampilan->foto_tampilan));
                };

                //upload foto baru
                $fotoName = time() . '.' . $request->foto_tampilan->extension();
                $fotoPath = 'foto_tampilan/' . $fotoName;
                $request->foto_tampilan->move(public_path('foto_tampilan'), $fotoName);

                //update path foto
                $fotoTampilan->foto_tampilan = $fotoPath;
            }

            $fotoTampilan->save();

            return redirect('/admin/foto-tampilan')->with('sukses', 'Foto berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("/admin/foto-tampilan/edit/{$id}")->with('gagal', 'Foto gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fotoTampilan = FotoTampilan::findOrFail($id);
        $fotoTampilan->delete();

        return redirect('/admin/foto-tampilan')->with('sukses', 'Foto berhasil dihapus');
    }
}
