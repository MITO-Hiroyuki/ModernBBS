<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'bbs','middleware'=>'auth'], function() 
{
	Route::get('profile/create', 'ProfileController@add');
	Route::post('profile/create', 'ProfileController@create');
	Route::get('profile/edit', 'ProfileController@edit');
	Route::post('profile/edit', 'ProfileController@update');
	Route::get('profile/show', 'ProfileController@description')->name('myprofile');
	Route::get('profile/pindex', 'ProfileController@test');
	Route::get('profile/follows', 'ProfileController@get_follows');
	Route::get('profile/mythreads', 'ProfileController@get_threads');
	
	Route::resource('thread', 'ThreadController');
	Route::get('thread/create', 'ThreadController@add');
	Route::post('thread/create', 'ThreadController@create'); 
	Route::get('thread/index/{id}', 'ThreadController@showThread');
	
	Route::get('comment/comment/{id}', 'ThreadController@show');
	Route::get('comment/comment', 'CommentController@add');
	Route::post('comment/comment', 'CommentController@create'); 
	Route::get('comment/comment/{comment}/good', 'GoodController@store');
	Route::get('comment/comment/{comment}/good/{good}', 'GoodController@destory');
	Route::post('comment/comment/{comment}/good', 'GoodController@store');
	Route::post('comment/comment/{comment}/good/{good}', 'GoodController@destory');
	
	Route::get('response/response/{id}', 'CommentController@show');
	Route::get('response/response', 'ResponseController@add');
	Route::post('response/response/', 'ResponseController@create'); 
});

Route::get('category/index','CategoryController@index');

Route::get('profile/profile', 'ProfileController@get_profile');



Route::get('profile/store/{id}', 'FollowController@store');
Route::get('profile/destroy/{id}', 'FollowController@destroy');
