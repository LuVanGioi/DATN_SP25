<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\DichVuSanPhamRequest;

class DichVuSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listDichVuSanPham = DB::table("dich_vu_san_pham")->where("Xoa", 0)->get();
        return view("admins.DichVuSanPham.DanhSach", compact("listDichVuSanPham"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admins.DichVuSanPham.TaoDichVu");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DichVuSanPhamRequest $request)
    {
        DB::beginTransaction();

        DB::table("dich_vu_san_pham")->insert([
            "TenDichVuSanPham" => $request->input("TenDichVuSanPham"),
            "created_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("DichVu.index")->with("success", "Thêm Dịch Vụ Thành Công!");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $thongTinDichVu = DB::table("dich_vu_san_pham")->where("Xoa", 0)->find($id);
        return view("admins.DichVuSanPham.SuaDichVu", compact("thongTinDichVu"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DichVuSanPhamRequest $request, string $id)
    {
        DB::beginTransaction();

        DB::table("dich_vu_san_pham")->where("id", $id)->update([
            "TenDichVuSanPham" => $request->input("TenDichVuSanPham"),
            "updated_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("DichVu.index")->with("success", "Chỉnh Sửa Dịch Vụ Thành Công!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thongTin = DB::table("dich_vu_san_pham")->find($id);

        if (!$thongTin) {
            return redirect()->route("DichVu.index")->with("error", "Dịch Vụ Không Tồn Tại");
        }

        DB::table("dich_vu_san_pham")->where("id", $id)->update([
            "Xoa" => 1,
            "deleted_at" => date("Y-m-d H:i:s")
        ]);

        DB::table("danh_muc_san_pham")->where("ID_DichVuSanPham", $id)->update([
            "Xoa" => 1,
            "deleted_at" => date("Y-m-d H:i:s")
        ]);

        DB::table("san_pham")->where("ID_DichVuSanPham", $id)->update([
            "Xoa" => 1,
            "deleted_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("DichVu.index")->with("success", "Xóa Dịch Vụ Thành Công");
    }
}
