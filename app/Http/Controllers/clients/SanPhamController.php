<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $thongTinSanPham = DB::table("san_pham")->where("DuongDan", $id)->where("Xoa", 0)->first();
        if (!$thongTinSanPham) {
            return back()->with("error", "Sản Phẩm Không Tồn Tại!");
        }

        $thuongHieu = DB::table("thuong_hieu")->where("id", $thongTinSanPham->ID_ThuongHieu)->where("Xoa", 0)->first();
        $danhMuc = DB::table("danh_muc_san_pham")->where("id", $thongTinSanPham->ID_DanhMuc)->where("Xoa", 0)->first();
        $allThuongHieu = DB::table("thuong_hieu")->where("Xoa", 0)->get();
        $khoAnhSanPham = DB::table("hinh_anh_san_pham")->where("ID_SanPham", $thongTinSanPham->id)->where("Xoa", 0)->get();
        $bienTheSanPham2 = DB::table("bien_the_san_pham")
            ->join("mau_sac", "bien_the_san_pham.ID_MauSac", "=", "mau_sac.id")
            ->where("bien_the_san_pham.ID_SanPham", $thongTinSanPham->id)
            ->where("bien_the_san_pham.Xoa", 0)
            ->select("bien_the_san_pham.ID_MauSac", "mau_sac.TenMauSac", "bien_the_san_pham.KichCo", "bien_the_san_pham.SoLuong", "bien_the_san_pham.Gia", "bien_the_san_pham.HinhAnh")
            ->distinct()
            ->get();
// làm thêm bộ sưu tập ảnh sản phẩm

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

        return view("clients.SanPham.ChiTietSanPham", compact("thongTinSanPham", "thuongHieu", "khoAnhSanPham", "danhMuc", "allThuongHieu", "bienTheSanPham", "mauSacBienThe", "bienTheSanPham2"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
