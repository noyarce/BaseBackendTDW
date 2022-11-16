<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        "come_texto"
    ];

    // public function libro(){
    //     return $this->belongsTo(Libro::class, "id");
    // }
}
