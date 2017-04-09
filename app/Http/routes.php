<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('/', 'TicTacToyController@index');
Route::get('/', 'TicTacToyController@index');

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::post('register_game', 'GameController@register');

//API Group
Route::group(['prefix' => 'api', 'middleware' => 'oauth'], function () {
    Route::post('check_winner', 'TicTacToyController@index');
});