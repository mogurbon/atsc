<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtcsController;
use App\Http\Controllers\AirCraftController;

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
Route::get('/', [AtcsController::class, 'index']);
Route::post('savequeue/', [AtcsController::class,'savequeue']);
Route::get('/newaircraft',[AirCraftController::class,'newAircraft']);
Route::post('/aircraft',[AirCraftController::class,'store']);
Route::get('aircrafts',[AirCraftController::class,'getAirCrafts']);



