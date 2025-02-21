<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\BienTheRequest;

class BienTheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhSachBienThe = DB::table("bien_the")->where("Xoa", 0)->orderByDesc("id")->get();
        $danhSachGiaTriBienThe = DB::table("gia_tri_bien_the")->where("Xoa", 0)->orderByDesc("id")->get();
        return view("admins.BienThe.DanhSach", compact("danhSachBienThe", "danhSachGiaTriBienThe"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admins.BienThe.TaoBienThe");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BienTheRequest $request)
    {
        DB::beginTransaction();

        $infoBienThe = DB::table("bien_the")->where("TenBienThe", $request->input("TenBienThe"))->first();

        if (!$infoBienThe) {
            DB::table("bien_the")->insert([
                "TenBienThe" => $request->input("TenBienThe"),
                "created_at" => date("Y/m/d H:i:s")
            ]);

            DB::commit();
        }


        foreach ($request->input("GiaTriBienThe") as $row) {
            if ($row) {
                DB::table("gia_tri_bien_the")->insert([
                    "ID_BienThe" => $infoBienThe->id,
                    "TenGiaTri" => $row,
                    "created_at" => date("Y/m/d H:i:s")
                ]);
            }
        }

        DB::commit();

        return redirect()->route("BienThe.index")->with("success", "Thêm Biến Thể Thành Công!");
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $thongTinBienThe = DB::table("bien_the")->where("Xoa", 0)->find($id);
        if(!$thongTinBienThe) {
            return redirect()->route("BienThe.index")->with("success", "Biến Thể Không Hợp Lệ!");
        }

        $thongTinGiaTriBienThe = DB::table("gia_tri_bien_the")->where("Xoa", 0)->where("ID_BienThe", $id)->orderByDesc("id")->get();
        return view("admins.BienThe.SuaBienThe", compact("thongTinBienThe", "thongTinGiaTriBienThe"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $thongTinBienThe = DB::table("bien_the")->where("Xoa", 0)->find($id);
        if(!$thongTinBienThe) {
            return redirect()->route("BienThe.index")->with("success", "Biến Thể Không Hợp Lệ!");
        }

        DB::table("bien_the")->where("id", $id)->update([
            "TenBienThe" => $request->input("TenBienThe"),
            "updated_at" => date("Y/m/d H:i:s")
        ]);

        $idGiaTriList = $request->input('ID_GiaTri', []);
        $giaTriBienTheList = $request->input('GiaTriBienThe', []);

        foreach ($idGiaTriList as $index => $idGiaTri) {
            $giaTriBienThe = $giaTriBienTheList[$index] ?? null;
        
            if ($giaTriBienThe) {
                DB::table('gia_tri_bien_the')->where('id', $idGiaTri)->update([
                    'TenGiaTri' => $giaTriBienThe,
                    'updated_at' => date('Y/m/d H:i:s')
                ]);
            } else {
                DB::table('gia_tri_bien_the')->where('id', $idGiaTri)->update([
                    'Xoa' => 1,
                    'deleted_at' => date('Y/m/d H:i:s')
                ]);
            }
        }

        if($request->input("GiaTriBienTheMoi")) {
            foreach ($request->input("GiaTriBienTheMoi") as $row1) {
                if ($row1) {
                    DB::table("gia_tri_bien_the")->insert([
                        "ID_BienThe" => $id,
                        "TenGiaTri" => $row1,
                        "created_at" => date("Y/m/d H:i:s")
                    ]);
                }
            }
    
            DB::commit();
        }

        return redirect()->route("BienThe.edit", $id)->with("success", "Cập Nhật Biến Thể Thành Công!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
