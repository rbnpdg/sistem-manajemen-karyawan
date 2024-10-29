<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';

    protected $fillable = ['nama', 'email', 'password', 'role'];

    protected $hidden = ['password', 'remember_token'];

    // Menggunakan email sebagai identifier untuk otentikasi
    public function getAuthIdentifierName()
    {
        return 'email';
    }
}

