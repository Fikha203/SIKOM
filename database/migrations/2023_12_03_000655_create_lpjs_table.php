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
        Schema::create('lpjs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id');

            $table->string('nominal_dana');
            $table->string('hasil_kegiatan');
            $table->string('email_ketua');
            $table->string('keterangan_revisi')->nullable();
            $table->string('upload_kendali')->nullable();
            $table->string('upload_acc_keuangan')->nullable();
            $table->string('upload_lpj')->nullable();
            $table->string('upload_sertifikat_lomba')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lpjs');
    }
};
