<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix'=>'admin','middleware' => 'auth'], function(){

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/post/create',[
		'uses' => 'PostsController@create',
		'as' => 'post.create'

	]);

	Route::post('/post/store',[
		'uses' => 'PostsController@store',
		'as' => 'post.store'
	]);

	Route::post('/post/filter',[
		'uses' => 'PostsController@filter',
		'as' => 'post.filter'
	]);

});




