<?php

namespace App\Repositories;

use App\Models\Libro;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TestRepository
{
    public function listarLibros()
    {
        $libros = Libro::all();
        return response()->json(["libros" => $libros], Response::HTTP_OK);
    }

}
