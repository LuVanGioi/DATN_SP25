<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DanhMucSanPhamController extends Controller
{
    
    public function show( Request $request,string $id)
    {
        $danhSach = DB::table("danh_muc_san_pham")->where("Xoa", 0)->orderByDesc("id")->get();
        $thuongHieu = DB::table("thuong_hieu")->where("Xoa", 0)->orderByDesc("id")->get();
  

        return view('clients.DanhMucSanPham.DanhMucSanPham',compact('danhSach','thuongHieu','id'));
    }

    
}
