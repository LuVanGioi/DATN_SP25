<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RutTienViController extends Controller
{
    public function index()
    {
        $danhSach = DB::table("lich_su_giao_dich_vi")->where("TheLoai", "withdraw")->get();
        return view("admins.RutTienVi.index", compact("danhSach"));
    }

    public function show(string $id)
    {
        $danhSach = DB::table("lich_su_giao_dich_vi")->find($id);
        return view("admins.RutTienVi.show", compact("danhSach"));
    }


    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        DB::table("lich_su_giao_dich_vi")->where("id", $id)->update([
            "TrangThai" => $request->input("TrangThai"),
            "LiDoThatBai" => ($request->input("LiDoThatBai") ?? null),
        ]);

        DB::commit();

        return redirect()->route("RutTienVi.index")->with("success","Chỉnh Sửa Trạng Thái Thành Công!");
    }
}
