<?php

namespace App\Http\Controllers;

use App\Repositories\TestRepository;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected TestRepository $testRepo;
    public function __construct(TestRepository $testRepo)
    {
        $this->testRepo = $testRepo;
    }

    public function listarLibros(Request $request)
    {
        return $this->testRepo->listarLibros();
    }
}
