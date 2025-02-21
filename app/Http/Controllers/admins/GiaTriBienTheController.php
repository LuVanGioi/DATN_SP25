<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GiaTriBienTheController extends Controller
{
    public function createValue(Request $request)
    {
        DB::beginTransaction();

        DB::table("gia_tri_bien_the")->insert([
            "ID_BienThe" => $request->input("ID_BienThe"),
            "TenGiaTri" => $request->input("TenGiaTri"),
            "created_at" => date("Y/m/d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("BienThe.index")->with("success", "Thêm Biến Thể Thành Công!");
    }

    public function destroy(string $id)
    {
        $thongTinGiaTri = DB::table("gia_tri_bien_the")->find($id);
        if (!$thongTinGiaTri) {
            return redirect()->route("BienThe.index")->with("error", "Giá Trị Không Tồn Tại");
        }

        DB::table("gia_tri_bien_the")->where("id", $id)->update([
            "Xoa" => 1,
            "deleted_at" => date("Y/m/d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("BienThe.edit", $thongTinGiaTri->ID_BienThe)->with("success", "Xóa Biến Thể Thành Công!");
    }
}
