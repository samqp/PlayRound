<?php


namespace App\Http\Controllers;

use App\Events\Myevent;
use Socialite;
use Auth;
use App\Informacion;
use App\Estudiante;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
    //



public function verificarconexion(Request $request)
    {

   $resp='conectado';
   
        return $resp;
    }


public function verificarregistro(Request $request)
    {

    $resp='ya registrado';
    

       return $resp;
}

// REGISTRO DE USUARIO POR MOVIL
public function registroalumnomovil(Request $request){

    $resp='ya registrado';
    

$informacion=Informacion::firstOrNew(['id_gmail'=>$request->input('id_gmail')]);


if(!$informacion->exists){

        $info = Informacion::create([
	        'nombre'=> $request->input('nombre'),
		    'apellido_p'=>$request->input('apellido_p'),
		    'apellido_m'=>$request->input('apellido_m'),
		    'correo'=> $request->input('correo'),
		    'id_gmail'=> $request->input('id_gmail'),

        ]); 

	$resp='registro infor';
    $infos= DB::table('informacions')->select('id_informacion')->where('id_gmail','=',$request->input('id_gmail'))->first();
  
     Estudiante::create([
            'fk_id_informacion'=>$infos->id_informacion,
            'matricula'=>$request->input('matricula'),
            'carrera'=>$request->input('carrera'),
            'nickname'=> $request->input('nickname'),

        ]); 

    $resp='registro estu';


    }

         return $resp;

    }

// REGISTRO DE USUARIOS WEB


public function registroprofesorweb(Request $request){


    $resp='ya registrado';
    $socialUser=Socialite::driver('google')->user();
      dd('entra22');
    dd($socialUser);
   
   
    //Agregar campos faltantes en la tabla users
    //Verificar si el identificador de la red social  esta registrado
    $socialProfile=Informacion::firstOrNew(['id_gmail'=>$socialUser->getId()]);


if(!$socialProfile->exists){
dd('entroooooooooooo');
$nombrecompleto= explode(" ",$socialUser->getName());

        $info = Informacion::create([
            'nombre'=> $nombrecompleto[0],
            'apellido_p'=>$nombrecompleto[1],
            'apellido_m'=>$nombrecompleto[2],
            'correo'=> $socialUser->getEmail(),
            'id_gmail'=>$socialUser->getId(),

        ]); 

    $resp='registro infor';
    $infos= DB::table('informacions')->select('id_informacion')->where('id_gmail','=',$socialUser->getId())->first();
  
     Estudiante::create([
            'fk_id_informacion'=>$infos->id_informacion,
            'matricula'=>$request->input('matricula'),
            'carrera'=>$request->input('carrera'),
            'nickname'=> $request->input('nickname'),

        ]); 

    $resp='registro estu';
    

    }

         return $resp;

    }




public function registroalumnoweb(Request $request){


    $resp='ya registrado';
    $socialUser=Socialite::driver('google')->user();
      dd('entra22');
    dd($socialUser);
   
   
    //Agregar campos faltantes en la tabla users
    //Verificar si el identificador de la red social  esta registrado
    $socialProfile=Informacion::firstOrNew(['id_gmail'=>$socialUser->getId()]);


if(!$socialProfile->exists){
dd('entroooooooooooo');
$nombrecompleto= explode(" ",$socialUser->getName());

        $info = Informacion::create([
            'nombre'=> $nombrecompleto[0],
            'apellido_p'=>$nombrecompleto[1],
            'apellido_m'=>$nombrecompleto[2],
            'correo'=> $socialUser->getEmail(),
            'id_gmail'=>$socialUser->getId(),

        ]); 

    $resp='registro infor';
    $infos= DB::table('informacions')->select('id_informacion')->where('id_gmail','=',$socialUser->getId())->first();
  
     Estudiante::create([
            'fk_id_informacion'=>$infos->id_informacion,
            'matricula'=>$request->input('matricula'),
            'carrera'=>$request->input('carrera'),
            'nickname'=> $request->input('nickname'),

        ]); 

    $resp='registro estu';
    

    }

         return $resp;

    }



    //SOCIALLITE 
 public function redirectToNetwork(){
    return Socialite::driver('google')->redirect();
 }

public function handleCallback(){
   
    $socialUser=Socialite::driver('google')->user();
    //dd($socialUser);
   
   
    //Agregar campos faltantes en la tabla users
    //Verificar si el identificador de la red social  esta registrado
    $socialProfile=Informacion::firstOrNew(['id_gmail'=>$socialUser->getId()]);
    //Verificamos que el correo electronico de la red social no esta registrado
    $informacion=Informacion::firstOrNew(['correo'=>$socialUser->getEmail()]);
    // si el social id no existe
    if(!$socialProfile->exists){
        return view('seleccion');
    // si el correo no existe  
    if(!$informacion->exists){
    // si no existe obtenemos el usuario y correo
    $informacion->nombre=$socialUser->getName();
    $informacion->apellido_p='qui';
    $informacion->apellido_m='pe';
    $informacion->correo=$socialUser->getEmail();
    }
    //guardamos el avatar, id y nombre de la red social
    //$user->avatar=$socialUser->getAvatar();
    $informacion->id_gmail=$socialUser->getId();
   
   
    $informacion->save();
    }
   
    //Auth::login($informacion);
    return view('homestudent');
   
    }


}
