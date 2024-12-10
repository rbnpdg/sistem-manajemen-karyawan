<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function index() {
        return view('login');
    }

    function login(Request $req) {
        Session::flash('email', $req -> email);                     //menyimpan email ke session
        $req -> validate(                                           //validasi input pada form
            ['email' => 'required', 'password' => 'required'],
            ['email.required' => 'Mohon masukkan email Anda'],
            ['password.required' => 'Mohon masukkan password Anda'],
        );

        $infologin = [                                              //menyimpan parameter untuk melakukan login yang diambil dari form
            'email' => $req -> email,
            'password' =>$req -> password,
        ];

        if(Auth::attempt($infologin)) {                  
            $user = Auth::user();
            //mengecek email dan password yang disimpan dalam $infologin
            if ($user->role === 'admin') { // jika user adalah admin
                return redirect('/dashboard/admin')->with('success', 'Berhasil login sebagai admin');
            } else if ($user->role === 'karyawan'){ // jika user adalah karyawan
                return redirect('/dashboard/karyawan')->with('success', 'Berhasil login sebagai karyawan');
            } else if ($user->role === 'manajer'){ // jika user adalah karyawan
                return redirect('/dashboard/manajer')->with('success', 'Berhasil login sebagai manajer');
            } else {
                Auth::logout(); // Logout otomatis jika bukan admin
                return redirect('login')->withErrors('Anda bukan administrator!');
            }       //jika ada di database, maka akan menampilkan dashboard admin
        } else {
            return redirect('login') -> withErrors('Username atau password Anda salah!');   //jika tidak ada, maka akan tetap di page login dan menampilkan pesan gagal login
        }
    }

    function logout() {
        Auth::logout();
        return redirect('login') -> with('success', 'Berhasil logout');
    }

    function admin() {
        return view('admin-dashboard');
    }

    function karyawan() {
        return view('kar-dashboard');
    }
    
    function manajer() {
        return view('manajer-dashboard');
    }
}
