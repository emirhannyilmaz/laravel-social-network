<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@index')->name('index')->middleware('guest');
Route::post('/login', 'AuthController@login')->name('login')->middleware('guest');
Route::post('/register', 'AuthController@register')->name('register')->middleware('guest');

Route::get('/home', 'PageController@home')->name('home')->middleware('auth');
Route::get('/explore', 'PageController@explore')->name('explore')->middleware('auth');
Route::get('/logout', 'AuthController@logout')->name('logout')->middleware('auth');
Route::post('/createpost', 'PostController@createPost')->name('createPost')->middleware('auth');
Route::get('/posts', 'PageController@posts')->name('posts')->middleware('auth');
Route::delete('/posts/delete', 'PostController@deletePost')->name('deletePost')->middleware('auth');
Route::get('/messages', 'PageController@messages')->name('messages')->middleware('auth');

Route::get('/profile/u/{username}', 'PageController@profile')->name('profile')->middleware('auth');
Route::post('/profile/follow', 'ProfileController@follow')->middleware('auth');
Route::post('/profile/unfollow', 'ProfileController@unFollow')->middleware('auth');
Route::put('/profile/update', 'ProfileController@updateProfile')->name('updateProfile')->middleware('auth');
