<?php

namespace Database\Factories;

use App\Models\Comentario;
use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    protected $model = Comentario::class;

    public function definition()
    {

        return [
            'libro_id' => Libro::factory(),
            'come_texto' => $this->faker->sentence,
        ];
    }
}
