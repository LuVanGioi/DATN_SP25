<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ThungRacController extends Controller
{
    public function index() {
        $danhSachChatLieu = DB::table("chat_lieu")->where("Xoa", 1)->orderByDesc("id")->get(); #lấy danh sách chất liệu
        $danhSachThuongHieu = DB::table("thuong_hieu")->where("Xoa", 1)->orderByDesc("id")->get(); #lấy danh sách chất liệu

        return view("admins.ThungRac.DanhSach", compact("danhSachChatLieu", "danhSachThuongHieu"));
    }

    public function restore(Request $request, string $id)
    {
        $table = $request->input("table");
        $thongTin = DB::table($table)->find($id);

        if(!$thongTin) {
            return redirect()->route("ThungRac.index")->with("error", "Chất Liệu Không Tồn Tại");
        }

        DB::table($table)->where("id", $id)->update([
            "Xoa" => 0,
            "deleted_at" => date("Y-m-d")
        ]);

        DB::commit();

        return redirect()->route("ChatLieu.index")->with("success", "Khôi Phục Dữ Liệu Thành Công!");
    }
}
