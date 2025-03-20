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
        $thongTinMauSac = DB::table("mau_sac")->where("Xoa", 0)->get();
        $thongTinKichCo = DB::table("kich_co")->where("Xoa", 0)->get();
        return view("admins.BienThe.DanhSach", compact("danhSachBienThe", "thongTinMauSac", "thongTinKichCo"));
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
        //
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $thongTinBienThe = DB::table("bien_the")->where("Xoa", 0)->find($id);
        if (!$thongTinBienThe) {
            return redirect()->route("BienThe.index")->with("success", "Biến Thể Không Hợp Lệ!");
        }

        $thongTinMauSac = DB::table("mau_sac")->where("Xoa", 0)->where("ID_BienThe", $id)->get();
        $thongTinKichCo = DB::table("kich_co")->where("Xoa", 0)->where("ID_BienThe", $id)->get();
        return view("admins.BienThe.SuaBienThe", compact("thongTinBienThe", "thongTinMauSac", "thongTinKichCo"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $thongTinBienThe = DB::table("bien_the")->where("Xoa", 0)->find($id);
        if (!$thongTinBienThe) {
            return redirect()->route("BienThe.index")->with("success", "Biến Thể Không Hợp Lệ!");
        }

        $idGiaTriList = $request->input('ID_GiaTri', []);
        $giaTriBienTheList = $request->input('GiaTriBienThe', []);

        foreach ($idGiaTriList as $index => $idGiaTri) {
            $giaTriBienThe = $giaTriBienTheList[$index] ?? null;

            if ($giaTriBienThe) {
                if ($id == 2) {
                    DB::table('mau_sac')->where('id', $idGiaTri)->update([
                        'TenMauSac' => $giaTriBienThe,
                        'updated_at' => date('Y/m/d H:i:s')
                    ]);
                } else {
                    DB::table('kich_co')->where('id', $idGiaTri)->update([
                        'TenKichCo' => $giaTriBienThe,
                        'updated_at' => date('Y/m/d H:i:s')
                    ]);
                }
            } else {
                if ($id == 2) {
                    DB::table('mau_sac')->where('id', $idGiaTri)->update([
                        'Xoa' => 1,
                        'deleted_at' => date('Y/m/d H:i:s')
                    ]);
                } else {
                    DB::table('kich_co')->where('id', $idGiaTri)->update([
                        'Xoa' => 1,
                        'deleted_at' => date('Y/m/d H:i:s')
                    ]);
                }
            }
        }

        if ($request->input("GiaTriBienTheMoi")) {
            foreach ($request->input("GiaTriBienTheMoi") as $row1) {
                if ($row1) {
                    if ($id == 2) {
                        if (DB::table('mau_sac')->where('TenMauSac', $row1)->exists()) {
                            return back()->with("error", "Biến Thể " . $row1 . " Đã Tồn Tại Rồi!");
                        } else {
                            DB::table("mau_sac")->insert([
                                "TenMauSac" => $row1,
                                "ID_BienThe" => $id,
                                "created_at" => date("Y/m/d H:i:s")
                            ]);
                        }
                    } else {
                        if (DB::table('kich_co')->where('TenKichCo', $row1)->exists()) {
                            return back()->with("error", "Biến Thể " . $row1 . " Đã Tồn Tại Rồi!");
                        } else {
                            DB::table("kich_co")->insert([
                                "TenKichCo" => $row1,
                                "ID_BienThe" => $id,
                                "created_at" => date("Y/m/d H:i:s")
                            ]);
                        }
                    }
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
