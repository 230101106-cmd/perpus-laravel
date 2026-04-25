<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin Perpus',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123'), // Password wajib dienkripsi
        ]);

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
n
    }
}
