<?php

namespace App\Http\Controllers\apis;

use Nette\Utils\Random;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

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
            
            $tinh = 0;
            foreach ($cart_id_list as $cart) {
                $thongTinGioHang = DB::table('cart')
                    ->where('id', $cart)
                    ->first();
                $sanPham = DB::table("san_pham")->where("id", $thongTinGioHang->ID_SanPham)->first();
                
                if ($sanPham->TheLoai == "bienThe") {
                    $sanPhamBienThe = DB::table("bien_the_san_pham")
                        ->where("ID_SanPham", $thongTinGioHang->ID_SanPham)
                        ->where("KichCo", $thongTinGioHang->KichCo)
                        ->where("ID_MauSac", $thongTinGioHang->MauSac)
                        ->first();
                    $tinh += $sanPhamBienThe->Gia * $thongTinGioHang->SoLuong;
                } else {
                    $tinh += $thongTinGioHang->SoLuong * $sanPham->GiaSanPham;
                }
            }

            $tongTienSanPhamGioHangClient = $tinh;

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
                        "message" => 'Bạn Phải Thanh Toán Đơn Hàng Từ ' . number_format($discount->min_value) . 'đ Trở Lên',
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
        } else if ($request->input("type") == "chat_support") {
            if (Auth::check()) {
                $userId = Auth::user()->ID_Guests;
            } else {
                $userId = request()->cookie('ID_Guests', Str::uuid());
                Cookie::queue('ID_Guests', $userId, 60 * 24 * 365);
            }


            $content = $request->input("content");
            if (!$content) {
                if (!$request->hasFile('images')) {
                    return response()->json([
                        "status" => "error",
                        "message" => "Vui Lòng Nhập Nội Dung Tin Nhắn!"
                    ]);
                }
            }

            $images = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('uploads/chats', 'public');
                    $images[] = Storage::url($path);
                }
            }

            $donHoTro = DB::table("don_ho_tro")->where("ID_Guests", $userId)->first();
            if ($donHoTro) {

                DB::table("chat_ho_tro")->insert([
                    "ID_Guests" => $userId,
                    "MaHoTro" => $donHoTro->MaHoTro,
                    "NoiDung" => $content,
                    "HinhAnh" => json_encode($images),
                    "created_at" => date("Y-m-d H:i:s")
                ]);

                DB::table("don_ho_tro")->where("id", $donHoTro->id)->update([
                    "TrangThai" => "User",
                    "updated_at" => date("Y-m-d H:i:s")
                ]);
            } else {
                $trand = strtoupper(Str::random(8));
                DB::table("don_ho_tro")->insert([
                    "ID_Guests" => $userId,
                    "MaHoTro" => $trand,
                    "TrangThai" => "User",
                    "created_at" => date("Y-m-d H:i:s")
                ]);

                DB::table("chat_ho_tro")->insert([
                    "ID_Guests" => $userId,
                    "MaHoTro" => $trand,
                    "NoiDung" => $content,
                    "HinhAnh" => json_encode($images),
                    "created_at" => date("Y-m-d H:i:s")
                ]);
            }

            return response()->json([
                "status" => "success",
                "message" => "Gửi Tin Nhắn Thành Công!",
                "images" => $images,
                'content' => $content,
                'chat_code' => $chat->MaHoTro ?? null,
            ]);
        } else if ($request->input("type") == "get_chat_user") {
            if (Auth::check()) {
                $userId = Auth::user()->ID_Guests;
            } else {
                $userId = request()->cookie('ID_Guests', Str::uuid());
                Cookie::queue('ID_Guests', $userId, 60 * 24 * 365);
            }

            $donHoTro = DB::table("don_ho_tro")
                ->where("ID_Guests", $userId)
                ->limit(100)
                ->first();
            if ($donHoTro) {

                $tinNhanHoTro = DB::table("chat_ho_tro")
                    ->where("MaHoTro", $donHoTro->MaHoTro)
                    ->limit(100)
                    ->get();

                $list = [];
                foreach ($tinNhanHoTro as $row):
                    $list[] = [
                        "user" => ($userId == $row->ID_Guests ? "my" : "system"),
                        "chat_code" => $row->MaHoTro,
                        "content" => $row->NoiDung,
                        "images" => $row->HinhAnh,
                        "time" => $row->created_at,
                    ];
                endforeach;

                return response()->json([
                    "status" => "success",
                    "message" => "Lấy Danh Sách Thành Công!",
                    "data" => $list
                ]);
            } else {
                return response()->json([
                    "status" => "success",
                    "message" => "ok"
                ]);
            }
        }

        return response()->json([
            "status" => "error",
            "message" => "Lỗi, Vui Lòng Tải Lại Trang"
        ]);
    }
}
