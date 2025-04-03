<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function home()
    {
        $tatCaSanPham = DB::table("san_pham")->where("Xoa", 0)->where(
            "TrangThai",
            "hien"
        )->orderByDesc("id")->limit(8)->get();
        $sanPhamMoiNhat = DB::table("san_pham")->where("Xoa", 0)->orderByDesc("id")->where("TrangThai", "hien")->orderByDesc("id")->limit(8)->get();
        $sanPhamBanChay = DB::table("san_pham")
            ->orderByDesc("id")
            ->limit(8)
            ->get();
        $sanPhamSapHetHang = DB::table("san_pham")
            ->select("san_pham.*", DB::raw("SUM(bien_the_san_pham.SoLuong) as tong_ton_kho"))
            ->join("bien_the_san_pham", "san_pham.id", "=", "bien_the_san_pham.ID_SanPham")
            ->where("san_pham.Xoa", 0)
            ->where("TrangThai", "hien")
            ->groupBy("san_pham.id")
            ->having("tong_ton_kho", "<=", 10)
            ->orderBy("tong_ton_kho", "asc")
            ->limit(8)
            ->get();

        $tatCaBaiViet = DB::table("bai_viet")
            ->where("Xoa", 0)
            ->orderByDesc("id")
            ->limit(8)
            ->paginate(2);
        $tatCaBanner = DB::table("banner")->where("Xoa", 0)->where("TrangThai", "hien")->orderByDesc("id")->get();
        return view('clients.TrangChu', compact("tatCaSanPham", "sanPhamBanChay", "tatCaBaiViet", "tatCaBanner", "sanPhamMoiNhat", "sanPhamSapHetHang"));
    }
}
