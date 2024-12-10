<?php

namespace App\Http\Controllers;
use App\Models\Karyawan;
use App\Models\User;
use App\Models\Divisi;
use App\Models\Jabatan;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index() {
        $karyawan = Karyawan::with(['user', 'divisi', 'jabatan'])->get();
        return view('karyawan', compact('karyawan'));
    }

    public function create()
    {
        $users = User::all();
        $divisi = Divisi::all();
        $jabatan = Jabatan::all();
        return view('karyawan-add', compact('users', 'divisi', 'jabatan'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'user_id' => 'required|exists:users,id',
            'divisi_id' => 'required|exists:divisi,id',
            'jabatan_id' => 'required|exists:jabatan,id',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:15',
        ]);

        Karyawan::create($req->all());
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $users = User::all();
        $divisi = Divisi::all();
        $jabatan = Jabatan::all();
        return view('karyawan-edit', compact('karyawan', 'users', 'divisi', 'jabatan'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'user_id' => 'required|exists:users,id',
            'divisi_id' => 'required|exists:divisi,id',
            'jabatan_id' => 'required|exists:jabatan,id',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:15',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($req->all());
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diupdate.');
    }

    public function destroy($id)
    {
        Karyawan::findOrFail($id)->delete();
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }

    public function presensi(Request $request) {
        $barcode = $request->input('barcode');
        
        $karyawan = Karyawan::where('barcode', $barcode)->first();
        
        if ($karyawan) {
            // Mark attendance (simulasi)
            $karyawan->update(['status_absensi' => 'hadir']);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    
}
