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
            $danhSachSanPham = DB::table("san_pham")->where("Xoa", 0)->where("TrangThai", "hien")->get();
            $gioHangClient = DB::table("cart")->whereIn("ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])->get();
            $danhSachTinhThanh = DB::table("tinh_thanh")->get();
            $danhSachHuyen = DB::table("huyen")->select("ID_TinhThanh", "TenHuyen", "MaHuyen")->get();
            $layGiaTienSanPham = DB::table("cart")
                ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
                ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
                ->selectRaw("COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong * san_pham.GiaSanPham) as tongTien")
                ->first();
            $soLuongGioHangClient = $layGiaTienSanPham->soLuongGioHangClient;
            $tongTienSanPhamGioHangClient = $layGiaTienSanPham->tongTien ?? 0;

            $danhSachGioHangClient = DB::table("cart")
                ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
                ->join("kich_co", "cart.KichCo", "=", "kich_co.TenKichCo")
                ->join("mau_sac", "cart.MauSac", "=", "mau_sac.id")
                ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
                ->limit(5)
                ->selectRaw("cart.id as cart_id, cart.*, san_pham.*, kich_co.*, mau_sac.*, cart.SoLuong * san_pham.GiaSanPham as ThanhTien")
                ->get();

            

            $view->with('danhMucSanPham', $danhMucSanPham);
            $view->with('danhSachLienHe', $danhSachLienHe);
            $view->with('caiDatWebsite', $caiDatWebsite);
            $view->with('lienKetWebsiteClient', $lienKetWebsiteClient);
            $view->with('danhSachLienheClient', $danhSachLienheClient);
            $view->with("danhSachSanPham", $danhSachSanPham);
            $view->with("gioHangClient", $gioHangClient);
            $view->with("soLuongGioHangClient", $soLuongGioHangClient);
            $view->with("tongTienSanPhamGioHangClient", $tongTienSanPhamGioHangClient);
            $view->with("danhSachGioHangClient", $danhSachGioHangClient);
            $view->with("danhSachTinhThanh", $danhSachTinhThanh);
            $view->with("danhSachHuyen", $danhSachHuyen);
        });
    }
}
