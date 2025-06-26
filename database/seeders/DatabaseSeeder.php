<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hapus user adminbaru jika ada
        User::where('username', 'adminbaru')->delete();

        // Hapus user danil jika ada
        User::where('username', 'danil')->delete();

        // Membuat user admin baru
        User::create([
            'username' => 'adminbaru',
            'nama_lengkap' => 'Admin Baru',
            'email' => 'adminbaru@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Membuat user admin baru dengan email danil@gmail.com
        User::create([
            'username' => 'danil',
            'nama_lengkap' => 'Danil',
            'email' => 'danil@gmail.com',
            'password' => Hash::make('danil123'),
            'role' => 'admin',
        ]);
    }
}