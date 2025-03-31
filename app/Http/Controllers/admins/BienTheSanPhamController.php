<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\BienTheSanPhamRequest;

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
    public function store(BienTheSanPhamRequest $request)
    {
        DB::beginTransaction();

        $sanPham = DB::table("san_pham")->where("Xoa", 0)->find($request->input("ID_SanPham"));

        if (!$sanPham) {
            return redirect()->route("SanPham.index")->with("error", "Sản Phẩm Không Tồn Tại!");
        }

        $thongTinBienThes = $request->input('ThongTinBienThe', []);
        $giaBienThes = $request->input('GiaBienThe', []);
        $soLuongBienThes = $request->input('SoLuongBienThe', []);
        $hinhAnhBienThes = $request->file("HinhAnh", []);

        if(count($thongTinBienThes) <= 0) {
            return redirect()->back()->with("error", "Chọn Đầy Đủ Thông Tin Biến Thể Đểm Thêm");
        }

        foreach ($thongTinBienThes as $index => $thongTin) {
            [$kichCo, $idMauSac] = explode('|', $thongTin);

            $checkBienTheSanPham = DB::table("bien_the_san_pham")->where('ID_SanPham', $request->input("ID_SanPham"))
            ->where('ID_MauSac', $idMauSac)
            ->where('KichCo', $kichCo)
            ->exists();

            $thongTinMauSac = DB::table("mau_sac")->where('id', $idMauSac)
            ->first();

            if($checkBienTheSanPham) {
                return redirect()->back()->with("error", "Biến Thể ".$kichCo." - ".$thongTinMauSac->TenMauSac." Đã Tồn Tại!");
            }

            if (!empty($hinhAnhBienThes[$index])) {
                $HinhAnh = $hinhAnhBienThes[$index]->store("uploads/SanPham", "public");
            }

            DB::table('bien_the_san_pham')->insert([
                'KichCo' => $kichCo,
                'ID_MauSac' => $idMauSac,
                'ID_SanPham' => $request->input("ID_SanPham"),
                'HinhAnh' => $HinhAnh,
                'Gia' => ($giaBienThes[$index] ?? 0),
                'SoLuong' => ($soLuongBienThes[$index] ?? 0),
                'created_at' => now(),
            ]);
        }

        DB::commit();

        return redirect()->route("SanPham.edit", $request->input("ID_SanPham"))->with("success", "Thêm Biến Thể Vào Sản Phẩm Thành Công!");
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
