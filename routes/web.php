<?php

use App\Http\Controllers\ProxyController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [ProxyController::class, 'index']);
Route::get('/test', [ProxyController::class, 'test']);
Route::post('/proxies/check', [ProxyController::class, 'test'])->name('proxies.check');
