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

    public function libro()
    {
        return $this->belongsTo(Libro::class, "libro_id");
    }
    /** esta funcion como el caso inverso de libros, nos indica la relación que libros tiene con comentario
    * en este caso comentario pertenece a libro,
    * y le decimos que usamos la fk libro_id dentro de la tabla comentarios*/
}
