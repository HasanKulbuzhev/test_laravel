<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('catalog', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
Route::get('catalog/{brand}', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalogBrand');
Route::get('catalog/{brand}/{carModel}', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalogModel');
