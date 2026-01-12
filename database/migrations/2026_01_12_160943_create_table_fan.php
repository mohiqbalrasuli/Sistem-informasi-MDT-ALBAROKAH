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
        Schema::create('table_fan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fan');
            $table->string('nama_kitab');
            $table->enum('kelas',['shifir_a','shifir_b','kelas_1','kelas_2','kelas_3','kelas_4']);
            $table->foreignId('pengajar_id')->constrained('table_pengajar')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_fan');
    }
};
