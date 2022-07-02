<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
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
                'Departamento de Medio Ambiente y Sostenibilidad',
                'Departamento de Innovación, Empresa y Nuevas Tecnologías',
                'Departamento de Ciencias del Lenguaje, Educación y Comunicación',
                'Departamento de Ciencias de la Salud',
                'Departamento de Proyectos'
            ]),
            'description' => $this->faker->sentence,
            'area_id' => $this->faker->numberBetween(1, 5), 
        ];
    }
}