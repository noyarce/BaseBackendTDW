<?php

namespace Database\Factories;

use App\Models\Genero;
use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{
    protected $model = Libro::class;

    public function definition()
    {
        return [
            'genero_id' => Genero::factory(),
            'libr_autor' => $this->faker->name,
            'libr_titulo' => $this->faker->sentence,
        ];
    }
}
