<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SanPhamController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $thongTinSanPham = DB::table("san_pham")->where("DuongDan", $id)->where("Xoa", 0)->where("TrangThai", "hien")->first();
        if (!$thongTinSanPham) {
            return back()->with("error", "Sản Phẩm Không Tồn Tại!");
        }

        $thuongHieu = DB::table("thuong_hieu")->where("id", $thongTinSanPham->ID_ThuongHieu)->where("Xoa", 0)->first();
        $danhMuc = DB::table("danh_muc_san_pham")->where("id", $thongTinSanPham->ID_DanhMuc)->where("Xoa", 0)->first();
        $allThuongHieu = DB::table("thuong_hieu")->where("Xoa", 0)->get();
        $khoAnhSanPham = DB::table("hinh_anh_san_pham")
            ->where("ID_SanPham", $thongTinSanPham->id)
            ->where("Xoa", 0)
            ->get();

        $khoAnhBienThe = DB::table("hinh_anh_san_pham")
            ->join("bien_the_san_pham", "hinh_anh_san_pham.ID_SanPham", "=", "bien_the_san_pham.id")
            ->where("bien_the_san_pham.ID_SanPham", $thongTinSanPham->id)
            ->where("bien_the_san_pham.Xoa", 0)
            ->get();

        $bienTheSanPham2 = DB::table("bien_the_san_pham")
            ->join("mau_sac", "bien_the_san_pham.ID_MauSac", "=", "mau_sac.id")
            ->where("bien_the_san_pham.ID_SanPham", $thongTinSanPham->id)
            ->where("bien_the_san_pham.Xoa", 0)
            ->select("bien_the_san_pham.id", "bien_the_san_pham.ID_MauSac", "mau_sac.TenMauSac", "bien_the_san_pham.KichCo", "bien_the_san_pham.SoLuong", "bien_the_san_pham.Gia")
            ->distinct()
            ->get();

        $soLuongBienTheSanPham = DB::table("bien_the_san_pham")
            ->where("ID_SanPham", $thongTinSanPham->id)
            ->count();

        $idMauSacList = $bienTheSanPham2->pluck("ID_MauSac")->unique();

        $mauSacBienThe = DB::table("mau_sac")
            ->whereIn("ID", $idMauSacList)
            ->where("Xoa", 0)
            ->get();

        $listKichCo = $bienTheSanPham2->pluck("KichCo")->unique();

        if ($listKichCo->count() === 1) {
            $bienTheSanPham = collect([$bienTheSanPham2->first()]);
        } else {
            $bienTheSanPham = $bienTheSanPham2->unique("KichCo")->values();
        }

        $tongSoLuongBienThe = DB::table("bien_the_san_pham")->where("ID_SanPham", $thongTinSanPham->id)
            ->selectRaw("SUM(SoLuong) as soLuongSanPhamBienTheAll")
            ->first();

        $avgRating = DB::table('danh_gia')
            ->where('id_san_pham', $thongTinSanPham->id)
            ->avg('rating');

        return view("clients.SanPham.ChiTietSanPham", compact("avgRating", "thongTinSanPham", "khoAnhBienThe", "thuongHieu", "khoAnhSanPham", "danhMuc", "allThuongHieu", "bienTheSanPham", "mauSacBienThe", "bienTheSanPham2", "tongSoLuongBienThe", "soLuongBienTheSanPham"));
    }
    public function timKiem(Request $request)
    {
        $tuKhoa = $request->input('q');
        $sanPhams = DB::table('san_pham')
            ->where(function ($query) use ($tuKhoa) {
                $tukhoaTu = explode(' ', $tuKhoa); // Tách thành mảng từ
                foreach ($tukhoaTu as $tu) {
                    $query->where('TenSanPham', 'like', '%' . $tu . '%');
                }
            })
            ->where('Xoa', 0)
            ->get();
        return view('clients.SanPham.TimKiem', compact('sanPhams', 'tuKhoa'));
    }
}
