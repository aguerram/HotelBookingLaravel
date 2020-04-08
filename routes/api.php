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

Route::middleware('auth:api')->group(function(){
    Route::post("/hotel/vote/{hotel}","ReviewController@vote");
});

Route::get("/hotel","HotelController@all");
Route::get("/hotel/{hotel}","HotelController@show");
Route::get("/hotel/search/{search}","HotelController@search");


Route::post("/login","AuthController@login");
Route::post("/signup","AuthController@signup");
