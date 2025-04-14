<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\DanhMucSanPhamRequest;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhSach = DB::table("danh_muc_san_pham")->where("Xoa", 0)->orderByDesc("id")->get();
        return view("admins.DanhMuc.danhSach", compact("danhSach"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dichVu = DB::table("dich_vu_san_pham")->where("Xoa", 0)->get();
        return view("admins.DanhMuc.TaoDanhMuc", compact("dichVu"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DanhMucSanPhamRequest $request)
    {
        DB::beginTransaction();

        DB::table('danh_muc_san_pham')->insert([
            'ID_DichVuSanPham' => $request->input('ID_DichVuSanPham'),
            'TenDanhMucSanPham' => $request->input('TenDanhMucSanPham'),
            'created_at' => now(),
        ]);
        DB::commit();
        return redirect()->route('DanhMuc.index')->with('success', 'Thêm danh mục sản phẩm thành công');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $thongTin = DB::table("danh_muc_san_pham")->find($id);

        $dichVu = DB::table("dich_vu_san_pham")->where("Xoa", 0)->get();

        if (!$thongTin) {
            return redirect()->route("DanhMuc.index")->with("error", "Danh Mục Không Tồn Tại");
        }

        return view("admins.DanhMuc.suaDanhMuc", compact("thongTin", "dichVu"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DanhMucSanPhamRequest $request, string $id)
    {
        $thongTin = DB::table("danh_muc_san_pham")->find($id);

        if (!$thongTin) {
            return redirect()->route("DanhMuc.index")->with("error", "Danh Mục Không Tồn Tại");
        }

        DB::table(table: "danh_muc_san_pham")->where("id", $id)->update([
            "ID_DichVuSanPham" => $request->input("ID_DichVuSanPham"),
            "TenDanhMucSanPham" => $request->input("TenDanhMucSanPham"),
            "updated_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("DanhMuc.index")->with("success", "Cập Nhật Danh Mục Thành Công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thongTin = DB::table("danh_muc_san_pham")->find($id);

        if (!$thongTin) {
            return redirect()->route("DanhMuc.index")->with("error", "Danh Mục Không Tồn Tại");
        }

        DB::table("danh_muc_san_pham")->where("id", $id)->update([
            "Xoa" => 1,
            "deleted_at" => date("Y-m-d H:i:s")
        ]);

        DB::table("san_pham")->where("ID_DanhMuc", $thongTin->id)->update([
            "Xoa" => 1,
            "deleted_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("DanhMuc.index")->with("success", "Xóa Danh Mục Thành Công");
    }
}
