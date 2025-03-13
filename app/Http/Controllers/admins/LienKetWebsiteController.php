<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LienKetWebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lienKetWebsite = DB::table("lien_ket_ket_website")->where("Xoa", 0)->get();
        return view("admins.LienKetWebsite.DanhSach", compact("lienKetWebsite"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admins.LienKetWebsite.ThemLienKet");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();


        DB::table("lien_ket_ket_website")->insert([
            "TieuDe" => $request->input("TieuDe"),
            "NoiDung" => $request->input("NoiDung"),
            "Xoa" => "0",
            "created_at" => date("Y/m/d H:i:s")
        ]);


        DB::commit();

        return redirect()->route("LienKetWebsite.index")->with("success", 'Thêm Liên Kết Website Thành Công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $thongTinLienKet = DB::table("lien_ket_ket_website")->find($id);
        return view("admins.LienKetWebsite.ChiTietLienKet", compact("thongTinLienKet"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $thongTinLienKet = DB::table("lien_ket_ket_website")->find($id);
        return view("admins.LienKetWebsite.SuaLienKet", compact("thongTinLienKet"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();


        DB::table("lien_ket_ket_website")->where("id", $id)->update([
            "TieuDe" => $request->input("TieuDe"),
            "NoiDung" => $request->input("NoiDung"),
            "updated_at" => date("Y/m/d H:i:s")
        ]);


        DB::commit();

        return redirect()->route("LienKetWebsite.index")->with("success", 'Lưu Thông Tin Liên Kết Website Thành Công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
