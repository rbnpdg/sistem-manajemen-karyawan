<?php

use Illuminate\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123'), // Gunakan bcrypt untuk mengenkripsi password
            'role' => 'admin',
        ]);

        User::create([
            'nama' => 'Karyawan User',
            'email' => 'karyawan@admin.com',
            'password' => bcrypt('123'),
            'role' => 'karyawan',
        ]);

        User::create([
            'nama' => 'Manajer User',
            'email' => 'manajer@admin.com',
            'password' => bcrypt('123'),
            'role' => 'manajer',
        ]);
    }
}
