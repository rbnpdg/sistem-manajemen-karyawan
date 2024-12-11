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
    
    public function viewData()
    {
        $userId = auth()->id(); // Mendapatkan user ID dari session login
        $karyawan = Karyawan::with(['user', 'divisi', 'jabatan'])->where('user_id', $userId)->firstOrFail();
        return view('kar-profile', compact('karyawan'));
    }

    public function viewEdit($id) {
        $karyawan = Karyawan::findOrFail($id);

        $divisi = Divisi::all();
        $jabatan = Jabatan::all();

        return view('kar-profile_edit', compact('karyawan', 'divisi', 'jabatan'));
    }

    public function updateKar(Request $req, $id)
    {
        
        $validated = $req->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'divisi_id' => 'required|exists:divisi,id',
            'jabatan_id' => 'required|exists:jabatan,id',
        ]);
    
        // Mendapatkan user yang sedang login
        $user = auth()->user();  // Mendapatkan ID user yang sedang login
    
        // Mendapatkan karyawan berdasarkan user_id
        $karyawan = Karyawan::where('user_id', $user->id)->first();
        $karyawan->update([
            'nama' => $req->input('nama'),
            'tanggal_lahir' => $req->input('tanggal_lahir'),
            'alamat' => $req->input('alamat'),
            'no_telepon' => $req->input('no_telepon'),
            'divisi_id' => $req->input('divisi_id'),
            'jabatan_id' => $req->input('jabatan_id'),
            // user_id tidak perlu diupdate karena sudah diatur berdasarkan user yang sedang login
        ]);
        return redirect()->route('karyawan.data')->with('success', 'Karyawan berhasil diupdate.');
    }

}
