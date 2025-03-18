<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
            $danhMucSanPham = DB::table("danh_muc_san_pham")->where("Xoa", 0)->orderByDesc("id")->get();
            $danhSachLienHe = DB::table("thong_tin_lien_he")->where("Xoa", 0)->get();
            $caiDatWebsite = DB::table("cai_dat_website")->where("id", 1)->first();
            $lienKetWebsiteClient = DB::table("lien_ket_ket_website")->where("Xoa", 0)->get();
            $danhSachLienheClient = DB::table("thong_tin_lien_he")->where("Xoa", 0)->get();
            $view->with('danhMucSanPham', $danhMucSanPham);
            $view->with('danhSachLienHe', $danhSachLienHe);
            $view->with('caiDatWebsite', $caiDatWebsite);
            $view->with('lienKetWebsiteClient', $lienKetWebsiteClient);
            $view->with('danhSachLienheClient', $danhSachLienheClient);
        });
    }
}
