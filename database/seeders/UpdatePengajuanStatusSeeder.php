<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdatePengajuanStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This will update any 'status' values in 'pengajuan' table that are not in the new enum
     * ['menunggu', 'diproses', 'selesai', 'ditolak'] to 'menunggu' as default.
     *
     * @return void
     */
    public function run()
    {
        $validStatuses = ['menunggu', 'diproses', 'selesai', 'ditolak'];

        DB::table('pengajuan')
            ->whereNotIn('status', $validStatuses)
            ->update(['status' => 'menunggu']);
    }
}