<?php

use App\Http\Controllers\clients\FAQClientController;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use Monolog\Handler\SamplingHandler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Controllers\admins\FAQController;
use App\Http\Controllers\Admins\homeController;
use App\Http\Controllers\apis\clientController;
use App\Http\Controllers\clients\payController;
use App\Http\Controllers\Methods\MomoController;
use App\Http\Controllers\Admins\BannerController;
use App\Http\Controllers\Methods\PayOSController;
use App\Http\Controllers\Methods\VnPayController;
use App\Http\Controllers\Admins\BaiVietController;
use App\Http\Controllers\Admins\BienTheController;
use App\Http\Controllers\Admins\DanhMucController;
use App\Http\Controllers\Admins\DonHangController;
use App\Http\Controllers\Admins\PhanHoiController;
use App\Http\Controllers\Admins\SanPhamController;
use App\Http\Controllers\Admins\BoSuuTapController;
use App\Http\Controllers\Admins\ChatLieuController;
use App\Http\Controllers\Admins\ThungRacController;
use App\Http\Controllers\clients\BangTinController;
use App\Http\Controllers\clients\GioHangController;
use App\Http\Controllers\Admins\KhachHangController;
use App\Http\Controllers\Admins\MaGiamGiaController;
use App\Http\Controllers\clients\LocationController;
use App\Http\Controllers\admins\ThuongHieuController;
use App\Http\Controllers\admins\QuanLyAdminController;
use App\Http\Controllers\clients\DoiMatKhauController;
use App\Http\Controllers\admins\CaiDatWebsiteController;
use App\Http\Controllers\admins\DichVuSanPhamController;
use App\Http\Controllers\admins\BienTheSanPhamController;
use App\Http\Controllers\admins\DanhMucBaiVietController;
use App\Http\Controllers\admins\HinhAnhBienTheController;
use App\Http\Controllers\admins\LienKetWebsiteController;
use App\Http\Controllers\admins\ThongTinLienHeController;
use App\Http\Controllers\clients\ChiTietHuyDonController;
use App\Http\Controllers\clients\LichSuDonHangController;
use App\Http\Controllers\admins\BinhLuanBaiVietController;
use App\Http\Controllers\admins\RutTienViController;
use App\Http\Controllers\clients\BaiVietChiTietController;
use App\Http\Controllers\clients\DanhMucSanPhamController;
use App\Http\Controllers\clients\DiaChiNhanHangController;
use App\Http\Controllers\clients\ForgotPasswordController;
use App\Http\Controllers\clients\ThongTinTaiKhoanController;
use App\Http\Controllers\clients\AuthController as ClientsAuthController;
use App\Http\Controllers\clients\homeController as ClientsHomeController;
use App\Http\Controllers\clients\supportController as ClientSupportController;
use App\Http\Controllers\clients\SanPhamController as ClientsSanPhamController;
use App\Http\Controllers\clients\DanhMucBaiVietController as ClientsDanhMucBaiVietController;
use App\Http\Controllers\clients\LienKetWebsiteController as ClientsLienKetWebsiteController;
use App\Http\Controllers\clients\ViController;

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

Broadcast::routes();

#CLIENTS
Route::get('/', [ClientsHomeController::class, "home"])->name("home.client");
Route::resource('gio-hang', GioHangController::class);
Route::resource('san-pham', ClientsSanPhamController::class);
Route::get('url/{code}', [ClientsLienKetWebsiteController::class, "index"])->name("client.url");
Route::get('dang-nhap', [ClientsAuthController::class, 'showFormLogin']);
Route::post('dang-nhap', [ClientsAuthController::class, 'login'])->name('login');
Route::get('dang-ky', [ClientsAuthController::class, 'showFormRegister']);
Route::post('dang-ky', [ClientsAuthController::class, 'register'])->name('register');
Route::post('dang-xuat', [ClientsAuthController::class, 'logout'])->name('logout');
Route::get('/admin', [homeController::class, 'index'])->name('home.index')->middleware('auth.admin');
Route::post('email-form', [ClientSupportController::class, 'email_event'])->name("emailForm");
Route::post('contact-form', [ClientSupportController::class, 'contact_form'])->name("contactForm");
Route::post('pay', [payController::class, 'checkDiscount'])->name("pay");
Route::get('payment/{code}', [payController::class, 'payment'])->name("payent");
Route::post('payment/{code}', [payController::class, 'payment_store'])->name("payment.store");
Route::get('payment/success/{trading}', [payController::class, 'payment_success'])->name("payment.success");
Route::get('payos/cancel', [PayOSController::class, 'cancel'])->name('payos.cancel');
Route::get('payos/callback', [PayOSController::class, 'callback'])->name('payos.callback');

Route::get('momo/callback', [MomoController::class, 'callback'])->name('momo.callback');
Route::post('momo/ipn', [MomoController::class, 'ipn'])->name('momo.ipn');

Route::get('vnpay-return', [VnPayController::class, 'paymentReturn'])->name('vnpay.return');

Route::resource('locations', LocationController::class);

Route::get('quen-mat-khau', [ForgotPasswordController::class, 'showFormForgotPassword'])->name('forgot-password');
Route::post('quen-mat-khau', [ForgotPasswordController::class, 'sendMailResetPassword'])->name('forgot-password-send');
Route::get('mat-khau-moi/{token}', [ForgotPasswordController::class, 'showFormResetPassword'])->name('reset-password');
Route::post('mat-khau-moi', [ForgotPasswordController::class, 'resetPassword'])->name('reset-password');

