<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Posts
Route::get('posts/create', [
	'uses' => 'CreatePostsController@create',
	'as' => 'posts.create'
]);

Route::post('posts/create', [
	'uses' => 'CreatePostsController@store',
	'as' => 'posts.store'
]);
