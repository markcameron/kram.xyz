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

Route::get('/', [
  'as' => 'home',
  'uses' => 'HomeController@index'
]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(array('prefix' => 'admin', 'middleware' => 'admin'), function() {

  Route::resource('users', '\App\Http\Controllers\Admin\UsersController');
  Route::resource('roles', '\App\Http\Controllers\Admin\RolesController');
  Route::resource('pages', '\App\Http\Controllers\Admin\PagesController');

  Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

  // AdminController
  Route::controller('/', '\App\Http\Controllers\Admin\AdminController', [
    'getIndex' => 'admin',
    'getChangeStatus' => 'admin.change.status',
  ]);

  // Macros
  Route::controller('macros', '\App\Http\Controllers\Admin\MacrosController');

  // Contrib/Packages
  Route::controller('variables', '\Devfactory\Variables\Controllers\VariablesController');

});

Route::bind('pages_slug', function($value, $route) {
  return App\Models\Page::findBySlug($value);
});
Route::any('{pages_slug}', '\App\Http\Controllers\PagesController@show');