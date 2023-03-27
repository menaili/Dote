<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FreindController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WorkController;
use App\Models\Invitation;

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

Route::get('/test', [DoController::class,'test']);


Route::get('/testing', function() {
    return response()->json([
     'stuff' => extension_loaded('pdo_mysql')
    ]);
 });

// Route::post('/get-token', [Controller::class,'login']);

    Route::resource('/Applications', ApplicationController::class);
  
    Route::resource('/Freinds', FreindController::class);

    Route::get('/userProfile', [DoController::class,'index']);

    Route::resource('/Profile', ProfileController::class)->middleware('auth:sanctum');
    Route::resource('/Links', LinkController::class)->middleware('auth:sanctum');
    Route::resource('/CV', CurriculumController::class)->middleware('auth:sanctum');
    Route::resource('/Education', EducationController::class)->middleware('auth:sanctum');
    Route::resource('/Work', WorkController::class)->middleware('auth:sanctum');
    Route::resource('/Skill', SkillController::class)->middleware('auth:sanctum');
    Route::resource('/Language', LanguageController::class)->middleware('auth:sanctum');
    Route::resource('/Contact', ContactController::class)->middleware('auth:sanctum');
    Route::resource('/Invitation', InvitationController::class)->middleware('auth:sanctum');


// Route::group([
//     'prefixe'   => 'auth'
// ], function(){

// });

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
