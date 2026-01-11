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
        Schema::create('table_murid', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->enum('kelas',['shifir_a','shifir_b','kelas_1','kelas_2','kelas_3','kelas_4']);
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('tahun_masuk');
            $table->string('alamat');
            $table->string('foto');
            $table->string('akta');
            $table->string('kk');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('no_telp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_murid');
    }
};
