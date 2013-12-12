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

//session routes
Route::get('/', array('as'=> 'home','uses'=>'SessionsController@index'));
Route::get('logout','SessionsController@destroy');
Route::get('users/new', array('as' => 'users/new', 'uses' => 'UserController@getNew'));
Route::post('register', array('as' => 'register', 'uses' => 'UserController@postCreate'));

Route::get('projects', array('as' => 'projects', 'uses' => 'ProjectsController@index'));
Route::get('projects/create', array('as' => 'projects/create', 'uses' => 'ProjectsController@create'));
Route::post('projects/store', array('as' => 'projects.store', 'uses' => 'ProjectsController@store'));
Route::resource('sessions', 'SessionsController');
Route::get('projects/{project}', array('as'=>'projects/{project}', 'uses' => 'ProjectsController@show'));

Route::get('users/{user}', array('as' => 'users/{user}', 'uses' => 'UserController@show'));
Route::get('projects/edit/{project}', array('as' => 'projects/edit/{project}', 'uses' =>'ProjectsController@edit'));
Route::patch('projects/patch', array('as' => 'projects/patch', 'uses' => 'ProjectsController@patch'));