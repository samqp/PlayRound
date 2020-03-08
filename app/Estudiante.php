<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    //
            protected $table="estudiantes";
            protected $fillable = ['id_estudiante', 'fk_id_informacion','matricula','carrera','nickname'];

           public function Informacion(){

               return $this->hasOne('App\Informacion');
             
           }
}