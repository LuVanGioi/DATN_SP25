<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faq = DB::table("faq")->where("Xoa", 0)->get();
        return view("admins.FAQ.DanhSach", compact("faq"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admins.FAQ.Them");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();


        DB::table("faq")->insert([
            "DuongDan" => xoadau($request->input("TieuDe")),
            "TieuDe" => $request->input("TieuDe"),
            "NoiDung" => $request->input("NoiDung"),
            "Xoa" => "0",
            "created_at" => date("Y/m/d H:i:s")
        ]);


        DB::commit();

        return redirect()->route("FAQ.index")->with("success", 'Thêm Thành Công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $thongTinLienKet = DB::table("faq")->find($id);
        return view("admins.FAQ.ChiTiet", compact("thongTinLienKet"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $thongTinLienKet = DB::table("faq")->find($id);
        return view("admins.FAQ.Sua", compact("thongTinLienKet"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();


        DB::table("faq")->where("id", $id)->update([
            "TieuDe" => $request->input("TieuDe"),
            "NoiDung" => $request->input("NoiDung"),
            "updated_at" => date("Y/m/d H:i:s")
        ]);


        DB::commit();

        return redirect()->route("FAQ.index")->with("success", 'Cập nhật Thành Công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Faq = DB::table("faq")->find($id);

        if (!$Faq) {
            return redirect()->route("Faq.index")->with("error", "Liên Kết Không Tồn Tại!");
        }

        DB::table("faq")->where("id", $id)->update([
            "Xoa" => 1,
            "deleted_at" => date("Y/m/d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("FAQ.index")->with("success", "Xóa Thành Công!");
    }
}

