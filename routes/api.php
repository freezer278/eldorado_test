<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'songs',], function () {
    Route::get('/', 'SongsController@index');
    Route::get('/{song}', 'SongsController@getSingle');
    Route::post('/', 'SongsController@create');
    Route::put('/{song}', 'SongsController@update');
    Route::delete('/{song}', 'SongsController@delete');
});
