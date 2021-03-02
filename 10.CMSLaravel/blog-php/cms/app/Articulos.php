<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
     protected $table = 'articulos';

     /*=============================================
     INNER JOIN DESDE EL MODELO
     =============================================*/
     public function categorias(){

     	return $this->belongsTo('App\Categorias', 'id_cat', 'id_categoria');

     }
     
}
