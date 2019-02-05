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


/* Routes for admin only */
Route::middleware(['auth'])->group(function () {
    Route::resource('proses', 'ProseController');
    Route::resource('verses', 'VerseController');
    Route::resource('themes', 'ThemeController');
});

/* Routes for user only */
Route::middleware(['guest'])->group(function () {
    /* Home link to theme */
    Route::get('game', 'VerseController@create')->name('game.verse.create');
    Route::post('game', 'VerseController@store')->name('game.verse.store');

});

Route::get('/result', 'ProseController@result')->name('result.index');

/* Home link to theme */
Route::get('/', 'ThemeController@index');

/* Routes for standard user */
Route::resource('verses', 'VerseController', ['only' => ['create']]);

/* Auth routes */
Auth::routes();
