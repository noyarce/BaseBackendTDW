<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Artisan;
use Exception;

class TraitEjemplo
{
    public $baseUrl;

    public function __construct()
    {
        $this->baseUrl = "https://dog.ceo/api/breeds/image/random";
    }

    public function obtenerFoto()
    {
        $response = Http::get($this->baseUrl);
        $response->throw();
        return $response->json();
    }

    public function postearCosa()
    {

        $response = Http::post($this->baseUrl, [
            "foo" => "bar"
        ]);
        if ($response->ok()) {
            return "ok";

            Log::info(["Hola" => "salio bien"]);
        } else {
            return $response->status();

            Log::info(["chau" => $response->getBody()]);
        }
    }
}
