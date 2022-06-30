<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Area>
 */
class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'Máster Universitario en Gestión y Auditorías Ambientales',
                'Maestría en Dirección Estratégica con Mención en Gerencia',
                'Maestría en Dirección Estratégica con Especialización en Tecnologías de la Información',
                'Maestría en Dirección Estratégica con mención en Telecomunicaciones',
                'Máster Universitario en Formación de Profesores de Español como Lengua Extranjera',
                'Maestría en Educación con mención en Educación Superior',
                'Maestría en Educación con especialidad en Organización y Gestión de Centros Educativos',
                'Máster Universitario en Actividad Física: Entrenamiento y Gestión Deportiva',
                'Maestría en Ciencias Naturopáticas',
                'Máster Universitario en Diseño, Gestión y Dirección de Proyectos',
                'Maestría en Diseño, Dirección y Gestión de Proyectos con especialidad en Innovación y Productos',
'               Maestría en Diseño, Dirección y Gestión de Proyectos con especialidad en Arquitectura y Urbanismo'
            ]),
            'description' => $this->faker->sentence,
        
        ];
    }
}