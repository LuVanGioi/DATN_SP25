<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\admins\ThuongHieuRequest;

class ThuongHieuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhSach = DB::table("thuong_hieu")->where("Xoa", 0)->orderByDesc("id")->get();
        return view("admins.ThuongHieu.DanhSach", compact("danhSach"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admins.ThuongHieu.TaoThuongHieu");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ThuongHieuRequest $request)
    {
        DB::beginTransaction();

        if($request->hasFile("HinhAnh")) {
            $image = $request->file("HinhAnh")->store("uploads/Brands", "public");
        }

        DB::table("thuong_hieu")->insert([
            "HinhAnh" => $image,
            "TenThuongHieu" => $request->input("TenThuongHieu"),
            "created_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("ThuongHieu.index")->with("success", "Thêm Thương Hiệu Thành Công!");
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
        $thongTin = DB::table("thuong_hieu")->find($id);
        return view("admins.ThuongHieu.SuaThuongHieu", compact("thongTin"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ThuongHieuRequest $request, string $id)
    {
        DB::beginTransaction();

        $thuongHieu = DB::table("thuong_hieu")->where("Xoa", 0)->find($id);
        if(!$thuongHieu) {
            return redirect()->route("ThuongHieu.index")->with("error", "Thương Hiệu Không Tồn Tại!");
        }
        $image = $thuongHieu->HinhAnh;
        if($request->hasFile("HinhAnh")) {
            $image = $request->file("HinhAnh")->store("uploads/Brands", "public");
            Storage::disk('public')->delete($thuongHieu->HinhAnh);
        }

        DB::table("thuong_hieu")->where("id", $id)->update([
            "HinhAnh" => $image,
            "TenThuongHieu" => $request->input("TenThuongHieu"),
            "updated_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("ThuongHieu.index")->with("success", "Cập Nhật Thương Hiệu Thành Công!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thongTin = DB::table("thuong_hieu")->find($id);

        if(!$thongTin) {
            return redirect()->route("ThuongHieu.index")->with("success", "Thương Hiệu Không Tồn Tại");
        }

        DB::table("thuong_hieu")->where("id", $id)->update([
            "Xoa" => 1,
            "deleted_at" => date("Y-m-d H:i:s")
        ]);

        return redirect()->route("ThuongHieu.index")->with("success", "Xóa Thương Hiệu Thành Công!");
    }
}
