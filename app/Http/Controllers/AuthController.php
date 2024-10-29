<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function tampilLoginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            // Jika login berhasil, redirect sesuai dengan role user
            $user = Auth::user();
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard'); // Ganti dengan rute admin
                case 'karyawan':
                    return redirect()->route('karyawan.dashboard'); // Ganti dengan rute karyawan
                case 'manajer':
                    return redirect()->route('manajer.dashboard'); // Ganti dengan rute manajer
                default:
                    return redirect()->route('login.form')->withErrors(['msg' => 'User not recognized.']);
            }
        }

        return redirect()->route('login.form')->withErrors(['msg' => 'Invalid credentials.']);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
