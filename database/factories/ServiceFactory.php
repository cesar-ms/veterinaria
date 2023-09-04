<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_servicio' =>$this->faker->word(55),
            'tipo' =>$this->faker->randomElement(['Consulta','Estetica']),
            'fecha_servicio' =>$this->faker->date('Y-m-d','now'),
            'hora' =>$this->faker->time('H:i:s','now'),
            'costo' =>$this->faker->numberBetween(100,600)
        ];
    }
}
