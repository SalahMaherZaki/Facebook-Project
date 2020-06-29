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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('auth.guest');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/posts', 'PostController@store');

Route::delete('/posts/{post}', 'PostController@destroy');

Route::post('/posts/{post}/store', 'CommentController@store');

Route::delete('/comments/{comment}', 'CommentController@destroy');

Route::get('/posts/{post}/like', 'LikeController@likePost');

Route::get('/profile', 'ProfileController@profile');

Route::get('/{user}', 'ProfileController@show');
Route::post('/profile', 'ProfileController@updateAvatar');

Route::post('/profile/{id}/edit','ProfileController@edit');
