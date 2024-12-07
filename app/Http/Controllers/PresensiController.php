<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index() {
        return view('presensi');
    }

    public function token() {
        return view('presensi-token');
    }

    public function generateQR(Request $req) {
        $token = $req->input('token');
        $qrurl = 'https://quickchart.io/qr?text=' . urlencode($token) . '&size=500';
        //dd($qrurl);
        return view('presensi-qr', compact('qrurl'));
    }
    

}
