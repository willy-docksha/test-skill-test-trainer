<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\BookingController;
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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
Route::get('check-avaiable-room', [BookingController::class, 'check_avaiable_room']);
Route::post('book-now', [BookingController::class, 'book_now']);
Route::post('check-in', [BookingController::class, 'check_in']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
