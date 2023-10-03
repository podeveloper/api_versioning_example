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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 10 requests per minute for Guests | 60 per minute for Authenticated User
Route::group(['middleware' => 'throttle:10|60'], function (){
    Route::apiResource('/products', \App\Http\Controllers\Api\V2\ProductController::class);
});
