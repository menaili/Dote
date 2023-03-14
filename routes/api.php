<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FreindController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;

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
Route::get('/ProfileST', [DoController::class,'index']);

// Route::post('/get-token', [Controller::class,'login']);

    Route::resource('/Applications', ApplicationController::class);
  
    Route::resource('/Freinds', FreindController::class);


    Route::resource('/Profile', ProfileController::class)->middleware('auth:sanctum');
    Route::resource('/Links', LinkController::class)->middleware('auth:sanctum');

// Route::group([
//     'prefixe'   => 'auth'
// ], function(){

// });

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
