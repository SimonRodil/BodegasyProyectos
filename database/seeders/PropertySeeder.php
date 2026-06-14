<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $properties = [
            [
                'nombre' => 'Bodega Industrial Laureles',
                'tipo_propiedad' => 'Bodega',
                'tipo_oferta' => 1,
                'banos' => '2',
                'area' => 500.00,
                'tamano_lote' => '1000',
                'ano' => 2018,
                'descripcion' => 'Amplia bodega en Laureles con excelente ubicación, cerca a vías principales.',
                'ciudad' => 1,
                'barrio' => 1,
                'direccion' => 'Carrera 70 # 45-20',
                'precio' => 850000000,
            ],
            [
                'nombre' => 'Local Comercial El Poblado',
                'tipo_propiedad' => 'Local',
                'tipo_oferta' => 2,
                'banos' => '1',
                'area' => 120.00,
                'tamano_lote' => null,
                'ano' => 2020,
                'descripcion' => 'Local comercial en El Poblado, excelente flujo de clientes.',
                'ciudad' => 1,
                'barrio' => 2,
                'direccion' => 'Calle 10 # 35-50',
                'precio' => 3500000,
            ],
            [
                'nombre' => 'Oficina Centro Chapinero',
                'tipo_propiedad' => 'Oficina',
                'tipo_oferta' => 1,
                'banos' => '1',
                'area' => 85.00,
                'tamano_lote' => null,
                'ano' => 2019,
                'descripcion' => 'Oficina amoblada en Chapinero, lista para usar.',
                'ciudad' => 2,
                'barrio' => 7,
                'direccion' => 'Calle 72 # 10-30',
                'precio' => 320000000,
            ],
            [
                'nombre' => 'Bodega San Fernando',
                'tipo_propiedad' => 'Bodega',
                'tipo_oferta' => 1,
                'banos' => '3',
                'area' => 800.00,
                'tamano_lote' => '1500',
                'ano' => 2015,
                'descripcion' => 'Bodega con amplio parqueadero y fácil acceso.',
                'ciudad' => 3,
                'barrio' => 10,
                'direccion' => 'Calle 5 # 40-20',
                'precio' => 1200000000,
            ],
            [
                'nombre' => 'Terreno Barranquilla Norte',
                'tipo_propiedad' => 'Terreno',
                'tipo_oferta' => 1,
                'banos' => '0',
                'area' => 2000.00,
                'tamano_lote' => '2000',
                'ano' => null,
                'descripcion' => 'Terreno en zona de expansión, ideal para proyecto industrial.',
                'ciudad' => 4,
                'barrio' => 13,
                'direccion' => 'Vía al Mar Km 5',
                'precio' => 2500000000,
            ],
        ];

        foreach ($properties as $i => $data) {
            $data['imagen_destacada'] = 'propiedad-' . ($i + 1) . '.jpg';
            Property::create($data);
        }
    }
}
