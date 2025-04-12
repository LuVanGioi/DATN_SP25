<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cookie;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $userId = Auth::user()->ID_Guests ?? Auth::user()->id;
            } else {
                $userId = request()->cookie('ID_Guests', Str::uuid());
                Cookie::queue('ID_Guests', $userId, 60 * 24 * 365);
            }


            $danhMucSanPham = DB::table("danh_muc_san_pham")->where("Xoa", 0)->orderByDesc("id")->limit(5)->get();
            $danhSachLienHe = DB::table("thong_tin_lien_he")->where("Xoa", 0)->get();
            $caiDatWebsite = DB::table("cai_dat_website")->where("id", 1)->first();
            $lienKetWebsiteClient = DB::table("lien_ket_ket_website")->where("Xoa", 0)->get();
            $danhSachLienheClient = DB::table("thong_tin_lien_he")->where("Xoa", 0)->get();
            $danhSachSanPham = DB::table("san_pham")->where("Xoa", 0)->where("TrangThai", "hien")->limit(10)->get();
            $gioHangClient = DB::table("cart")
                ->join("bien_the_san_pham", function ($join) {
                    $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                        ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                        ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
                })
                ->selectRaw("bien_the_san_pham.SoLuong as soLuongBienThe")
                ->whereIn("ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])->get();

            $danhSachTinhThanh = DB::table("tinh_thanh")->get();
            $danhSachHuyen = DB::table("huyen")->select("ID_TinhThanh", "TenHuyen", "MaHuyen")->get();
            $layGiaTienSanPham = DB::table("cart")
                ->join("san_pham", function ($join) {
                    $join->on("cart.ID_SanPham", "=", "san_pham.id")
                        ->where("san_pham.TheLoai", "=", "bienThe")
                        ->where("san_pham.Xoa", "=", 0)
                        ->where("TrangThai", "hien");
                })
                ->join("bien_the_san_pham", function ($join) {
                    $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                        ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                        ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
                })
                ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
                ->selectRaw("COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong) as soLuongSP, SUM(cart.SoLuong * bien_the_san_pham.Gia) as tongTien")
                ->first();
            $soLuongGioHangBienThe = $layGiaTienSanPham->soLuongGioHangClient;

            $danhSachGioHangThuong = DB::table("cart")
                ->join("san_pham", function ($join) {
                    $join->on("cart.ID_SanPham", "=", "san_pham.id")
                        ->where("san_pham.TheLoai", "=", "thuong")
                        ->where("san_pham.Xoa", "=", 0)
                        ->where("TrangThai", "hien");
                })
                ->where("KichCo", "=", null)
                ->where("MauSac", "=", null)
                ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
                ->select("cart.SoLuong as soLuongGioHang")
                ->selectRaw("cart.id as cart_id, cart.*, san_pham.*, cart.SoLuong * san_pham.GiaSanPham as ThanhTien")
                ->get();

            $layGiaTienSanPhamThuong = DB::table("cart")
                ->join("san_pham", function ($join) {
                    $join->on("cart.ID_SanPham", "=", "san_pham.id")
                        ->where("san_pham.TheLoai", "=", "thuong")
                        ->where("san_pham.Xoa", "=", 0)
                        ->where("TrangThai", "hien");
                })
                ->where("KichCo", "=", null)
                ->where("MauSac", "=", null)
                ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
                ->selectRaw("COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong) as soLuongSP, SUM(cart.SoLuong * san_pham.GiaSanPham) as tongTien")
                ->first();

            $soLuongGioHangClient = $soLuongGioHangBienThe + $layGiaTienSanPhamThuong->soLuongGioHangClient;

            $soLuongSPGioHangClient = $layGiaTienSanPham->soLuongSP + $layGiaTienSanPhamThuong->soLuongSP ?? 0;
            $tongTienSanPhamGioHangClient = $layGiaTienSanPham->tongTien + $layGiaTienSanPhamThuong->tongTien ?? 0;

            $danhSachGioHangClient = DB::table("cart")
                ->join("san_pham", function ($join) {
                    $join->on("cart.ID_SanPham", "=", "san_pham.id")
                        ->where("san_pham.TheLoai", "=", "bienThe")
                        ->where("san_pham.Xoa", "=", 0)
                        ->where("TrangThai", "hien");
                })
                ->join("bien_the_san_pham", function ($join) {
                    $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                        ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                        ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
                })
                ->join("kich_co", "cart.KichCo", "=", "kich_co.TenKichCo")
                ->join("mau_sac", "cart.MauSac", "=", "mau_sac.id")
                ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
                ->select("bien_the_san_pham.SoLuong as soLuongBienThe", "cart.SoLuong as soLuongGioHang", "cart.SoLuong as SoLuong")
                ->selectRaw("cart.id as cart_id, cart.*, san_pham.*, kich_co.*, mau_sac.*, cart.SoLuong * bien_the_san_pham.Gia as ThanhTien, bien_the_san_pham.Gia as GiaSanPhamBienThe")
                ->get();


            $danhSachGioHangClient2 = DB::table("cart")
                ->join("san_pham", function ($join) {
                    $join->on("cart.ID_SanPham", "=", "san_pham.id")
                        ->where("san_pham.TheLoai", "=", "thuong")
                        ->where("san_pham.Xoa", "=", 0)
                        ->where("TrangThai", "hien");
                })
                ->where("cart.KichCo", "=", null)
                ->where("cart.MauSac", "=", null)
                ->where("cart.ID_KhachHang", $userId)
                ->select("cart.SoLuong as SoLuongGioHang")
                ->selectRaw("cart.id as cart_id, cart.*, san_pham.*, cart.SoLuong * san_pham.GiaSanPham as ThanhTien")
                ->get();
            $tien_ich_zalo = DB::table("tien_ich_website")->where("Loai", "support_zalo")->first();
            $tien_ich_email_fb = DB::table("tien_ich_website")->where("Loai", "support_zalo_2")->first();
            $tien_ich_phone = DB::table("tien_ich_website")->where("Loai", "support_phone")->first();
            $tien_ich_live_chat = DB::table("tien_ich_website")->where("Loai", "live_chat")->first();
            $dich_vu_san_pham = DB::table("dich_vu_san_pham")->where("Xoa", 0)->get();

            $view->with('dich_vu_san_pham', $dich_vu_san_pham);
            $view->with('tien_ich_zalo', $tien_ich_zalo);
            $view->with('tien_ich_email_fb', $tien_ich_email_fb);
            $view->with('tien_ich_phone', $tien_ich_phone);
            $view->with('tien_ich_live_chat', $tien_ich_live_chat);
            $view->with('danhMucSanPham', $danhMucSanPham);
            $view->with('danhSachLienHe', $danhSachLienHe);
            $view->with('caiDatWebsite', $caiDatWebsite);
            $view->with('lienKetWebsiteClient', $lienKetWebsiteClient);
            $view->with('danhSachLienheClient', $danhSachLienheClient);
            $view->with("danhSachSanPham", $danhSachSanPham);
            $view->with("gioHangClient", $gioHangClient);
            $view->with("soLuongGioHangClient", $soLuongGioHangClient);
            $view->with("soLuongSPGioHangClient", $soLuongSPGioHangClient);
            $view->with("tongTienSanPhamGioHangClient", $tongTienSanPhamGioHangClient);
            $view->with("danhSachGioHangClient", $danhSachGioHangClient);
            $view->with("danhSachGioHangClient2", $danhSachGioHangClient2);
            $view->with("danhSachTinhThanh", $danhSachTinhThanh);
            $view->with("danhSachHuyen", $danhSachHuyen);
            $view->with("danhSachGioHangThuong", $danhSachGioHangThuong);
            $view->with("layGiaTienSanPhamThuong", $layGiaTienSanPhamThuong);
        });
    }
}
