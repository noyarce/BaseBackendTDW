<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory; /** este campo le indica al sistema que puede usar un factory en el, 
                    * viene por defecto al momento de crear */

    protected $table = 'libros';      /** Este campo le indica al modelo la tabla que utilizamos en bd */
    protected $primaryKey = 'id';    /**y este indica la primary key */
    public $timestamps = true;      /** este indica si usaremos timestamps para marcar fecha y hora en que
                                    * creamos cada registro y/o lo modificamos. sirve para seguimiento */

    protected $fillable = [ 
        "libr_autor",
        "libr_titulo"
    ];                          /**este array contiene los parametros que nosotros ingresaremos 
                                *manualmente en nuestra tabla, no incluye las foreign key */

    public function comentario() 
    {
        return $this->hasMany(Comentario::class);
    }

    /**esta funcion nos sirve para definir las relaciones de la bd entre tablas. en este caso indicamos que libro tiene varios comentarios
    en el modelo comentarios está el caso inverso */

    public function genero(){
        return $this->belongsTo(Genero::class,'genero_id');
    }

}
