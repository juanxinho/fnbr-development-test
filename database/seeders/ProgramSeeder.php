<?php

namespace Database\Seeders;

use App\Models\Funiber\Area\Area;
use App\Models\Funiber\Program\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objProgram = [
            [
                'name' => 'Máster Universitario en Gestión y Auditorías Ambientales',
                'description' => 'Descripción Máster Universitario en Gestión y Auditorías Ambientales',
                'short_code_area' => 'A1'
            ],
            [
                'name' => 'Maestría en Dirección Estratégica con Mención en Gerencia',
                'description' => 'Descripción Maestría en Dirección Estratégica con Mención en Gerencia',
                'short_code_area' => 'A2'
            ],
            [
                'name' => 'Maestría en Dirección Estratégica con Especialización en Tecnologías de la Información',
                'description' => 'Descripción Maestría en Dirección Estratégica con Especialización en Tecnologías de la Información',
                'short_code_area' => 'A2'
            ],
            [
                'name' => 'Maestría en Dirección Estratégica con mención en Telecomunicaciones',
                'description' => 'Descripción Maestría en Dirección Estratégica con mención en Telecomunicaciones',
                'short_code_area' => 'A2'
            ],
            [
                'name' => 'Máster Universitario en Formación de Profesores de Español como Lengua Extranjera',
                'description' => 'Descripción Máster Universitario en Formación de Profesores de Español como Lengua Extranjera',
                'short_code_area' => 'A3'
            ],
            [
                'name' => 'Maestría en Educación con mención en Educación Superior',
                'description' => 'Descripción Maestría en Educación con mención en Educación Superior',
                'short_code_area' => 'A3'
            ],
            [
                'name' => 'Maestría en Educación con especialidad en Organización y Gestión de Centros Educativos',
                'description' => 'Descripción Maestría en Educación con especialidad en Organización y Gestión de Centros Educativos',
                'short_code_area' => 'A3'
            ],
            [
                'name' => 'Máster Universitario en Actividad Física: Entrenamiento y Gestión Deportiva',
                'description' => 'Descripción Máster Universitario en Actividad Física: Entrenamiento y Gestión Deportiva',
                'short_code_area' => 'A4'
            ],
            [
                'name' => 'Maestría en Ciencias Naturopáticas',
                'description' => 'Descripción Maestría en Ciencias Naturopáticas',
                'short_code_area' => 'A4'
            ],
            [
                'name' => 'Máster Universitario en Diseño, Gestión y Dirección de Proyectos',
                'description' => 'Descripción Máster Universitario en Diseño, Gestión y Dirección de Proyectos',
                'short_code_area' => 'A5'
            ],
            [
                'name' => 'Maestría en Diseño, Dirección y Gestión de Proyectos con especialidad en Innovación y Productos',
                'description' => 'Descripción Maestría en Diseño, Dirección y Gestión de Proyectos con especialidad en Innovación y Productos',
                'short_code_area' => 'A5'
            ],
            [
                'name' => 'Maestría en Diseño, Dirección y Gestión de Proyectos con especialidad en Arquitectura y Urbanismo',
                'description' => 'Descripción Maestría en Diseño, Dirección y Gestión de Proyectos con especialidad en Arquitectura y Urbanismo',
                'short_code_area' => 'A5'
            ],
        ];

        foreach ($objProgram as $data) {
            $objArea = Area::where("short_code", $data["short_code_area"])->first();
            Program::create([
                'name' => $data["name"],
                'description' =>  $data["description"],
                'area_id' =>  $objArea->id,
            ]);
        }
    }
}
