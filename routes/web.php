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
use App\Http\Controllers\admins\BienTheSanPhamController;
use App\Http\Controllers\admins\DanhMucBaiVietController;
use App\Http\Controllers\admins\ThongTinLienHeController;
use App\Http\Controllers\clients\GioHangController;
use App\Http\Controllers\clients\homeController as ClientsHomeController;

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
Route::get('/', [ClientsHomeController::class, "home"]);
Route::resource('data-gio-hang', GioHangController::class);






Route::get('dang-nhap', function() {
    return view('clients.XacThuc.DangNhap');
});
Route::get('dang-ky', function() {
    return view('clients.XacThuc.DangKy');
});
Route::get('forgot-password', function() {
    return view('clients.XacThuc.QuenMatKhau');
});
Route::get('gioi-thieu-cua-hang', function() {
    return view('clients.GioiThieu.GioiThieu');
});
Route::get('danh-sach-bai-viet', function() {
    return view('clients.BaiViet.BaiViet');
});
Route::get('thong-tin-tai-khoan', function() {
    return view('clients.ThongTinTaiKhoan.ThongTinTaiKhoan');
});
Route::get('/tai-khoan-cua-toi', function() {
    return view('clients.ThongTinTaiKhoan.TaiKhoanCuaToi');
});
Route::get('/doi-mat-khau', function() {
    return view('clients.ThongTinTaiKhoan.DoiMatKhau');
});
Route::get('/so-dia-chi', function() {
    return view('clients.ThongTinTaiKhoan.DiaChi');
});
Route::get('/lich-su-don-hang', function() {
    return view('clients.ThongTinTaiKhoan.LichSuDonHang');
});
Route::get('/danh-gia-va-nhan-xet', function() {
    return view('clients.ThongTinTaiKhoan.DanhGia');
});
Route::get('/yeu-cau-tra-hang', function() {
    return view('clients.ThongTinTaiKhoan.YeuCauTraHang');
});
Route::get('/lien-he', function() {
    return view('clients.LienHe.LienHe');
});
Route::get('/faq', function() {
    return view('clients.Faq.Faq');
});
Route::get('/san-pham-yeu-thich', function() {
    return view('clients.SanPhamYeuThich.SanPhamYeuThich');
});
Route::get('/gio-hang', function() {
    return view('clients.GioHang.GioHang');
});
Route::get('/quan-ao-nam', function() {
    return view('clients.QuanAoNam.QuanAoNam');
});
Route::get('/quan-ao-nu', function() {
    return view('clients.QuanAoNu.QuanAoNu');
});
Route::get('/san-pham', function() {
    return view('clients.SanPham.SanPham');
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
