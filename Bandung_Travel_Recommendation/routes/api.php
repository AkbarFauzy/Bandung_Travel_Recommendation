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

// Hotel
Route::get('/get-hotels', "PlaceController@getHotels");
Route::get('/get-top-hotels', "PlaceController@getTopHotels");

// Destinastion
Route::get('/get-destinations', "PlaceController@getDestinations");
Route::get('/get-top-destinations', "PlaceController@getTopDestinations");
Route::get('/get-destination-types', "PlaceController@getDestinationTypes");