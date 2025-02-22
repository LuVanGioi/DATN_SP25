<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\homeController;
use App\Http\Controllers\admins\KhachHangController;
use App\Http\Controllers\admins\SanPhamController;
use App\Http\Controllers\admins\BaiVietController;
use App\Http\Controllers\admins\ChatLieuController;
use App\Http\Controllers\admins\DanhMucBaiVietController;
use App\Http\Controllers\admins\ThungRacController;
use App\Http\Controllers\admins\ThuongHieuController;

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
Route::get('admin/ThungRac', [ThungRacController::class, "index"]);
Route::get('admin/ThungRac/{id}/restore', [ThungRacController::class, "restore"]);
Route::resource('/admin/KhachHang', KhachHangController::class );
Route::resource('admin/SanPham', SanPhamController::class);
Route::resource('/admin/BaiViet', BaiVietController::class);
Route::resource('/admin/DanhMucBaiViet', DanhMucBaiVietController::class);
Route::resource('/admin/ChatLieu', ChatLieuController::class);
Route::resource('/admin/ThuongHieu', ThuongHieuController::class);
