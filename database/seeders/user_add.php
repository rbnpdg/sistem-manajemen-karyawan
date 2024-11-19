<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class user_add extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(//[
        //     'email' => 'yono@yono.com',
        //     'role' => 'admin',
        //     'password' => Hash::make('123'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ],
        [
            'email' => 'karyawan@yono.com',
            'role' => 'karyawan',
            'password' => Hash::make('123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
