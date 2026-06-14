<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = ['Medellín', 'Bogotá', 'Cali', 'Barranquilla', 'Cartagena', 'Envigado', 'Itagüí', 'Sabaneta'];
        foreach ($cities as $name) {
            City::create(['nombre' => $name]);
        }
    }
}
