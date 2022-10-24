<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Question\QuestionController;
use App\Http\Middleware\SupportRoleMiddleware;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:api']], function () {
    Route::apiResource('question', QuestionController::class);
    Route::middleware([SupportRoleMiddleware::class])
        ->post('/question/{question}/answer', [QuestionController::class, 'answer'])
        ->name('question.answer');
});
