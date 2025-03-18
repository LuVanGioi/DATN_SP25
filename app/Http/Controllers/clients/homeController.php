<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function home()
    {
        $tatCaSanPham = DB::table("san_pham")->where("Xoa", 0)->orderByDesc("id")->limit(100)->get();
        // $tatCaBaiViet = DB::table("bai_viet")->where("Xoa", 0)->orderByDesc("id")->limit(5)->get();
        $tatCaBaiViet = DB::table("bai_viet")
            ->where("Xoa", 0)
            ->orderByDesc("id")
            ->paginate(2);
        $tatCaBanner = DB::table("banner")->where("Xoa", 0)->orderByDesc("id")->limit(5)->get();
        return view('clients.TrangChu', compact("tatCaSanPham", "tatCaBaiViet", "tatCaBanner"));
    }
    
}
