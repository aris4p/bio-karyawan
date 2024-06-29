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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('posisi', 50)->nullable();
            $table->string('nama', 50)->nullable();
            $table->string('noktp', 16)->nullable();
            $table->string('tempattgllahir', 50)->nullable(); //tempat tanggal lahir
            $table->enum('jenkel', ['Laki-Laki', 'Perempuan'])->nullable(); // jenis kelamin
            $table->string('agama', 25)->nullable();
            $table->string('goldar', 2)->nullable();
            $table->string('status', 20)->nullable();
            $table->string('alamat_ktp', 100)->nullable();
            $table->string('alamat_tinggal', 100)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('notelpon', 15)->nullable();
            $table->string('notelpon_tdkt', 15)->nullable(); //no telpon terdekat
            $table->string('id_pendidikan')->nullable();
            $table->string('id_pelatihan')->nullable();
            $table->string('id_pekerjaan')->nullable();
            $table->string('skill')->nullable();
            $table->enum('persetujuan', ['Ya', 'Tidak'])->nullable();
            $table->string('penghasilan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
