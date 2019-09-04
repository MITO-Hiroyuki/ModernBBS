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
    Route::resource('thread', 'ThreadController');
    Route::put('thread/{id}', 'ThreadController@showThread');
    Route::resource('comment', 'CommentController');
    Route::put('comment/{id}', 'CommentController@show');
    Route::resource('response', 'ResponseController');
    Route::put('response/{id}', 'ResponseController@show');
    Route::get('comment/{comment}/good', 'GoodController@store');
    Route::get('comment/{comment}/good/{good}', 'GoodController@destory');
    Route::post('comment/{comment}/good', 'GoodController@store');
    Route::post('comment/{comment}/good/{good}', 'GoodController@destory');
});

Route::get('category/index','CategoryController@index');

Route::get('profile/profile', 'ProfileController@get_profile');


Route::get('profile/pindex', 'ProfileController@test');
Route::get('profile/store/{id}', 'FollowController@store');
Route::get('profile/destroy/{id}', 'FollowController@destroy');