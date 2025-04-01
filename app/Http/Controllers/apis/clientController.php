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
                ->join("bien_the_san_pham", function ($join) {
                    $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                        ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                        ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
                })
                ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
                ->selectRaw("SUM(cart.SoLuong * bien_the_san_pham.Gia) as tongTien")
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

            if (Auth::check()) {
                $userId = Auth::user()->id;
            } else {
                return response()->json([
                    "status" => "error",
                    "message" => "Đăng Nhập Để Sử Dụng ",
                    "discount" => 0,
                    "total_price" => 0
                ]);
            }

            if (empty($cart_id_list)) {
                return response()->json([
                    "status" => "error",
                    "message" => "Không Có Sản Phẩm Để Áp Mã Giảm Giá",
                    "discount" => 0,
                    "total_price" => 0
                ]);
            }

            $thongTinGioHang = DB::table('cart')
                ->whereIn('cart.id', $cart_id_list)
                ->join("bien_the_san_pham", function ($join) {
                    $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                        ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                        ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
                })
                ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
                ->selectRaw("SUM(cart.SoLuong * bien_the_san_pham.Gia) as tongTien")
                ->first();
            $tongTienSanPhamDaChon = $thongTinGioHang->tongTien ?? 0;

            if ($request->input("voucher")):
                $discount = DB::table('magiamgia')->where('name', $request->input('voucher'))->first();
                if (!$discount):
                    return response()->json([
                        "status" => "error",
                        "message" => "Mã giảm giá không hợp lệ!",
                        "discount" => 0,
                        "total_price" => $tongTienSanPhamDaChon
                    ]);
                endif;

                if ($tongTienSanPhamDaChon < $discount->min_value):
                    return response()->json([
                        "status" => "error",
                        "message" => 'Bạn Phải Thanh Toán Từ ' . number_format($discount->min_value) . 'đ Trở Lên',
                        "discount" => 0,
                        "total_price" => $tongTienSanPhamDaChon
                    ]);
                endif;

                if (time() < strtotime($discount->start_date . ' 00:00:00') || time() > strtotime($discount->end_date . ' 23:59:59')):
                    return response()->json([
                        "status" => "error",
                        "message" => 'Mã Giảm Giá Đã Hết Hạn Sử Dụng',
                        "discount" => 0,
                        "total_price" => $tongTienSanPhamDaChon
                    ]);
                endif;

                $soLanSuDung = DB::table('su_dung_ma_giam_gia')->where('MaGiamGia', $request->input('voucher'))->count();
                if ($soLanSuDung > $discount->quantity):
                    return response()->json([
                        "status" => "error",
                        "message" => 'Mã Giảm Giá Đã Hết Lượt Sử Dụng',
                        "discount" => 0,
                        "total_price" => $tongTienSanPhamDaChon
                    ]);
                endif;

                $kiemTraSuDung = DB::table('su_dung_ma_giam_gia')->where('ID_User', $userId)->where('MaGiamGia', $request->input('voucher'))->first();
                if ($kiemTraSuDung):
                    return response()->json([
                        "status" => "error",
                        "message" => 'Bạn Đã Sử Dụng Mã Giảm Giá Này Rồi',
                        "discount" => 0,
                        "total_price" => $tongTienSanPhamDaChon
                    ]);
                endif;

                $tinhPhanTram = ($tongTienSanPhamDaChon * $discount->value) / 100;
                $tinhPhanTram = min($tinhPhanTram, $discount->max_value);
                $tongGiaTien = max(0, ceil($tongTienSanPhamDaChon - $tinhPhanTram));


                return response()->json([
                    "status" => "success",
                    "message" => "Áp Dụng Mã Giảm Giá Thành Công!",
                    "discount" => $tinhPhanTram,
                    "total_price" => $tongGiaTien
                ]);
            else:
                return response()->json([
                    "status" => "success",
                    "message" => "Hủy Bỏ Sử Dụng Mã Giảm Giá Thành Công!",
                    "discount" => 0,
                    "total_price" => $tongTienSanPhamDaChon
                ]);
            endif;
        }
    }
}
