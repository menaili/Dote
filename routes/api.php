<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FreindController;

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
Route::get('/Profile', [DoController::class,'index']);

Route::post('/get-token', [Controller::class,'login']);

Route::resource('/Applications', ApplicationController::class);

Route::resource('/Freinds', FreindController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
