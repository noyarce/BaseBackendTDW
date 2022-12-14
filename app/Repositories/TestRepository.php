<?php

namespace App\Repositories;

use App\Jobs\JobEjemplo;
use App\Models\Genero;
use App\Models\Libro;
use Exception;
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

        $libros = Libro::where('id', $request->id)->with(['genero', 'comentario'])
            ->get();

        return response()->json(
            ["libros" => $libros],
            Response::HTTP_OK
        );
    }

    public function guardarLibros($request)
    {
        //$libros = new Libro();
        //$libros->libr_autor = $request->autor;
        //$libros->libr_titulo = $request->titulo;
        //$libros->genero_id = $request->genero_id;
        //$libros->save();

        $libros = Libro::create([
            "libr_autor" => $request->autor,
            "libr_titulo" => $request->titulo,
            "genero_id" => $request->genero_id
        ]);

        return response()->json(["libros" => $libros], Response::HTTP_OK);
    }

    public function actualizarLibro($request)
    {
        try {
            $libros = Libro::findorFail($request->id);
            isset($request->titulo) && $libros->libr_titulo = $request->titulo;
            isset($request->genero) && $libros->genero_id = $request->genero;
            $libros->save();

            $libros = Libro::where('id', $request->id)
                ->update([
                    'libr_titulo' => $request->titulo,
                    'genero_id' => $request->genero_id
                ]);


            return response()->json(["libros" => $libros], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::info([
                "error" => $e,
                "mensaje" => $e->getMessage(),
                "linea" => $e->getLine(),
                "archivo" => $e->getFile(),
            ]);
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }


    public function eliminarLibro($request)
    {
        try {
            $libro = Libro::find($request->id);
            if(!$libro){
                throw new Exception("PARA LOCO !!!");
            }
            $libro->delete();

            return response()->json(["eliminados"=>"chao"], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ejemploJob($request)
    {
        try {
            JobEjemplo::dispatch($request->all())->onQueue('ejemplo');
            return response()->json(["se esta ejecutando"], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }


    public function fixer(){
        $libros= Libro::all();
        foreach ($libros as $libro){
            $libro->libr_autor = "Nicolas Oyarce";
            $libro->save();
        }

    }
}

//            throw new Exception("PARA LOCO !!!");
