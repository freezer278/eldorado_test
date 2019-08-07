<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'songs', 'middleware' => ['auth', 'permission:manage_songs']], function () {
    Route::get('/', 'SongsController@index')->name('songs.index');
    Route::post('/', 'SongsController@create')->name('songs.create');
    Route::put('/{song}', 'SongsController@update')->name('songs.update');
    Route::delete('/{song}', 'SongsController@delete')->name('songs.delete');
});

Auth::routes();
