<?php

use App\Models\Brand;
use App\Models\Coupon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProfileController;

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
    return redirect('login');
});

Route::get('/dashboard', function () {
    $coupons=Coupon::all();
    $brands=Brand::all();
    return view('dashboard', ['coupons'=>$coupons , 'brands'=>$brands]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //coupon routes
    Route::get('/add-coupon', [CouponController::class, 'create'])->name('add-coupon');
    Route::post('/new-coupon', [CouponController::class, 'store'])->name('new-coupon');
    Route::get('/edit-coupon/{coupon}/edit', [CouponController::class, 'edit'])->name('edit-coupon');
    Route::put('/update-coupon/{coupon}', [CouponController::class, 'update'])->name('update-coupon');
    Route::delete('/delete-coupon{coupon}', [CouponController::class, 'destroy'])->name('delete-coupon');
    Route::get('/all-coupon', [CouponController::class, 'index'])->name('all-coupons');


    //all-brand-coupons
    Route::get('/all-brand-coupons/{brand}', [CouponController::class, 'brand'])->name('all-brand-coupons');

    //brand routes
    Route::get('/add-brand', [BrandController::class, 'create'])->name('add-brand');
    Route::post('/new-brand', [BrandController::class, 'store'])->name('new-brand');
    Route::get('/edit-brand/{brand}/edit', [BrandController::class, 'edit'])->name('edit-brand');
    Route::put('/update-brand/{brand}', [BrandController::class, 'update'])->name('update-brand');
    Route::delete('/delete-brand/{brand}', [BrandController::class, 'destroy'])->name('delete-brand');
    Route::get('/all-brands', [BrandController::class, 'index'])->name('all-brands');


    //profile
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile');
});

require __DIR__.'/auth.php';
