<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'user'; // Mengarahkan model ke tabel `user`
    protected $fillable = ['nama', 'email', 'jabatan', 'role'];
}
