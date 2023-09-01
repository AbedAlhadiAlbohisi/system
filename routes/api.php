<?php

use App\Http\Controllers\Auth\ApiAuthcontroller;
use App\Models\Admin;
use App\Models\city;
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


Route::prefix('auth')->group(function () {
    Route::post('login', [ApiAuthcontroller::class, 'login']);
    Route::post('login-PGCT', [ApiAuthController::class, 'loginPGCT']);
});


Route::prefix('auth')->middleware('auth:user-api')->group(function () {
    Route::get('logout', [ApiAuthcontroller::class, 'logout']);
});

// Route::get('test', function () {
//     return Admin::where('email', '=', 'mohammadalbohisi@gmail.com')->first();
// });
