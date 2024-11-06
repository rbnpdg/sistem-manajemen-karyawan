<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class jabatan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatan')->insert([
            'nama' => 'Kepala divisi',
            'tunjangan' => 'Kendaraan operasional',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
