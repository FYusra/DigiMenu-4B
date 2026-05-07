<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '12345',
            'role' => 'admin'
        ]);
        User::create([
            'nama' => 'kasir',
            'email' => 'kasir@kasir.com',
            'password' => '12345',
            'role' => 'kasir'
        ]);
    }
}