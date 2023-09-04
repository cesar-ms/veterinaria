<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' =>$this->faker->unique()->sentence(3),
            'tipo_articulo' =>$this->faker->randomElement(['venta','insumo']),
            'categoria' =>$this->faker->randomElement(['medicamento','accesorio','alimento']),
            'descripcion' =>$this->faker->text(200),
            'fecha_caducidad' =>'2025-01-01',
            'num_pzas' =>$this->faker->numberBetween(0,100),
            'costo_pzas' =>$this->faker->randomFloat(2,40,800),
            'fecha_llegada' =>$this->faker->date('Y-m-d','now'),
            'codigo_barras' =>$this->faker->unique()->ean13(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
