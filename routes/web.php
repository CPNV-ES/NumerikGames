
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

/* Auth routes */
Auth::routes();

// Admin resources

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::resource('settings', 'AdminSettingController');
    Route::resource('themes', 'AdminThemeController');
    Route::resource('themes.proses', 'AdminProseController');
    Route::resource('themes.proses.verses', 'AdminVerseController');
    Route::get('proses', 'AdminProseController@all')->name('proses');
    Route::post('proses/reset', 'AdminProseController@reset')->name('proses.reset');
});

//Routes for standard user

Route::get('/', 'WelcomeController@index')->name('home');
Route::get('/choix', 'ThemeController@index')->name('choice');
Route::get('/projectors', 'ProseController@projector')->name('projectors.index');
Route::get('/projectors/2', 'ProseController@projector')->name('projectors.index2');
Route::resource('verses', 'VerseController', ['only' => ['create','index','store']]);
Route::resource('themes', 'ThemeController', ['only' => ['show']]);
Route::resource('proses', 'ProseController');
Route::post('/ajaxRequestPostVerse', 'VerseController@ajaxRequestPost');
