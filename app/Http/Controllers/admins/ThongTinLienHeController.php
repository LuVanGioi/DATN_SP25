<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\ThongTinLienHeRequest;

class ThongTinLienHeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhSach = DB::table("thong_tin_lien_he")->where("Xoa", 0)->orderByDesc("id")->get();
        return view("admins.ThongTinLienHe.DanhSach", compact("danhSach"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admins.ThongTinLienHe.TaoLienhe");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ThongTinLienHeRequest $request)
    {
        DB::beginTransaction();

        DB::table("thong_tin_lien_he")->insert([
            "DuongDan" => $request->input("DuongDan"),
            "TenPhuongThuc" => $request->input("TenPhuongThuc"),
            "created_at" => date("Y/m/d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("ThongTinLienHe.index")->with("success", "Thêm Phương Thức Thành Công!");
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
        $thongTin = DB::table("thong_tin_lien_he")->find($id);
        return view("admins.ThongTinLienHe.SuaLienhe", compact("thongTin"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ThongTinLienHeRequest $request, string $id)
    {
        DB::beginTransaction();
        $thongTin = DB::table("thong_tin_lien_he")->find($id);

        if(!$thongTin) {
            return redirect()->route("ThongTinLienHe.index")->with("error", "Thông Tin Phương Thức Không Hợp Lệ");
        }

        DB::table("thong_tin_lien_he")->where("id", $id)->update([
            "DuongDan" => $request->input("DuongDan"),
            "TenPhuongThuc" => $request->input("TenPhuongThuc"),
            "updated_at" => date("Y/m/d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("ThongTinLienHe.index")->with("success", "Cập Nhật Thông Tin Liên Hệ Thành Công!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        $thongTin = DB::table("thong_tin_lien_he")->find($id);

        if(!$thongTin) {
            return redirect()->route("ThongTinLienHe.index")->with("error", "Thông Tin Phương Thức Không Hợp Lệ");
        }

        DB::table("thong_tin_lien_he")->where("id", $id)->update([
            "Xoa" => 1,
            "deleted_at" => date("Y/m/d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("ThongTinLienHe.index")->with("success", "Xóa Thông Tin Liên Hệ Thành Công!");
    }
}
