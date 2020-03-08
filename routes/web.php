<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('/push', function () {
event(new App\Events\Myevent('my-event'));
    return "Event has been sent!";
    
});


Route::post('/registroalumnomovil','ApiController@registroalumnomovil');
Route::post('/verificarregistro','ApiController@verificarregistro');
Route::post('/verificarconexion','ApiController@verificarconexion');


// ROUTES LOGIN
Route::get('login/gmail','ApiController@redirectToNetwork')->name('login');

Route::get('login/gmail/callback', 'ApiController@handleCallback');

Route::get('/student',function(){
	return view('formestudiante');
})->name('student');

Route::post('/saveStudent','ApiController@registroalumnoweb')->name('saveStudent');



Route::get('/profesor',function(){
	return view('formprofesor');
})->name('profesor');

Route::post('/saveProfesor','ApiController@registroprofesorweb')->name('saveProfesor');






// EJEMPLOS

Route::get('/tareas', 'TaskController@index');

Route::put('/tareas/actualizar', 'TaskController@update');

Route::post('/tareas/guardar', 'TaskController@store');

Route::delete('/tareas/borrar/{id}', 'TaskController@destroy');

Route::get('/tareas/buscar', 'TaskController@show');

//Route::post('/registro', '');





