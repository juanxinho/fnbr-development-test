<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Funiber\Area\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objArea = [
            [
                'name' => 'Departamento de Medio Ambiente y Sostenibilidad',
                'description' => 'Descripción Departamento de Medio Ambiente y Sostenibilidad',
                'short_code' => 'A1'
            ],
            [
                'name' => 'Departamento de Innovación, Empresa y Nuevas Tecnologías',
                'description' => 'Descripción Departamento de Innovación, Empresa y Nuevas Tecnologías',
                'short_code' => 'A2'
            ],
            [
                'name' => 'Departamento de Ciencias del Lenguaje, Educación y Comunicación',
                'description' => 'Descripción Departamento de Ciencias del Lenguaje, Educación y Comunicación',
                'short_code' => 'A3'
            ],
            [
                'name' => 'Departamento de Ciencias de la Salud',
                'description' => 'Descripción Departamento de Ciencias de la Salud',
                'short_code' => 'A4'
            ],
            [
                'name' => 'Departamento de Proyectos',
                'description' => 'Descripción Departamento de Proyectos',
                'short_code' => 'A5'
            ],
        ];

        foreach ($objArea as $data) {
            Area::create([
                'name' => $data["name"],
                'description' =>  $data["description"],
                'short_code' =>  $data["short_code"],
            ]);
        }
    }
}
