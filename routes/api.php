<?php

use App\Http\Controllers\Apartment\ApartmentController;
use App\Http\Controllers\Furniture\FurnitureController;
use App\Http\Controllers\Room\RoomController;
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

Route::get('/furnitures', [FurnitureController::class, 'index']);
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{room}', [RoomController::class, 'show']);
Route::get('/apartments', [ApartmentController::class, 'index']);
Route::get('/apartments/{apartments}', [ApartmentController::class, 'show']);