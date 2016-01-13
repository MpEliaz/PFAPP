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
    
    return bcrypt("123123");
    
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
    	dd( Auth::user());

    });    
    
    Route::resource('partefuerza', 'ParteFuerzaController');
    Route::get('/home', 'HomeController@index');
Route::resource('usuarios', 'UsuariosController');
    Route::group(['middleware' => ['auth']], function(){
    	
    });
});



