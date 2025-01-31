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

    $informacion=Informacion::firstOrNew(['id_gmail'=>$request->input('id_gmail')]);

    if(!$informacion->exists){

      $resp='no registrado';

    }

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
    if($request->token){
         $socialUser= Socialite::driver('google')->userFromToken($request->token);
        //dd($socialUser);
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
    
         return \Redirect::to('/homeStudent');
    }// tendriamos que hacer un si no para decir que no existe la informacion de google
  
   

    }



    //SOCIALLITE 
 public function redirectToNetwork(){
    return Socialite::driver('google')->redirect();
 }

public function handleCallback(){
   
    $socialUser=Socialite::driver('google')->user();
    //dd($socialUser);
   $token=$socialUser->token;
    //Agregar campos faltantes en la tabla users
    //Verificar si el identificador de la red social  esta registrado
    $socialProfile=Informacion::firstOrNew(['id_gmail'=>$socialUser->getId()]);
    // si el social id no existe
    if(!$socialProfile->exists){
        return view('seleccion', compact('token'));
       //return View::make('seleccion',$socialUser);
    }
   
    //Auth::login($informacion);
    return view('homestudent');
   
    }


}
