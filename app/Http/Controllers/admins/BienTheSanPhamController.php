<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BienTheSanPhamController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        DB::beginTransaction();

        $thongTin = DB::table("bien_the_san_pham")->find($id);

        if (!$thongTin) {
            return redirect()->route("SanPham.edit", $thongTin->ID_SanPham)->with("error", "Biến Thể Sản Phẩm Không Tồn Tại Hoặc Đã Được Xóa");
        }

        DB::table("bien_the_san_pham")->where("id", $id)->update([
            "Gia" => $request->input("Gia"),
            "SoLuong" => $request->input("SoLuong"),
            "Xoa" => $request->input("Xoa"),
            "deleted_at" => ($request->input("Xoa") == "1" ? date("Y/m/d H:i:s") : $thongTin->deleted_at),
            "updated_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("SanPham.edit", $thongTin->ID_SanPham)->with("success", "Cập Nhật Biến Thể Sản Phẩm Thành Công!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thongTin = DB::table("bien_the_san_pham")->find($id);

        if (!$thongTin) {
            return redirect()->route("SanPham.edit", $thongTin->ID_SanPham)->with("error", "Biến Thể Sản Phẩm Không Tồn Tại Hoặc Đã Được Xóa");
        }

        DB::table("bien_the_san_pham")->where("id", $id)->update([
            "Xoa" => 1,
            "deleted_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("SanPham.edit", $thongTin->ID_SanPham)->with("success", "Xóa Biến Thể Thành Công!");
    }
}
