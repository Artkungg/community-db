<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('hello',[\App\Http\Controllers\HelloController::class,'hello']);
Route::post('login',[\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('register',[\App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('forgot',[\App\Http\Controllers\Api\ForgotController::class,'forgot']);
Route::post('reset',[\App\Http\Controllers\Api\ForgotController::class,'reset']);
Route::get('user',[\App\Http\Controllers\Api\AuthController::class,'user'])->middleware('auth:api');

//Route::post('post',[\App\Http\Controllers\Api\PostController::class,'store'])->middleware('auth:api');
//Route::get('post/{id}',[\App\Http\Controllers\Api\PostController::class,'show'])->middleware('auth:api');

Route::apiResource('posts', \App\Http\Controllers\Api\PostController::class)->middleware('auth:api');

Route::post('store',[\App\Http\Controllers\Api\FileController::class,'store']);
