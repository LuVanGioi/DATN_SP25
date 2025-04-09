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
        ->paginate(2);

    return view("clients.BaiViet.Baiviet", compact("newsList"));
}




    public function show($id)
    {
        $chiTiet = DB::table('bai_viet')->find($id);

        return view("clients.BaiViet.Chitiet", compact("chiTiet"));
     }
}
