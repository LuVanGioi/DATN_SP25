<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function home()
    {
        if (DB::table("cai_dat_giao_dien_website")->where("Loai", "quantity_product_home")->first()->GiaTri) {
            $limit = DB::table("cai_dat_giao_dien_website")->where("Loai", "quantity_product_home")->first()->GiaTri;
        } else {
            $limit = 12;
        }

        $giaTri = DB::table("cai_dat_giao_dien_website")
            ->where("Loai", "style_product_home")
            ->first()?->GiaTri;

        $queryAll = DB::table("san_pham")
            ->where("Xoa", 0)
            ->where("TrangThai", "hien");

        $queryNew = DB::table("san_pham")
            ->where("Xoa", 0)
            ->orderByDesc("id")
            ->where("TrangThai", "hien");

        $querySale = DB::table("san_pham")
            ->where("Xoa", 0)
            ->where("TrangThai", "hien");

        $queryOut = DB::table("san_pham")
            ->where("Xoa", 0)
            ->where("TrangThai", "hien");

        switch ($giaTri) {
            case 0:
                $queryAll = $queryAll->orderByDesc("id");
                $queryNew = $queryNew->orderByDesc("id");
                $querySale = $querySale->orderByDesc("id");
                $queryOut = $querySale->orderByDesc("id");
                break;
            case 1:
                $queryAll = $queryAll->orderByAsc("id");
                $queryNew = $queryNew->orderByAsc("id");
                $querySale = $querySale->orderByAsc("id");
                $queryOut = $querySale->orderByAsc("id");
                break;
            case 2:
                $queryAll = $queryAll->orderBy("GiaSanPham", "asc");
                $queryNew = $queryNew->orderBy("GiaSanPham", "asc");
                $querySale = $querySale->orderBy("GiaSanPham", "asc");
                $queryOut = $querySale->orderBy("GiaSanPham", "asc");
                break;
            case 3:
                $queryAll = $queryAll->orderBy("GiaSanPham", "desc");
                $queryNew = $queryNew->orderBy("GiaSanPham", "desc");
                $querySale = $querySale->orderBy("GiaSanPham", "desc");
                $queryOut = $querySale->orderBy("GiaSanPham", "desc");
                break;
        }

        $tatCaSanPham = $queryAll
            ->limit($limit)
            ->get();

        $sanPhamMoiNhat = $queryNew
            ->limit($limit)
            ->get();

        $sanPhamBanChay = $querySale
            ->limit($limit)
            ->get();

        $sanPhamSapHetHang = $queryOut
            ->limit($limit)
            ->get();

        $tongSanPhamBanChay = DB::table("san_pham")
            ->join("san_pham_don_hang", "san_pham.id", "=", "san_pham_don_hang.Id_SanPham")
            ->orderByDesc("id")
            ->select("san_pham_bien_the.*")
            ->where("Xoa", 0)
            ->where("TrangThai", "hien")
            ->count();

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
