<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\homeController;
use App\Http\Controllers\admins\BannerController;
use App\Http\Controllers\admins\BaiVietController;
use App\Http\Controllers\admins\BienTheController;
use App\Http\Controllers\admins\DanhMucController;
use App\Http\Controllers\admins\SanPhamController;
use App\Http\Controllers\admins\ChatLieuController;
use App\Http\Controllers\admins\ThungRacController;
use App\Http\Controllers\admins\KhachHangController;
use App\Http\Controllers\admins\MaGiamGiaController;
use App\Http\Controllers\admins\ThuongHieuController;
use App\Http\Controllers\admins\MaGiamGiaMaController;
use App\Http\Controllers\admins\BienTheSanPhamController;
use App\Http\Controllers\admins\DanhMucBaiVietController;
use App\Http\Controllers\admins\ThongTinLienHeController;

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

#CLIENTS
Route::get('/', function () {
    return view('clients.TrangChu');
});
Route::get('/dang-nhap', function() {
    return view('clients.TaiKhoan.DangNhap');
});
Route::get('/dang-ky', function() {
    return view('clients.TaiKhoan.DangKy');
});
Route::get('/forgot-password', function() {
    return view('clients.TaiKhoan.QuenMatKhau');
});
Route::get('/gioi-thieu-cua-hang', function() {
    return view('clients.GioiThieu.GioiThieu');
});
Route::get('/danh-sach-bai-viet', function() {
    return view('clients.BaiViet.BaiViet');
});

#ADMINS
Route::get('admin/thongKe', [homeController::class, "index"])->name('home.index');
Route::get('admin/ThungRac', [ThungRacController::class, "index"]);
Route::get('admin/ThungRac/{id}/restore', [ThungRacController::class, "restore"]);
Route::resource('admin/KhachHang', KhachHangController::class );
Route::resource('admin/SanPham', SanPhamController::class);
Route::resource('admin/BaiViet', BaiVietController::class);
Route::resource('admin/DanhMucBaiViet', DanhMucBaiVietController::class);
Route::resource('admin/ChatLieu', ChatLieuController::class);
Route::resource('admin/ThuongHieu', ThuongHieuController::class);
Route::get('admin/ThungRac', [ThungRacController::class, "index"])->name('ThungRac.index');
Route::get('admin/ThungRac/{id}/restore', [ThungRacController::class, "restore"])->name('ThungRac.restore');
Route::get('admin/ThungRac/{id}/destroy-images', [ThungRacController::class, "destroy_images"])->name('HinhAnhSanPham.destroy');

Route::resource('admin/DanhMuc', DanhMucController::class);
Route::resource('admin/SanPham', SanPhamController::class);
Route::resource("admin/BienTheSanPham", BienTheSanPhamController::class);
Route::resource('admin/BaiViet', BaiVietController::class);
Route::resource('admin/DanhMucBaiViet', DanhMucBaiVietController::class);
Route::resource('admin/ChatLieu', ChatLieuController::class);
Route::resource('admin/ThuongHieu', ThuongHieuController::class);
Route::resource('admin/BienThe', BienTheController::class);
Route::resource('admin/BaiViet', BaiVietController::class);
Route::resource('admin/Banner', BannerController::class);

Route::prefix('admin/maGiamGia')->group(function () {

    Route::resource('maGiamGia', MaGiamGiaController::class)->names([
        'index' => 'maGiamGias.index',
        'create' => 'maGiamGias.create',
        'store' => 'maGiamGias.store',
        'edit' => 'maGiamGias.edit',
        'update' => 'maGiamGias.update',
        'destroy' => 'maGiamGias.destroy',
    ]);
});
Route::resource('admin/DanhMucBaiViet', DanhMucBaiVietController::class);
Route::resource('admin/ChatLieu', ChatLieuController::class);
Route::resource('admin/ThuongHieu', ThuongHieuController::class);
Route::resource('admin/ThongTinLienHe', ThongTinLienHeController::class);
