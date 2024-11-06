<?php

namespace App\Http\Controllers;
use App\Models\Jabatan;

use Illuminate\Http\Request;

class JabatanController extends Controller
{
    //tampil list jabatan
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('jabatan', compact('jabatans'));
    }

    //return view create jabatan
    public function create()
    {
        return view('jabatan-add');
    }

    //simpan data jabatan baru
    public function store(Request $req)
    {
        $req -> validate([
            'nama' => 'required|string|max:255',
            'tunjangan' => 'required|string|max:255',
        ]);

        Jabatan::create($req -> all());
        return redirect() -> route('jabatan.index') -> with('success', 'Jabatan berhasil ditambahkan.');
    }

    //return view edit jabatan
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('jabatan-edit', compact('jabatan'));
    }

    //save data edit jabatan
    public function update(Request $req, $id)
    {
        $req -> validate([
            'nama' => 'required|string|max:255',
            'tunjangan' => 'required|string|max:255',
        ]);

        $jab = Jabatan::findOrFail($id);
        $jab -> update($req -> all());
        return redirect() -> route('jabatan.index') -> with('success', 'Jabatan berhasil diperbarui.');
    }

    //delete jabatan
    public function destroy($id)
    {
        Jabatan::findOrFail($id)->delete();
        return redirect() -> route('jabatan.index') -> with('success', 'Jabatan berhasil dihapus.');
    }
}
