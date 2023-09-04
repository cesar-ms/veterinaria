<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'descripcion' => $this->faker->text(100),
            'fecha_cita' => $this->faker->date('Y-m-d','2022-11-30'),
            'hora'=> $this->faker->time('H:i:s','now'),
            'paciente_id' => Patient::all()->random()->id,
        ];
    }
}
