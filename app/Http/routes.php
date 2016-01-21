<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('verificar', function() {
    
    dd(\Auth::user());
    
});

Route::post('usuarios/estado', 'UsuariosController@cambiar_estado');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => ['web']], function () {

    Route::auth();
    Route::get('/', function(){
    	
        return view('welcome');
    });
    Route::get('/v', function(){
    	dd( Auth::user()->rol_id);

    });    
    
    
    Route::get('/home', 'HomeController@index');
    
    Route::group(['middleware' => ['auth']], function(){

        //Rutas Parte
        Route::delete('partefuerza/eliminar_motivo', 'ParteFuerzaController@eliminar_motivos');
    	Route::resource('partefuerza', 'ParteFuerzaController');

        //Rutas Usuario
        Route::get('usuarios/asignar', 'UsuariosController@asignar');
        Route::post('usuarios/asignar', 'UsuariosController@guardar_asignado');
        Route::get('usuarios/{id}/asignar_unidad', 'UsuariosController@asignar_unidad');
        Route::resource('usuarios', 'UsuariosController');

    });
});



