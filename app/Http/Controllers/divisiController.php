<?php

namespace App\Http\Controllers;
use App\Models\Divisi;

use Illuminate\Http\Request;

class DivisiController extends Controller
{
    //tampil daftar divisi
    public function index()
    {
        $divisis = Divisi::all();
        return view('divisi', compact('divisis'));
    }

    //return view create divisi
    public function create()
    {
        return view('divisi-add');
    }

    //simpan data divisi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        Divisi::create($request->all());
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil ditambahkan.');
    }

    //return view edit divisi
    public function edit($id)
    {
        $divisi = Divisi::findOrFail($id);
        return view('divisi-edit', compact('divisi'));
    }

    //save data edit divisi
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

    //delete divisi
    public function destroy($id)
    {
        Divisi::findOrFail($id)->delete();
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil dihapus.');
    }
}
