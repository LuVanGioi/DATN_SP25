<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DanhMucSanPhamController extends Controller
{
    
    public function show( Request $request,string $id)
    {
        $dichVu = DB::table("dich_vu_san_pham")->where("Xoa", 0)->get();
        $danhSach = DB::table("danh_muc_san_pham")->where("Xoa", 0)->orderByDesc("id")->get();
        $thuongHieu = DB::table("thuong_hieu")->where("Xoa", 0)->orderByDesc("id")->get();
  
        return view('clients.DanhMucSanPham.DanhMucSanPham',compact('danhSach','thuongHieu', 'dichVu', 'id'));
    }

   
//     public function filterByCategory(Request $request, string $id)
// {
    
//     // Lấy danh mục theo ID
//     $danhMuc = DB::table('danh_muc_san_pham')->where('TenDanhMucSanPham', $id)->first();

//     if (!$danhMuc) {
//         abort(404, 'Danh mục không tồn tại.');
//     }

//     // Lọc sản phẩm theo danh mục và khoảng giá
//     $query = DB::table('san_pham')->where('ID_DanhMuc', $danhMuc->id)->where('Xoa', 0);

//     if ($request->has('price_range')) {
//         [$minPrice, $maxPrice] = explode('-', $request->input('price_range'));
//         $query->whereBetween('GiaSanPham', [(int)$minPrice, (int)$maxPrice]);
//     }

//     $sanPhams = $query->paginate(12);

//     return view('clients.DanhMucSanPham.SanPhamList', compact('sanPhams', 'danhMuc'));
// }
}
