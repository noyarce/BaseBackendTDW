<?php

namespace App\Repositories;

use App\Models\Genero;
use App\Models\Libro;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TestRepository
{
    public function listarLibros()
    {
        $libros = Libro::all();
        $generos = Genero::all();
        return response()->json(["libros" => $libros, "generos" => $generos], Response::HTTP_OK);
    }
    public function filtrarLibros($request)
    {
        Log::info(["el request--> " => $request->all()]);

        $libros = Libro::where('id', $request->id)->with(['genero', 'comentario'])
            ->get();

        return response()->json(
            ["libros" => $libros],
            Response::HTTP_OK
        );
    }

    public function guardarLibros($request)
    {
        $libros = new Libro();
        $libros->libr_autor = $request->autor;
        $libros->libr_titulo = $request->titulo;
        $libros->genero_id = $request->genero_id;
        $libros->save();
        return response()->json(["libros" => $libros], Response::HTTP_OK);
    }
}
