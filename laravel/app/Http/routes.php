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
  'uses' =>'Admin\AdminController@index',
  'middleware' => 'admin'
]);

Route::group(array('prefix' => 'admin', 'middleware' => 'admin'), function() {

  Route::resource('users', '\App\Http\Controllers\Admin\UsersController');
  Route::resource('roles', '\App\Http\Controllers\Admin\RolesController');

  Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

  // Root
  Route::get('/', [
    'as' => 'admin',
    'uses' =>'Admin\AdminController@index',
  ]);

  // Contrib/Packages
  Route::controller('variables', '\Devfactory\Variables\Controllers\VariablesController');

});