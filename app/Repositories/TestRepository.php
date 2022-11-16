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

    public function guardarLibros($request)
    {
        $libros = new Libro();
        $libros->libr_autor = $request->autor;
        $libros->libr_titulo = $request->titulo;
        $libros->save();
        return response()->json(["libros" => $libros], Response::HTTP_OK);
    }
}
