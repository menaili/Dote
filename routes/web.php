<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/get', [DoController::class,'allD']);
Route::get('/test', [DoController::class,'test']);
Route::get('/dd', [DoController::class,'downloadCSV']);
Route::get('/all', [DoController::class,'allData']);

Route::get('/', function () {
    return view('welcome');
});


