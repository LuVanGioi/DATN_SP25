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
        $danhSachThongTinLienHe = DB::table("thong_tin_lien_he")->where("Xoa", 1)->orderByDesc("id")->get(); #lấy danh sách thông tin liên hệ
        $danhSachSanPham = DB::table("san_pham")->where("Xoa", 1)->orderByDesc("id")->get(); #lấy danh sách sản phẩm
        $danhSachDanhMucSanPham = DB::table("danh_muc_san_pham")->where("Xoa", 1)->orderByDesc("id")->get(); #lấy danh sách danh mục sản phẩm
        $danhSachBanner = DB::table("banner")->where("Xoa", 1)->orderByDesc("id")->get(); #lấy danh sách banner
        
        return view("admins.ThungRac.DanhSach", compact("danhSachChatLieu", "danhSachThuongHieu", "danhSachThongTinLienHe", "danhSachSanPham", "danhSachDanhMucSanPham","danhSachBanner"));
    }

    public function restore(Request $request, string $id)
    {
        $table = $request->input("table");
        $thongTin = DB::table($table)->find($id);

        if(!$thongTin) {
            return redirect()->route("ThungRac.index")->with("error", "Thông Tin Không Tồn Tại");
        }

        DB::table($table)->where("id", $id)->update([
            "Xoa" => 0,
            "deleted_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("ThungRac.index")->with("success", "Khôi Phục Dữ Liệu Thành Công!");
    }

    public function destroy_images(string $id) {
        $thongTin = DB::table("hinh_anh_san_pham")->find($id);

        if(!$thongTin) {
            return redirect()->route("SanPham.edit", $thongTin->ID_SanPham)->with("error", "Hình Ảnh Không Tồn Tại Hoặc Đã Được Xóa");
        }

        DB::table("hinh_anh_san_pham")->where("id", $id)->update([
            "Xoa" => 1,
            "deleted_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("SanPham.edit", $thongTin->ID_SanPham)->with("success", "Xóa Hình Ảnh Thành Công!");
    }
}
