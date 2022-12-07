<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Artisan;
use Exception;

class TraitEjemplo
{
    public $base;

    public function __construct()
    {
        $this->baseUrl = "";
    }

    public function obtenerFoto()
    {
        $response = Http::get("https://dog.ceo/api/breeds/image/random");
        $response->throw();
        return $response->json();
    }
}
