<?php

namespace App\Http\Controllers;
use App\Models\Token;
use App\Models\Presensi;
use App\Models\Karyawan;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index() {
        $presensi = Presensi::with('karyawan')->get();
        return view('presensi', compact('presensi'));
    }

    public function presensiView() {
        $user = auth()->user();  //get id user
        $karyawan = Karyawan::where('user_id', $user->id)->first();  //get id karyawan
    
        //jika karyaawan not found
        if (!$karyawan) {
            return view('kar-presensi', ['presensi' => []])
                ->with('error', 'Data karyawan tidak ditemukan.');
        }
    
        //get data presensi
        $presensi = Presensi::with('karyawan')
            ->where('karyawan_id', $karyawan->id)
            ->get();
        
        //konversi waktu ke jkt
        foreach ($presensi as $item) {
            $item->waktu = Carbon::parse($item->waktu)->setTimezone('Asia/Jakarta')->toTimeString();
            $item->tanggal = Carbon::parse($item->tanggal)->setTimezone('Asia/Jakarta')->toDateString();
        }
    
        return view('kar-presensi', compact('presensi'));
    }
    
    public function viewManajer() {
        $presensi = Presensi::with('karyawan')->get();

        //konversi waktu ke jkt
        foreach ($presensi as $item) {
            $item->waktu = Carbon::parse($item->waktu)->setTimezone('Asia/Jakarta')->toTimeString();
            $item->tanggal = Carbon::parse($item->tanggal)->setTimezone('Asia/Jakarta')->toDateString();
        }

        return view('manajer-presensi', compact('presensi'));
    }

    public function presensiScan() {
        return view('kar-scan');
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

    public function update(Request $request, $id) {
        $presensi = Presensi::findOrFail($id);
        $presensi->update([
            'status' => $request->status,
        ]);
    
        return redirect()->route('presensi.index')->with('success', 'Status berhasil diperbarui.');
    }

}
