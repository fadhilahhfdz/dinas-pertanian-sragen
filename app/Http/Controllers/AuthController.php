<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.auth.register', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string|max:100|unique:users,username',
                'password' => 'required|string|min:8|regex:/[A-Z]/',
            ]);
    
            $user = new User();
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->save();
    
            return redirect('/login')->with('sukses', 'Registrasi berhasil');
        } catch (\Exception $e) {
            return redirect('/register')->with('gagal', 'Registrasi gagal ' . $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('username', 'password'))) {
            return redirect('admin/dashboard')->with('sukses', 'Berhasil login');
        } else {
            return back()->with('gagal', 'Username atau password salah');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    public function dashboard() {
        return view('admin.auth.dashboard');
    }

    public function profile($id) {
        $user = User::findOrFail($id);

        return view('admin.auth.profile', compact('user'));
    }

    public function edit_profile(Request $request, $id) {
        try {
            $user = User::findOrFail($id);

            if ($request->password === null) {
                $user->username = $request->username;
                $user->update();
            } else {
                $user->username = $request->username;
                $user->password = Hash::make($request->password);
                $user->update();
            }

            return redirect("/admin/user-profile/{$id}")->with('sukses', 'Berhasil');
        } catch (\Exception $e) {
            return redirect("/admin/user-profile{$id}")->with('gagal', 'Gagal ' . $e->getMessage());
        }
    }

    public function fallback()
    {
        return view('admin.404');
    }
}
