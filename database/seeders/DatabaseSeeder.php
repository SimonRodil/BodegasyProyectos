<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
            NeighborhoodSeeder::class,
            PropertySeeder::class,
        ]);

        User::create([
            'username' => 'admin',
            'name'     => 'Administrador',
            'email'    => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'rank'     => 1,
        ]);

        if (env('ADMIN_EMAIL') && env('ADMIN_PASSWORD')) {
            User::create([
                'username' => env('ADMIN_USERNAME', 'admin2'),
                'name'     => env('ADMIN_NAME', 'Admin Personal'),
                'email'    => env('ADMIN_EMAIL'),
                'password' => Hash::make(env('ADMIN_PASSWORD')),
                'rank'     => env('ADMIN_RANK', 1),
            ]);
        }
    }
}
