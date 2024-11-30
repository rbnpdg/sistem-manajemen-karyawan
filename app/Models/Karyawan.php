<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $fillable = [
        'user_id',
        'divisi_id',
        'jabatan_id',
        'nama',
        'tanggal_lahir',
        'alamat',
        'no_telepon',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function divisi() {
        return $this->belongsTo(Divisi::class);
    }

    public function jabatan() {
        return $this->belongsTo(Jabatan::class);
    }
}
