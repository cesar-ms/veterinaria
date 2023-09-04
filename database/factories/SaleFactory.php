<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'responsable' => User::all()->random()->name,
            'pzas_venta'=> $this->faker->numberBetween(1,15),
            'costo'=>$this->faker->randomFloat(2,30,500),
            'fecha_venta'=>$this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
