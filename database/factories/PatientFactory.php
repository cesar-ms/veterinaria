<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' =>$this->faker->name(),
            'ap_paterno'=>$this->faker->firstName(),
            'ap_materno'=>$this->faker->lastName(),
            'nombre_mascota'=>$this->faker->word(5),
            'edad_mascota'=>$this->faker->numberBetween(1,5),
            'tmp_nacimiento' =>$this->faker->randomElement(['días','meses','años']),
            'peso_mascota'=>$this->faker->randomFloat(2,0,10),
            'tipo'=>$this->faker->word(9),
            'raza'=>$this->faker->word(9),
            'diagnostico'=>$this->faker->text(300),
            'telefono'=>$this->faker->phoneNumber(),
            'correo'=>$this->faker->unique()->safeEmail(),
        ];
    }
}
