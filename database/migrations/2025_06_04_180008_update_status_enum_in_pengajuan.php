<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStatusEnumInPengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Modify the 'status' column to include new enum values
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revert the 'status' column to original enum values
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->enum('status', ['baru', 'diproses', 'selesai', 'ditolak'])->default('baru')->change();
        });
    }
}
