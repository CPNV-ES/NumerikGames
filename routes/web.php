
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
    Route::resource('verses', 'VerseController');
    Route::resource('themes', 'ThemeController');
});

/* Routes for standard user */
Route::get('/', 'ThemeController@index')->name('home');
Route::get('/projectors', 'ProseController@projector')->name('projectors.index');
Route::resource('verses', 'VerseController', ['only' => ['create','index','store']]);
Route::resource('themes', 'ThemeController', ['only' => ['show']]);
Route::resource('proses', 'ProseController');

/* Auth routes */
Auth::routes();

