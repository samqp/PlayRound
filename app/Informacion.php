<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Informacion extends Model
{
    //
     protected $table="informacions";
     protected $fillable = ['id_informacion', 'nombre', 'apellido_p','apellido_m', 'id_gmail','correo'];

  public function Estudiante(){

               return $this->hasOne('App\Estudiante');
             
           }
}
