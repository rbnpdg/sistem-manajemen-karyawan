<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;

class DivisiController extends Controller
{
    // Menampilkan semua data divisi
    public function index()
    {
        $divisis = Divisi::all();
        return view('admin.divisi', compact('divisis'));
    }

    // Menampilkan form untuk membuat data divisi baru
    public function create()
    {
        return view('admin.adddivisi    ');
    }

    // Menyimpan data divisi baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        Divisi::create($request->all());
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data divisi
    public function edit($id)
    {
        $divisi = Divisi::findOrFail($id);
        return view('admin.editdivisi', compact('divisi'));
    }

    // Mengupdate data divisi dalam database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        $divisi = Divisi::findOrFail($id);
        $divisi->update($request->all());
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil diperbarui.');
    }

    // Menghapus data divisi dari database
    public function destroy($id)
    {
        Divisi::findOrFail($id)->delete();
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil dihapus.');
    }
}
