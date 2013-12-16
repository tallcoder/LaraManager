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
Route::get('logout', array('as' => 'logout', 'uses' => 'SessionsController@destroy'));

Route::resource('users', 'UsersController');
Route::resource('sessions', 'SessionsController');
Route::resource('projects', 'ProjectsController');
Route::resource('comments', 'CommentsController');
Route::resource('projects.lists', 'ListsController');
Route::resource('projects.tasks', 'TasksController');