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
Route::post('/place/add-place-type', "PlaceController@addPlaceType");
Route::post('/place/edit-place-type', "PlaceController@editPlaceType");
Route::delete('/place/delete-place-type', "PlaceController@deletePlaceType");
Route::get('/place/get-place-types', "PlaceController@getPlaceTypes");

Route::post('/place/add-place', "PlaceController@addPlace");
Route::post('/place/edit-place', "PlaceController@editPlace");
Route::delete('/place/delete-place', "PlaceController@deletePlace");
Route::get('/place/get-places', "PlaceController@getPlaces");

// Hotel
Route::get('/place/get-hotels', "PlaceController@getHotels");

// Destinastion
Route::get('/place/get-destinations', "PlaceController@getDestinations");
Route::get('/place/get-destination-types', "PlaceController@getDestinationTypes");