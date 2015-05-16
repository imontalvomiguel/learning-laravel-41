<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

// Definir la ruta para la página categoría
Route::get('candidates/{slug}/{id}', ['as' => 'category', 'uses' => 'CandidatesController@category']);

// Definir la ruta para mirar un candidato en particular
Route::get('{slug}/{id}', ['as' => 'candidate', 'uses' => 'CandidatesController@show']);


// Otro grupo de rutas para los usuarios que no están conectados
Route::group(['before' => 'guest'], function() {
  // Ruta para registro de usuarios
  Route::get('sign-up', ['as' => 'sign-up', 'uses' => 'UserController@signUp']);

  // Ruta a la cual se envia el formulario de registro de usuarios
  Route::post('sign-up', ['as' => 'register-user', 'uses' => 'UserController@registerUser']);

  // Ruta para login
  Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
});

// Grupo de rutas para los usuarios que están conectados
// Formularios (encapsulados)
Route::group(['before' => 'auth'], function() {

  /* Tengo ya muchas rutas, las traigo mejor de otro archivo para tener
  * esto un poco mas limpio.
  */
  require (__DIR__ . '/routes/auth.php');

  Route::group(['before' => 'is_admin'], function() {
    //Admin routes
    Route::get('admin/candidate/{id}', ['as' => 'admin_candidate_edit', function($id) {
      return 'Editando el candidato' . $id;
    }]);
  });

});
