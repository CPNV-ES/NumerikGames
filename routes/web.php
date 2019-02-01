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

Route::middleware(['auth'])->group(function () {
    Route::resource('proses', 'ProseController');
    Route::resource('verses', 'VerseController');
    Route::resource('themes', 'ThemeController');
});
Route::resource('themes', 'ThemeController', ['only' => ['index']]);
Route::resource('verses', 'VerseController', ['only' => ['create']]);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
