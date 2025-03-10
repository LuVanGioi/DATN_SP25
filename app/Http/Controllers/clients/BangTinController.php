<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BangTinController extends Controller
{
    public function index()
    {
        $newsList = DB::table("bai_viet")->where("Xoa", 0)->orderByDesc("id")->get();
        return view("clients.BaiViet.Baiviet", compact("newsList"));
     }
}
