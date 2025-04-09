<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function home()
    {
        $tatCaSanPham = DB::table("san_pham")->where("Xoa", 0)->where("TrangThai", "hien")->orderByDesc("id")->limit(12)->get();
        $sanPhamMoiNhat = DB::table("san_pham")->where("Xoa", 0)->orderByDesc("id")->where("TrangThai", "hien")->orderByDesc("id")->limit(12)->get();
        $sanPhamBanChay = DB::table("san_pham")
            ->orderByDesc("id")
            ->where("Xoa", 0)
            ->where("TrangThai", "hien")
            ->limit(12)
            ->get();
        $tongSanPhamBanChay = DB::table("san_pham")
            ->join("san_pham_don_hang", "san_pham.id", "=", "san_pham_don_hang.Id_SanPham")
            ->orderByDesc("id")
            ->select("san_pham_bien_the.*")
            ->where("Xoa", 0)
            ->where("TrangThai", "hien")
            ->count();

        $sanPhamSapHetHang = DB::table("san_pham")
            ->where("Xoa", 0)
            ->where("TrangThai", "hien")
            ->limit(12)
            ->get();
        $demHetHangBienThe = DB::table("san_pham")
            ->join("bien_the_san_pham", "san_pham.id", "=", "bien_the_san_pham.ID_SanPham")
            ->where("san_pham.Xoa", 0)
            ->where("san_pham.TheLoai", "bienThe")
            ->where("san_pham.TrangThai", "hien")
            ->where("bien_the_san_pham.SoLuong", "<", 6)
            ->selectRaw("SUM(bien_the_san_pham.SoLuong) as SoLuongSP")
            ->first();
        $demHetHangThuong = DB::table("san_pham")
            ->where("san_pham.Xoa", 0)
            ->where("san_pham.TheLoai", "thuong")
            ->where("san_pham.TrangThai", "hien")
            ->where("san_pham.SoLuong", "<", 6)
            ->selectRaw("SUM(san_pham.SoLuong) as SoLuongSP")
            ->first();
        $tongSanPhamHetHang = intval($demHetHangBienThe->SoLuongSP) + intval($demHetHangThuong->SoLuongSP);

        $tatCaBaiViet = DB::table("bai_viet")
            ->where("Xoa", 0)
            ->orderByDesc("id")
            ->limit(12)
            ->paginate(2);

        $tatCaBanner = DB::table("banner")->where("Xoa", 0)->where("TrangThai", "hien")->orderByDesc("id")->get();
        return view('clients.TrangChu', compact("tatCaSanPham", "tongSanPhamBanChay", "tongSanPhamHetHang", "sanPhamBanChay", "tatCaBaiViet", "tatCaBanner", "sanPhamMoiNhat", "sanPhamSapHetHang"));
    }
}
