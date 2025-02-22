<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\homeController;
use App\Http\Controllers\admins\DanhMucController;
use App\Http\Controllers\admins\SanPhamController;
use App\Http\Controllers\admins\BaiVietController;
use App\Http\Controllers\admins\BienTheController;
use App\Http\Controllers\admins\CouponController;
use App\Http\Controllers\admins\ChatLieuController;
use App\Http\Controllers\admins\ThungRacController;
use App\Http\Controllers\admins\ThanhVienController;
use App\Http\Controllers\admins\ThuongHieuController;
use App\Http\Controllers\admins\GiaTriBienTheController;
use App\Http\Controllers\admins\DanhMucBaiVietController;

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
Route::get('admin/thongKe', [homeController::class, "index"])->name('home.index');
Route::get('admin/ThungRac', [ThungRacController::class, "index"]);
Route::get('admin/ThungRac/{id}/restore', [ThungRacController::class, "restore"]);
Route::resource('admin/DanhMuc', DanhMucController::class);
Route::resource('admin/SanPham', SanPhamController::class);
Route::resource('admin/ThanhVien', ThanhVienController::class );
Route::resource('admin/BaiViet', BaiVietController::class);
Route::resource('admin/DanhMucBaiViet', DanhMucBaiVietController::class);
Route::resource('admin/ChatLieu', ChatLieuController::class);
Route::resource('admin/ThuongHieu', ThuongHieuController::class);
Route::resource('admin/BienThe', BienTheController::class);
Route::post('admin/GiaTriBienThe', [GiaTriBienTheController::class, "createValue"])->name('GiaTriBienThe.index');
Route::get('admin/GiaTriBienThe/{id}/destroy', [GiaTriBienTheController::class, "destroy"])->name('GiaTriBienThe.destroy');


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

Route::resource('/admin/DanhMucBaiViet', DanhMucBaiVietController::class);
Route::resource('/admin/ChatLieu', ChatLieuController::class);
Route::resource('/admin/ThuongHieu', ThuongHieuController::class);

