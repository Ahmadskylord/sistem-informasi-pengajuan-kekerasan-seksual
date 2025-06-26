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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelapor')->nullable();
            $table->string('nama_pelapor', 100);
            $table->string('nim_nidn', 20)->nullable();
            $table->string('email', 100);
            $table->string('telepon', 20);
            $table->enum('jenis_kekerasan', ['fisik', 'psikis', 'seksual', 'lainnya']);
            $table->text('deskripsi');
            $table->date('tanggal_kejadian');
            $table->string('lokasi_kejadian', 255);
            $table->string('bukti', 255)->nullable();
            $table->enum('status', ['baru', 'diproses', 'selesai', 'ditolak'])->default('baru');
            $table->timestamps();

            $table->foreign('id_pelapor')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
