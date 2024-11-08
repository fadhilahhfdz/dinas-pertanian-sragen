<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\InformasiPublik;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function index()
    {
        $dropdownInformasiPublik = InformasiPublik::all();

        $informasi = Informasi::first();

        return view('user.index', compact('dropdownInformasiPublik', 'informasi'));
    }
}
