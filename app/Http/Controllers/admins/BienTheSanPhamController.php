<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\BienTheSanPhamRequest;

class BienTheSanPhamController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(BienTheSanPhamRequest $request)
    {
        DB::beginTransaction();

        $sanPham = DB::table("san_pham")->where("Xoa", 0)->find($request->input("ID_SanPham"));

        if (!$sanPham) {
            return redirect()->route("SanPham.index")->with("error", "Sản phẩm không tồn tại!");
        }

        $thongTinBienThes = $request->input('ThongTinBienThe', []);
        $giaBienThes = $request->input('GiaBienThe', []);
        $soLuongBienThes = $request->input('SoLuongBienThe', []);

        foreach ($thongTinBienThes as $index => $thongTin) {
            [$kichCo, $idMauSac] = explode('|', $thongTin);

            $checkBienThe = DB::table('bien_the_san_pham')
                ->where("ID_SanPham", $sanPham->id)
                ->where("ID_MauSac", $idMauSac)
                ->where("KichCo", $kichCo)->exists();

            if (!$checkBienThe) {
                DB::table('bien_the_san_pham')->insert([
                    'KichCo' => $kichCo,
                    'ID_MauSac' => $idMauSac,
                    'ID_SanPham' => $sanPham->id,
                    'Gia' => $giaBienThes[$index],
                    'SoLuong' => $soLuongBienThes[$index],
                    'created_at' => now(),
                ]);
            }
        }

        DB::commit();

        return redirect()->route("SanPham.edit", $request->input("ID_SanPham"))
            ->with("success", "Thêm biến thể vào sản phẩm thành công!");
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

        if ($request->has("HinhAnh")) {
            foreach ($request->file("HinhAnh") as $row) {
                if ($row->isValid()) {
                    $fileName = $thongTin->KichCo . '_' . $thongTin->ID_MauSac . '_' . $thongTin->ID_SanPham . '_' . uniqid() . '.png';
                    $images = $row->storeAs("uploads/SanPham", $fileName, "public");

                    DB::table("hinh_anh_san_pham")->insert([
                        "DuongDan" => $images,
                        "ID_SanPham" => $id,
                        "created_at" => date("Y/m/d H:i:s")
                    ]);
                }
            }
        }

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
