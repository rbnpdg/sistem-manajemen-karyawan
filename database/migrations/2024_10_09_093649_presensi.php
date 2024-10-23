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
        Schema::create('presensi', function (Blueprint $table) {
            $table->id(); // Default to 'bigIncrements' (unsignedBigInteger)
            $table->date('tanggal');
            $table->unsignedBigInteger('id_karyawan');
            $table->time('waktu_datang');
            $table->time('waktu_pulang');
            $table->string('status');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
