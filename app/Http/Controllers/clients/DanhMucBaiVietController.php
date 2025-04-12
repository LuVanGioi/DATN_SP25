<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhMucBaiVietController extends Controller
{


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $danhMuc = DB::table("danh_muc_bai_viet")->find($id);
        $newsList = DB::table("bai_viet")
            ->where("danh_muc_id", $danhMuc->id)
            ->paginate(8);
        return view("clients.BaiViet.DanhMucBaiViet", compact("newsList", "danhMuc"));
    }
}
