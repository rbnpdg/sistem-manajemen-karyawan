<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('email')->unique();
            $table->string('no_telp', 12)->nullable();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('id_jabatan');
            $table->unsignedBigInteger('id_divisi');
            $table->decimal('gaji', 15, 2);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade'); // Relasi dengan tabel roles
            $table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('cascade');
            $table->foreign('id_divisi')->references('id')->on('divisi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
