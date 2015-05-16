<?php
  Route::get('account', ['as' => 'account', 'uses' => 'UserController@account']);
  Route::put('account', ['as' => 'update_account', 'uses' => 'UserController@updateAccount']);
  Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
  Route::put('profile', ['as' => 'update_profile', 'uses' => 'UserController@updateProfile']);
  // Ruta para logout
  Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
