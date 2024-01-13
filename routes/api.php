<?php

use App\Http\Controllers\UrlController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user/{user_id}/urls', [UrlController::class, 'index']);
Route::post('urls', [UrlController::class, 'store']);
Route::delete('urls/{url}', [UrlController::class, 'destroy']);
Route::put('urls/{url}', [UrlController::class, 'update']);
