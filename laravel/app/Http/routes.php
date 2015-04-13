<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('admin', [
  'as' => 'admin',
  'uses' =>'Admin\AdminController@index'
]);

Route::group(array('prefix' => 'admin'), function() {

//  Route::group(array('before' => 'admin-auth'), function() {
    Route::controller('variables', '\Devfactory\Variables\Controllers\VariablesController');
//  });

});