<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "razon_social" =>$this->faker->unique()->word(35),
            "fabricante" =>$this->faker->unique()->company(),
            "telefono" => $this->faker->phoneNumber(),
            "correo" => $this->faker->unique()->safeEmail()
        ];
    }
}
