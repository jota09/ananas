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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::view('/process', 'process');

Route::any('/postList', 'WallController@index')->name('postList')->middleware('auth');

Route::view('/formCreatePost', 'wall.formCreatePost')->middleware('auth');

//Route::post('/postCreate', 'WallController@create')->name('postCreate')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
