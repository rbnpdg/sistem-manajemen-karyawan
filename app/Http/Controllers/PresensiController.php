<?php

namespace App\Http\Controllers;
use App\Models\Token;
use App\Models\Presensi;
use App\Models\Karyawan;

use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index() {
        return view('presensi');
    }

    public function presensiView() {
        return view('kar-presensi');
    }

    public function token() {
        return view('presensi-token');
    }
    
    public function generateQR(Request $req) {
        Token::truncate(); //delete token lama

        $token = Token::create(['token' => $req->input('token')]); //store token baru

        $qrurl = 'https://quickchart.io/qr?text=' . urlencode($token->token) . '&size=500'; //tampilkan qr

        return view('presensi-qr', compact('qrurl'));
    }

    public function verifToken(Request $req) {
        $getToken = Token::first(); //get token dari db

        if ($getToken && $getToken->token === $req->input('qrCode')) {
            return response()->json(['success' => true, 'message' => 'Token sesuai!']);
        }
        return response()->json(['success' => false, 'message' => 'Token tidak sesuai. Silahkan coba kembali!']);
    }

    public function storePresensi(Request $req)
    {
        //get user
        $user = auth()->user();

        //get id karyawan
        $karyawan = \App\Models\Karyawan::where('user_id', $user->id)->first();

        //jika karyawan tidak ditemukan
        if (!$karyawan) {
            return response()->json(['success' => false, 'message' => 'Karyawan tidak ditemukan!']);
        }

        // Validasi data dari request
        $validatedData = $req->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'token' => 'required',
            'status' => 'required|in:Hadir,Tidak Hadir'
        ]);

        $validatedData['karyawan_id'] = $karyawan->id;
        Presensi::create($validatedData); //store ke db

        return redirect('/karyawan/presensi')->with('success', 'Presensi berhasil!');
    }

}
