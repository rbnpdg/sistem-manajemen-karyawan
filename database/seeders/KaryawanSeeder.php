<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data dummy
        DB::table('karyawan')->insert([
            [
                'user_id' => 4,
                'divisi_id' => 2,
                'jabatan_id' => 1,
                'nama' => 'Joko Suhendro',
                'tanggal_lahir' => '1990-05-15',
                'alamat' => 'Metro',
                'no_telepon' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
