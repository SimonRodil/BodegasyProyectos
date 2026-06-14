<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'name'     => 'Administrador',
            'email'    => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'rank'     => 1,
        ]);
    }
}
