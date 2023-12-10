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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('no_kendali');
            $table->string('judul');
            $table->enum("jenis", ["proposal","lpj"]);
            $table->enum("tipe", ["baru","revisi"]);
            $table->enum('pendanaan',["dana","non_dana"]);
            $table->enum('lembaga',["Badan Eksekutif Mahasiswa","Dewan Perwakilan Mahasiswa", "Departemen Sistem Informasi","Departemen Teknik Informatika","DISPLAY", "RAION","OPTIIK","BIOS","LKI-AMD","BCC","ROBOTIKA", "Tim/Kelompok","Individu"]);
            $table->string('nama_ketua');
            $table->string('nim_ketua');
            $table->string('no_ketua');
            $table->enum('bentuk',["kegiatan","event_lomba","finalis","student_exchange"]);
            $table->string('no_rek');
            $table->enum('status',['diproses','revisi','ditolak']);
            $table->string('catatan')->nullable();
            
            $table->foreignId('mahasiswa_id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }

};
