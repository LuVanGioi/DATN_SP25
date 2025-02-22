<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhSach = DB::table("san_pham")->where("Xoa", 0)->orderByDesc("id")->get();
        return view("admins.SanPham.DanhSach", compact("danhSach"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $danhSachDanhMuc = DB::table("chat_lieu")->where("Xoa", 0)->orderByDesc("id")->get();
        $danhSachChatLieu = DB::table("chat_lieu")->where("Xoa", 0)->orderByDesc("id")->get();
        $danhSachThuongHieu = DB::table("thuong_hieu")->where("Xoa", 0)->orderByDesc("id")->get();
        $danhSachBienThe = DB::table("bien_the")->where("Xoa", 0)->orderByDesc("id")->get();
        $thongTinMauSac = DB::table("mau_sac")->where("Xoa", 0)->get();
        $thongTinKichCo = DB::table("kich_co")->where("Xoa", 0)->get();


        return view("admins.SanPham.TaoSanPham", compact("danhSachDanhMuc", "danhSachChatLieu", "danhSachThuongHieu", "danhSachBienThe", "thongTinMauSac", "thongTinKichCo"));
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
        return view("admins.SanPham.ChiTiet", compact("id"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("admins.SanPham.SuaSanPham", compact("id"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
