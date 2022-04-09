<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// General Place
Route::post('/place/type/add', "PlaceController@addPlaceType");
Route::post('/place/type/edit', "PlaceController@editPlaceType");
Route::delete('/place/type/delete', "PlaceController@deletePlaceType");
Route::get('/place/type/get-all', "PlaceController@getPlaceTypes");
Route::get('/place/type/get-by-id', "PlaceController@getPlaceTypeById");

Route::post('/place/add', "PlaceController@addPlace");
Route::post('/place/edit', "PlaceController@editPlace");
Route::delete('/place/delete', "PlaceController@deletePlace");
Route::get('/place/get-all', "PlaceController@getPlaces");
Route::get('/place/get-by-id', "PlaceController@getPlaceById");

// Hotel
Route::get('/place/get-hotels', "PlaceController@getHotels");

// Destinastion
Route::get('/place/get-destinations', "PlaceController@getDestinations");
Route::get('/place/get-destination-types', "PlaceController@getDestinationTypes");