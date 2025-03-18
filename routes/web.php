<?php

use Illuminate\Support\Facades\DB;
use Monolog\Handler\SamplingHandler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admins\homeController;
use App\Http\Controllers\clients\BangTinController;
use App\Http\Controllers\admins\BannerController;
use App\Http\Controllers\admins\BaiVietController;
use App\Http\Controllers\admins\BienTheController;
use App\Http\Controllers\admins\DanhMucController;
use App\Http\Controllers\admins\SanPhamController;
use App\Http\Controllers\admins\ChatLieuController;
use App\Http\Controllers\admins\ThungRacController;
use App\Http\Controllers\clients\GioHangController;
use App\Http\Controllers\admins\KhachHangController;
use App\Http\Controllers\admins\MaGiamGiaController;
use App\Http\Controllers\admins\ThuongHieuController;
use App\Http\Controllers\admins\BienTheSanPhamController;
use App\Http\Controllers\admins\CaiDatWebsiteController;
use App\Http\Controllers\admins\DanhMucBaiVietController;
use App\Http\Controllers\admins\BinhLuanBaiVietController;
use App\Http\Controllers\admins\ThongTinLienHeController;
use App\Http\Controllers\clients\AuthController as ClientsAuthController;
use App\Http\Controllers\admins\DonHangController;
use App\Http\Controllers\admins\LienKetWebsiteController;
use App\Http\Controllers\clients\LienKetWebsiteController as ClientsLienKetWebsiteController;
use App\Http\Controllers\clients\homeController as ClientsHomeController;
use App\Http\Controllers\clients\SanPhamController as ClientsSanPhamController;
use App\Http\Controllers\clients\supportController as ClientSupportController;
use App\Http\Middleware\CheckRoleMiddleware;
use PhpParser\Node\Expr\FuncCall;

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
Route::get('/', [ClientsHomeController::class, "home"])->name("home.client");
Route::resource('gio-hang', GioHangController::class);
Route::resource('san-pham', ClientsSanPhamController::class);
Route::get('url/{code}', [ClientsLienKetWebsiteController::class, "index"]);

Route::get('dang-nhap', [ClientsAuthController::class, 'showFormLogin']);
Route::post('dang-nhap', [ClientsAuthController::class, 'login'])->name('login');
Route::get('dang-ky', [ClientsAuthController::class, 'showFormRegister']);
Route::post('dang-ky', [ClientsAuthController::class, 'register'])->name('register');
Route::post('dang-xuat', [ClientsAuthController::class, 'logout'])->name('logout');
Route::get('/admin', function () {
    return  view('/admin.KhachHang');
})->middleware('auth.admin');

Route::post('email-form', [ClientSupportController::class, 'email_event'])->name("emailForm");
Route::post('contact-form', [ClientSupportController::class, 'contact_form'])->name("contactForm");

Route::get('danh-sach-bai-viet', function () {
    return view('clients.BaiViet.Baiviet');
});
Route::get('thong-tin-tai-khoan', function () {
    return view('clients.ThongTinTaiKhoan.ThongTinTaiKhoan');
});
Route::get('/tai-khoan-cua-toi', function () {
    return view('clients.ThongTinTaiKhoan.TaiKhoanCuaToi');
});
Route::get('/doi-mat-khau', function () {
    return view('clients.ThongTinTaiKhoan.DoiMatKhau');
});
Route::get('/so-dia-chi', function () {
    return view('clients.ThongTinTaiKhoan.DiaChi');
});
Route::get('/lich-su-don-hang', function () {
    return view('clients.ThongTinTaiKhoan.LichSuDonHang');
});
Route::get('/danh-gia-va-nhan-xet', function () {
    return view('clients.ThongTinTaiKhoan.DanhGia');
});
Route::get('/yeu-cau-tra-hang', function () {
    return view('clients.ThongTinTaiKhoan.YeuCauTraHang');
});
Route::get('/lien-he', function () {
    return view('clients.LienHe.LienHe');
});
Route::get('/faq', function () {
    return view('clients.Faq.Faq');
});

Route::get('danh-sach-bai-viet', [BangTinController::class, 'index']);
Route::get('/news/{id}', [BangTinController::class, 'show'])->name('news.show');






#ADMINS
Route::middleware(['auth.admin'])->group(function () {
    Route::get('admin/thongKe', [homeController::class, "index"])->name('home.index');
    Route::get('admin/ThungRac', [ThungRacController::class, "index"]);
    Route::get('admin/ThungRac/{id}/restore', [ThungRacController::class, "restore"]);
    Route::resource('admin/KhachHang', KhachHangController::class);
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
    Route::resource('admin/BinhLuanBaiViet', BinhLuanBaiVietController::class);
    Route::resource('admin/ChatLieu', ChatLieuController::class);
    Route::resource('admin/ThuongHieu', ThuongHieuController::class);
    Route::resource('admin/BienThe', BienTheController::class);
    Route::resource('admin/BaiViet', BaiVietController::class);
    Route::resource('admin/Banner', BannerController::class);
    Route::resource('admin/DonHang', DonHangController::class);

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
    Route::resource('admin/CaiDatWebsite', CaiDatWebsiteController::class);
    Route::resource('admin/LienKetWebsite', LienKetWebsiteController::class);
});
