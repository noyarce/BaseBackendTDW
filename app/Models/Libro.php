<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
use HasFactory;

    protected $table = 'libros';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        "libr_autor",
        "libr_titulo"
    ];

    // public function comentario(){
    //     return $this->hasMany(Comentario::class, "id");
    // }
}


