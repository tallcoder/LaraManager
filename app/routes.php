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

Route::get('/', array('as'=> 'home','uses'=>'SessionsController@index'));
Route::get('login','SessionsController@index');
Route::get('logout','SessionsController@destroy');
Route::resource('sessions', 'SessionsController');

Route::get('projects', 'ProjectsController@index')->before('auth');

Route::group(array('prefix' => 'projects', 'before','auth'), function() {

	Route::get('{project}', 'ProjectsController@single');
	Route::get('create', array('as' => 'new', 'uses' => 'ProjectsController@create'));
	Route::get('{project}.edit', 'ProjectsController@edit');
	Route::get('{project}.delete', 'ProjectsController@delete');
});