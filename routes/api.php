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

Route::get('authors', 'AuthorController@index');
Route::get('authors/{author}', 'AuthorController@show');
Route::post('authors', 'AuthorController@store');
Route::put('authors/{author}', 'AuthorController@update');
Route::delete('authors/{author}', 'AuthorController@delete');

Route::get('books', 'BookController@index');
Route::get('books/{book}', 'BookController@show');
Route::post('books', 'BookController@store');
Route::put('books/{book}', 'BookController@update');
Route::delete('books/{book}', 'BookController@delete');

Route::get('publishing_houses', 'PublishingHouseController@index');
Route::get('publishing_houses/{publishing_house}', 'PublishingHouseController@show');
Route::post('publishing_houses', 'PublishingHouseController@store');
Route::put('publishing_houses/{publishing_house}', 'PublishingHouseController@update');
Route::delete('publishing_houses/{publishing_house}', 'PublishingHouseController@delete');