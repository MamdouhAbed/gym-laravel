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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/playersdetails/{id}', 'PlayersController@viewPlayersDetails');
Route::get('/addplayers', 'PlayersController@addPlayersView')->middleware('auth');
Route::post('/addplayers', 'PlayersController@addPlayers')->middleware('auth');
Route::get('/updateplayers/{players}', 'PlayersController@updatePlayersView')->middleware('auth');
Route::post('/updateplayers/{players}', 'PlayersController@updatePlayers')->middleware('auth');
Route::get('/updatesettings', 'SettingsController@updateSettingsView')->middleware('auth');
Route::post('/updatesettings', 'SettingsController@updateSettings')->middleware('auth');

/* start get players ajax */
Route::get('/players', 'PlayersController@tablePlayers')->middleware('auth');
Route::get('/todayplayers', 'PlayersController@todayPlayers')->middleware('auth');
Route::get('/publishedplayers', 'PlayersController@publishedPlayers')->middleware('auth');
Route::get('/deletedplayers', 'PlayersController@deletedPlayers')->middleware('auth');
Route::get('/nopublishplayers', 'PlayersController@noPublishPlayers')->middleware('auth');
Route::get('/maleplayers', 'PlayersController@malePlayers')->middleware('auth');
Route::get('/femaleplayers', 'PlayersController@femalePlayers')->middleware('auth');
Route::get('/endregplayers', 'PlayersController@endregPlayers')->middleware('auth');
/* end get players ajax */

/* start action players ajax */
Route::post('players/store', 'PlayersController@store')->middleware('auth');
Route::get('players/delete/{id}', 'PlayersController@deletePlayers')->middleware('auth');
Route::get('players/{id}/edit', 'PlayersController@edit')->middleware('auth');
Route::get('players/stopPublish/{id}', 'PlayersController@stopPublishPlayers')->middleware('auth');
Route::get('players/rePublish/{id}', 'PlayersController@rePublishPlayers')->middleware('auth');
Route::get('players/recover/{id}', 'PlayersController@recoverPlayers')->middleware('auth');
Route::get('players/shiftDelete/{id}', 'PlayersController@shiftDeletePlayers')->middleware('auth');
/* end action players ajax */

//Route::post('players/reorder', 'PlayersController@reorder')->middleware('auth');


Route::get('getImages', 'PlayersController@archive')->middleware('auth');
Route::post('/delImagesArchive', 'PlayersController@deleteImgArchive')->middleware('auth');

Route::post('/delImagesPlayers', 'PlayersController@deleteImage')->middleware('auth');
Route::post('/delVidoesPlayers', 'PlayersController@deleteVideo')->middleware('auth');


