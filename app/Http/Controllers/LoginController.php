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
        Session::flash('email', $req -> email);
        $req -> validate(
            ['email' => 'required', 'password' => 'required'],
            ['email.required' => 'Mohon masukkan email Anda'],
            ['password.required' => 'Mohon masukkan password Anda'],
        );

        $infologin = [
            'email' => $req -> email,
            'password' =>$req -> password,
        ];

        if(Auth::attempt($infologin)) {
            return redirect('/dashboard/admin') -> with('success', 'Berhasil login');
        } else {
            return redirect('login') -> withErrors('Username atau password Anda salah!');
        }
    }

    function logout() {
        Auth::logout();
        return redirect('login') -> with('success', 'Berhasil logout');
    }

    function admin() {
        return view('admin-dashboard');
    }
}
