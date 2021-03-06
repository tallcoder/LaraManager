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
View::share('me', Auth::user());
//session routes
Route::get('/', array('as'=> 'home','uses'=>'SessionsController@index'));
Route::get('logout', array('as' => 'logout', 'uses' => 'SessionsController@destroy'));
Route::get('reset', array('as' => 'forgotpassword', 'uses' => 'RemindersController@getRemind'));
Route::post('remind', array('as' => 'remindpassword', 'uses' => 'RemindersController@postRemind'));

//other GET routes
Route::get('users/{user}/options', array('as' => 'users.options', 'uses' => 'UsersController@getOptions'));
Route::get('search', array('uses' => 'SearchController@get'));

//other POST routes
Route::post('subscribe/{type}/{id}', array('uses' => 'AjaxController@subscribe'));
Route::post('t/complete/{id}', array('uses' => 'AjaxController@complete'));
Route::post('t/delete/{id}', array('uses' => 'AjaxController@deleteTask'));
Route::post('users/{user}/options/save', array('as' => 'users.options.save', 'uses' => 'UsersController@saveOptions'));
Route::post('u/delete/{id}', array('uses' => 'AjaxController@deleteUser'));

//RESTful routes
Route::resource('users', 'UsersController');
Route::resource('sessions', 'SessionsController');
Route::resource('projects', 'ProjectsController');
Route::resource('comments', 'CommentsController', array('only' => array('store')));
Route::resource('projects.tasklists', 'TasklistsController');
Route::resource('projects.tasks', 'TasksController');

Route::group(array('before' => 'staff'), function() {
	Route::get('projects/{project}/tasks/{task}/completed', array ('uses' => 'TasksController@complete'));
	Route::get('projects/{projects}/delete', array('as' => 'projects.delete', 'uses' => 'ProjectsController@delete'));
	Route::post('projects/{projects}/destroy', array('as' => 'projects.destroy', 'uses' => 'ProjectsController@destroy'));
	Route::get('projects/{projects}/tasks/{task}/delete', array('as' => 'projects.tasks.delete',
	                                                     'uses' => 'TasksController@delete'));
	Route::post('projects/{projects}/tasks/{tasks}/destroy', array('as' => 'projects.tasks.destroy',
	                                                    'uses' => 'TasksController@destroy'));
	Route::get('projects/{projects}/tasklists/{tasklists}/delete', array('as' => 'projects.tasklists.delete',
	                                                                     'uses' => 'TasklistsController@delete'));
	Route::post('projects/{projects}/tasklists/{tasklists}/destroy', array('as' => 'projects.tasklists.destroy',
	                                                'uses' => 'TasklistsController@destroy'));
	Route::get('comments/{comments}/delete', array('as' => 'comments.delete', 'uses' => 'CommentsController@delete'));
	Route::post('comments/{comments}/destroy', array('as' => 'comments.destroy', 'uses' => 'CommentsController@destroy'));
});
Route::group(array('before' => 'admin'), function() {
	Route::get('users/{users}/delete', array('as' => 'users.delete', 'uses' => 'UsersController@delete'));
	Route::post('users/{users}/destroy', array('as' => 'users.destroy', 'uses' => 'UsersController@destroy'));
});