Route::resource('admin/binhluan', BinhLuanBaiVietController::class)->except(['create', 'store']);

Route::get('/baiviet/{id}', [BaiVietChiTietController::class, 'show'])->name('baiviet.show');

Route::get('chinh-sach-bao-hanh', function () {
    return view('clients.BaoHanh.BaoHanh');
});
Route::get('danh-sach-bai-viet', function () {
    return view('clients.BaiViet.BaiViet');
});

Route::get('/thong-tin-tai-khoan', [ClientsAuthController::class, 'getProfile'])
    ->middleware('auth')
    ->name('ThongTinTaiKhoan');

Route::post('/thong-tin-tai-khoan/update', [ClientsAuthController::class, 'updateProfile'])
    ->middleware('auth')
    ->name('update-profile');

Route::get('thong-tin-tai-khoan/edit/{id}', [ThongTinTaiKhoanController::class, 'edit'])->name('thong-tin-tai-khoan.edit');
Route::put('thong-tin-tai-khoan/update/{id}', [ThongTinTaiKhoanController::class, 'update'])->name('thong-tin-tai-khoan.update');
Route::get('vi', [ViController::class, "index"]);
Route::get('vi/nap-tien', [ViController::class, "NapTien"])->name("vi.NapTien");
Route::get('vi/rut-tien', [ViController::class, "RutTien"])->name("vi.RutTien");
Route::get('vi/lich-su-giao-dich', [ViController::class, "LichSu"])->name("vi.LichSu");
Route::post('api/create-qr', [ViController::class, "TaoQr"])->name("vi.TaoQr");
Route::post('api/withdraw', [ViController::class, "RutTienStore"])->name("vi.RutTienApi");
Route::get('vi/chi-tiet-giao-dich/{code}', [ViController::class, "ChiTietGiaoDich"]);

Route::get('doi-mat-khau', [DoiMatKhauController::class, 'index'])->name('doi-mat-khau');
Route::get('doi-mat-khau/edit/{id}', [DoiMatKhauController::class, 'edit'])->name('doi-mat-khau.edit');
Route::put('doi-mat-khau/update/{id}', [DoiMatKhauController::class, 'update'])->name('doi-mat-khau.update');

Route::prefix('dia-chi-nhan-hang')->group(function () {
    Route::get('/', [DiaChiNhanHangController::class, 'index'])->name('dia-chi-nhan-hang.index');
    Route::post('/', [DiaChiNhanHangController::class, 'store'])->name('dia-chi-nhan-hang.store');
    Route::put('/{id}', [DiaChiNhanHangController::class, 'update'])->name('dia-chi-nhan-hang.update');
    Route::delete('/{id}', [DiaChiNhanHangController::class, 'destroy'])->name('dia-chi-nhan-hang.destroy');
    Route::post('/set-default/{id}', [DiaChiNhanHangController::class, 'setDefault'])->name('dia-chi-nhan-hang.set-default');
});
Route::resource('lich-su-don-hang', LichSuDonHangController::class);
Route::resource('huy-don', ChiTietHuyDonController::class);
Route::get('danh-muc/{code}', [DanhMucSanPhamController::class, 'show'])->name('danh-muc.show');

Route::get('/danh-gia-va-nhan-xet', function () {
    return view('clients.ThongTinTaiKhoan.DanhGia');
});
Route::get('lien-he', function () {
    return view('clients.LienHe.LienHe');
})->name("contact");

Route::get('faq', [FAQClientController::class, 'index'])->name('faq');

Route::resource("danh-muc-bai-viet", ClientsDanhMucBaiVietController::class);
Route::get('danh-sach-bai-viet', [BangTinController::class, 'index'])->name("danhSachBaiViet.index");
Route::get('/bai-viet/{id}', [BaiVietChiTietController::class, 'show'])->name('baiviet.show');
Route::post("binhluan", [BaiVietChiTietController::class, ""])->name("binhluan.store");
Route::post("binhluan/reply", [BaiVietChiTietController::class, "reply"])->name("binhluan.reply");

#ADMINS
Route::middleware(['auth.admin'])->group(function () {
    Route::get('admin/thongKe', [homeController::class, "index"])->name('home.index');
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
    Route::resource("admin/BienTheSanPham", BienTheSanPhamController::class);
    Route::get("admin/XoaHinhAnhSanPham/{id}", [HinhAnhBienTheController::class, "destroyImage"])->name("BienTheSanPham.destroyImage");
    Route::resource('admin/BinhLuanBaiViet', BinhLuanBaiVietController::class);
    Route::resource('admin/BienThe', BienTheController::class);
    Route::resource('admin/Banner', BannerController::class);
    Route::resource('admin/DonHang', DonHangController::class);
    Route::resource('admin/DichVu', DichVuSanPhamController::class);
    Route::get('admin/profile', [QuanLyAdminController::class, 'show'])->name('admin.profile');
    Route::resource('admin/maGiamGias', MaGiamGiaController::class);
    Route::resource('admin/ThongTinLienHe', ThongTinLienHeController::class);
    Route::resource('admin/CaiDatWebsite', CaiDatWebsiteController::class);
    Route::resource('admin/LienKetWebsite', LienKetWebsiteController::class);
    Route::resource('admin/FAQ', FAQController::class);
    Route::resource('admin/RutTienVi', RutTienViController::class);
    Route::get('admin/thong-tin-ca-nhan/{id}', [QuanLyAdminController::class, 'show'])->name('admin.thongtin');
});
Route::post("api/client", [clientController::class, "get_all"])->name("api.client");
