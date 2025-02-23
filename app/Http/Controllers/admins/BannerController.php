<?php

namespace App\Http\Controllers\admins;

use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $danhSach = DB::table("banner")->where("Xoa", 0)->orderByDesc("id")->get();
        return view("admins.Banner.danhSach", compact("danhSach"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.Banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        DB::beginTransaction();
        foreach ($request->file("HinhAnh") as $row) {
            if ($row->isValid()) {
                $images = $row->store("uploads/Banner", "public");
                DB::table('banner')->insert([
                    "TenBanner"   => $request->input("TenBanner"),
                    "HinhAnh"     => $images,
                    "TrangThai"   => $request->input("TrangThai"),
                    "created_at"   => date("Y/m/d H:i:s")
                ]);
            }
        }
        DB::commit();

            return redirect()->route('Banner.index')->with('success', 'Thêm thành công');
       
    }


    public function edit(string $id)
    {
        $banner = DB::table("banner")->find($id);

        if (!$banner) {
            return redirect()->route("Banner.index")->with("error", "Banner Không Tồn Tại");
        }

        return view("admins.Banner.suaBanner", compact("banner"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, string $id)
    {
        DB::beginTransaction();
        $banner = DB::table("banner")->where("Xoa", 0)->find($id);

        if (!$banner) {
            return redirect()->route("Banner.index")->with("error", "Banner Không Tồn Tại!");
        }

        $image = $banner->HinhAnh;

        if ($request->hasFile("HinhAnh")) {
            $image = $request->file("HinhAnh")->store("uploads/Banner", "public");
            Storage::disk('public')->delete($banner->HinhAnh);
        }

        DB::table( "banner")->where("id", $id)->update([
            "TenBanner" => $request->input("TenBanner"),
            "HinhAnh"   => $image,
            "TrangThai" => $request->input("TrangThai"),
            "updated_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("Banner.index")->with("success", "Cập Nhật Banner Thành Công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thongTin = DB::table("banner")->find($id);

        if (!$thongTin) {
            return redirect()->route("Banner.index")->with("error", "Banner Không Tồn Tại");
        }

        DB::table("banner")->where("id", $id)->update([
            "Xoa" => 1,
            "deleted_at" => date("Y-m-d H:i:s")
        ]);

        return redirect()->route("Banner.index")->with("success", "Xóa Danh Mục Thành Công");
    }
}
