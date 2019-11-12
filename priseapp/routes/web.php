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

Route::get('prises', 'PrisesController@show')->name('prises');

Route::post('prises',[
    'as' => 'prises.create',
    'uses' => 'PrisesController@store'
]);

Route::get('settings', 'SettingsController@show')->name('settings');

Route::post('settings',[
    'as' => 'settings.create',
    'uses' => 'SettingsController@store'
]);

Route::get('games', 'GamesController@show')->name('games');

Route::get('games/new', 'GamesController@new')->name('games.new');

Route::post('games/generate',[
    'as' => 'games.generate',
    'uses' => 'GamesController@generate'
]);

Route::post('games/save',[
    'as' => 'games.save',
    'uses' => 'GamesController@save'
]);

Route::post('games/convert',[
    'as' => 'games.convert',
    'uses' => 'GamesController@convert'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
