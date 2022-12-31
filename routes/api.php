<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CouponController;

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


Route::get('/coupons',[CouponController::class,'indexapi']);
Route::get('/coupons/{coupon}',[CouponController::class,'showapi']);

Route::get('/brands',[BrandController::class,'indexapi']);
Route::get('/brands/{brand}',[BrandController::class,'showapi']);

// Route::get('/coupon',[CouponController::class,'indexapi']);

// Route::get('/coupon/brand/{brand}',[CouponController::class,'showapi']);



