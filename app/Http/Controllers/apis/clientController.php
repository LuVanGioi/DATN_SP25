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
                "total_price" => number_format($tongTienSanPhamGioHangClient) . " đ"
            ]);
        } else if ($request->input("type") == "check_voucher") {
            $cart_id_list = $request->input('cart_id_list');

            if (empty($cart_id_list)) {
                return response()->json([
                    "status" => "success",
                    "message" => "Đã Bỏ Chọn Tất Cả",
                    "discount" => 0,
                    "total_price" => 0
                ]);
            }

            $thongTinGioHang = DB::table('cart')
                ->whereIn('cart.id', $cart_id_list)
                ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
                ->selectRaw("SUM(cart.SoLuong * san_pham.GiaSanPham) as tongTien")
                ->first();
            $tongTienSanPhamDaChon = $thongTinGioHang->tongTien ?? 0;

            $discount = DB::table('magiamgia')->where('name', $request->input('voucher'))->first();
            if (!$discount):
                return response()->json([
                    "status" => "error",
                    "message" => "Mã giảm giá không hợp lệ!",
                    "discount" => 0,
                    "total_price" => 0
                ]);
            endif;

            if ($tongTienSanPhamDaChon < $discount->min_value):
                return redirect()->back()->with('voucher_error', 'Áp Dụng Tối Thiểu Là ' . number_format($discount->min_value) . 'đ');
            endif;

            if (time() < strtotime($discount->start_date . ' 00:00:00') || time() > strtotime($discount->end_date . ' 23:59:59')):
                return redirect()->back()->with('voucher_error', 'Mã Giảm Giá Đã Hết Hạn Sử Dụng');
            endif;

            $tinhPhanTram = ($tongTienSanPhamDaChon * $discount->value) / 100;
            $tinhPhanTram = min($tinhPhanTram, $discount->max_value);
            $tongGiaTien = max(0, ceil($tongTienSanPhamDaChon - $tinhPhanTram));

            return response()->json([
                "status" => "success",
                "message" => "test",
                "discount" => $tinhPhanTram,
                "total_price" => $tongGiaTien
            ]);
        }
    }
}
