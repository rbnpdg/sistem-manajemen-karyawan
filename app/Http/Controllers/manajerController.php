<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;

class ManajerController extends Controller
{
    public function listKaryawan()
    {
        $karyawan = Karyawan::all(); 
        return view('list-karyawan', compact('karyawan')); 
    }
}
