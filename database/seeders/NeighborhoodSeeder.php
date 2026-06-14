<?php

namespace Database\Seeders;

use App\Models\Neighborhood;
use Illuminate\Database\Seeder;

class NeighborhoodSeeder extends Seeder
{
    public function run(): void
    {
        $neighborhoods = [
            1 => ['Laureles', 'El Poblado', 'Belén', 'Envigado Centro', 'Estadio', 'Los Colores'],
            2 => ['Chapinero', 'Usaquén', 'Santa Fe', 'Teusaquillo', 'Fontibón'],
            3 => ['El Peñón', 'San Fernando', 'Granada', 'Ciudad Jardín'],
            4 => ['Norte', 'Sur', 'Centro Histórico'],
        ];

        foreach ($neighborhoods as $cityId => $names) {
            foreach ($names as $name) {
                Neighborhood::create(['nombre' => $name, 'ciudad' => $cityId]);
            }
        }
    }
}
