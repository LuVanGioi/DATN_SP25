<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\ThanhVienController;
use App\Http\Controllers\admins\homeController;
use App\Http\Controllers\admins\SanPhamController;
use App\Http\Controllers\admins\BaiVietController;
use App\Http\Controllers\admins\CouponController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});






#ADMIN
Route::get('admin/thongKe', [homeController::class, "index"]);

Route::resource('admin/sanPham', SanPhamController::class);
Route::resource('/admin/ThanhVien', ThanhVienController::class );
Route::resource('/admin/BaiViet', BaiVietController::class);

Route::prefix('admin/maGiamGia')->group(function () {
    Route::resource('/', CouponController::class)->names([
        'index' => 'coupons.index',
        'create' => 'coupons.create',
        'store' => 'coupons.store',
        'edit' => 'coupons.edit',
        'update' => 'coupons.update',
        'show' => 'coupons.show',
        'destroy' => 'coupons.destroy',
    ]);
});
