<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Traits\TraitEjemplo;

class JobEjemplo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $request;
    public $dato;
    public function __construct($request, $dato)
    {
        $this->request = $request;
        $this->dato = $dato;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $trait = new TraitEjemplo();
            $foto = $trait->obtenerFoto();
            Log::info(["foto" => $foto]);

            // Log::info(["request en el handle" => $this->request, "dato" => $this->dato]);
        } catch (Exception $e) {
            Log::info(["error" => $e->getMessage()]);
        }
    }
}
