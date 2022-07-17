<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionsController;

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

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::middleware('auth:api')->get('/logout', [UserController::class, 'logout']);
Route::middleware('auth:api')->get('/user', [UserController::class, 'user']);

Route::middleware('auth:api')->prefix('questions')->group(function () {
    Route::post('/create', [QuestionsController::class, 'create']);
    Route::get('/', [QuestionsController::class, 'list']);
});


Route::middleware('auth:api')->prefix('file')->group(function () {
    Route::post('/upload', [FileController::class, 'uploadFile']);
});
