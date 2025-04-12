<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BangTinController extends Controller
{

    public function index()
    {
        $newsList = DB::table("bai_viet")
            ->where("Xoa", 0)
            ->orderByDesc("id")
            ->paginate(8);

        $baiVietGanDay = DB::table("bai_viet")
            ->where("Xoa", 0)
            ->orderByDesc("id")
            ->select(DB::raw('DATE(created_at) as ngay'), "bai_viet.*")
            ->limit(5)
            ->get();

        $danhMuc = DB::table("danh_muc_bai_viet")
            ->where("Xoa", 0)
            ->orderByDesc("id")
            ->limit(10)
            ->get();

        return view("clients.BaiViet.Baiviet", compact("newsList", "danhMuc", "baiVietGanDay"));
    }




    public function show($id)
    {
        $chiTiet = DB::table('bai_viet')->find($id);

        return view("clients.BaiViet.Chitiet", compact("chiTiet"));
    }
}
