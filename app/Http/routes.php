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

Route::get('/', 'HomeController@render');

Route::get('archive', 'FlogController@index');
Route::get('archive/{flog}', 'FlogController@show');

Route::resource('flogs', 'FlogController');

Route::group(['prefix' => 'api'], function() {
    Route::post('flogs/{flog}/vote', 'VoteController@store');
    Route::get('reset-pins', 'FlogController@resetpins');
});
