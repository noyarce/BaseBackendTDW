<?php

namespace App\Console\Commands;

use App\Repositories\TestRepository;
use Illuminate\Console\Command;

class comandoEjemplo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fixer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'arreglar muchas cosas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fixer = new TestRepository();
        $fixer->fixer();
    }
}
