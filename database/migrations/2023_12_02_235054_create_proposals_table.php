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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id');

            $table->integer('nominal_pengajuan')->nullable();
            $table->integer('nominal_acc')->nullable();
            $table->string('deskripsi');
            $table->enum('tingkat',["internasional","nasional","daerah","universitas","intern"]);
            $table->enum('keterkaitan',["tes1","tes2","daerah","universitas","intern"]);
            $table->string('keterangan_revisi');

            $table->string('upload_kendali');
            $table->string('upload_memo_bem')->nullable();
            $table->string('upload_surat_permohonan')->nullable();
            $table->string('upload_ijin_kegiatan')->nullable();
            $table->string('upload_surat_tugas')->nullable();
            $table->string('upload_sertifikat')->nullable();

            $table->string('upload_proposal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
