<?php

namespace App\Http\Controllers\apis;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class clientController extends Controller
{
    public function get_all(Request $request)
    {

        if ($request->input('type') == "total_cart") {
            $cart_id_list = $request->input('cart_id_list');

            if (empty($cart_id_list)) {
                return response()->json([
                    "status" => "success",
                    "message" => "Đã Bỏ Chọn Tất Cả",
                    "amount" => 0,
                    "total_price" => 0
                ]);
            }

            $thongTinGioHang = DB::table('cart')
                ->whereIn('cart.id', $cart_id_list)
                ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
                ->selectRaw("SUM(cart.SoLuong * san_pham.GiaSanPham) as tongTien")
                ->first();
            $tongTienSanPhamGioHangClient = $thongTinGioHang->tongTien ?? 0;

            return response()->json([
                "status" => "success",
                "message" => "Cập nhật trạng thái giỏ hàng thành công.",
                "amount" => number_format(count($cart_id_list)),
                "total_price" => number_format($tongTienSanPhamGioHangClient)." đ"
            ]);
        }
    }
}
