<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasi = Informasi::all();

        return view('admin.tampilan.informasi.index', compact('informasi'));
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
                'nama' => 'required|string|max:255',
                'telepon' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'alamat' => 'required',
                'deskripsi' => 'required',
            ]);

            if (Informasi::count() >= 1) {
                return redirect('/admin/informasi')->with('error', 'Anda hanya dapat menambahkan 1 data');
            }

            $fotoName = time() . '.' . $request->logo->extension();
            $fotoPath = 'logo_web/' . $fotoName;
            $request->logo->move(public_path('logo_web'), $fotoName);

            Informasi::create([
                'nama' => $request->nama,
                'telepon' => $request->telepon,
                'email' => $request->email,
                'logo' => $fotoPath,
                'alamat' => $request->alamat,
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect('/admin/informasi')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/informasi')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Informasi $informasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);

        return view('admin.tampilan.informasi.edit', compact('informasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'telepon' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'alamat' => 'required',
                'deskripsi' => 'required',
            ]);

            $informasi = Informasi::findOrFail($id);

            if ($request->hasFile('logo')) {
                if (file_exists(public_path($informasi->logo))) {
                    unlink(public_path($informasi->logo));
                };

                //upload foto baru
                $fotoName = time() . '.' . $request->logo->extension();
                $fotoPath = 'logo_web/' . $fotoName;
                $request->logo->move(public_path('logo_web'), $fotoName);

                //update path foto
                $informasi->logo = $fotoPath;
            }

            $informasi->nama = $request->nama;
            $informasi->telepon = $request->telepon;
            $informasi->email = $request->email;
            $informasi->alamat = $request->alamat;
            $informasi->deskripsi = $request->deskripsi;
            $informasi->save();

            return redirect('/admin/informasi')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("/admin/informasi/edit/{$id}")->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();

        return redirect('/admin/informasi')->with('sukses', 'Data berhasil dihapus');
    }
}
