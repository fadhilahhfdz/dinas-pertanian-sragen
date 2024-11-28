<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KomentarBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use function Laravel\Prompts\alert;

class KomentarBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id_berita)
    {
        try {
            $request->validate([
                'id_berita' => 'required',
                'nama' => 'required|string|max:100',
                'email' => 'required|string|max:100',
                'komentar' => 'required'
            ]);
    
            try {
                $decryptId = Crypt::decryptString($id_berita);
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                abort(404, 'Id tidak valid');
            }
    
            $berita = Berita::findOrFail($decryptId);

            $berita->komentar()->create($request->all());
    
            return redirect()->back();
        } catch (\Exception $e) {
            alert($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KomentarBerita $komentarBerita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KomentarBerita $komentarBerita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KomentarBerita $komentarBerita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KomentarBerita $komentarBerita)
    {
        //
    }
}
