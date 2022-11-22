<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $primaryKey= 'id';
    protected $table = 'generos';
    public $timestamps= true;

    protected $fillable= [
        "gen_categoria"
    ];

}
