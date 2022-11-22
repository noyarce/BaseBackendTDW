<?php

namespace Database\Seeders;

use App\Models\Comentario;
use App\Models\Libro;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // Libro::factory(20)->create();


        $libro = Libro::factory()->create();

        $posts = Comentario::factory()
            ->count(10)
            ->for($libro)
            ->create();
    }
}
