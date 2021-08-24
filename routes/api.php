<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Models\Watchlist;
use App\Http\Controllers\PlatformController;

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

Route::apiResource("/movie", MovieController::class); ///la ruta se va a llamar movies

Route::apiResource("/category", CategoryController::class);

Route::apiResource("/review", ReviewController::class);

Route::apiResource("/watchlist", Watchlist::class);

Route::apiResource("/user", UserController::class);
Route::apiResource("/platform", PlatformController::class);
