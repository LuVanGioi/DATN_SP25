<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\homeController;
use App\Http\Controllers\admins\KhachHangController;
use App\Http\Controllers\admins\SanPhamController;
use App\Http\Controllers\TaiKhoanController;

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

Route::resource('/admin/KhachHang', KhachHangController::class );

