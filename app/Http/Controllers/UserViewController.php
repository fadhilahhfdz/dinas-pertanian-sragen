<?php

namespace App\Http\Controllers;

use App\Models\InformasiPublik;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function index()
    {
        $informasiPublik = InformasiPublik::all();

        return view('user.index', compact('informasiPublik'));
    }
}
