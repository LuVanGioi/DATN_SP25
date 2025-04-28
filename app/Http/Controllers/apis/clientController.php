<?php

namespace App\Http\Controllers\apis;

use Nette\Utils\Random;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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
        } else if ($request->input("type") == "chat_support_admin") {
            $donHoTro = DB::table("don_ho_tro")->where("MaHoTro", $request->input("trading"))->first();
            if (!$donHoTro) {
                return response()->json([
                    "status" => "error",
                    "message" => "Tin Nhắn Hỗ Trợ Không Tồn Tại"
                ]);
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

            DB::table("chat_ho_tro")->insert([
                "ID_Guests" => "system",
                "MaHoTro" => $donHoTro->MaHoTro,
                "NoiDung" => $content,
                "HinhAnh" => json_encode($images),
                "status" => 1,
                "created_at" => date("Y-m-d H:i:s")
            ]);

            DB::table("don_ho_tro")->where("id", $donHoTro->id)->update([
                "TrangThai" => "system",
                "updated_at" => date("Y-m-d H:i:s")
            ]);

            DB::commit();

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
        } else if ($request->input("type") == "get_chat_admin") {
            $don_ho_tro = DB::table("don_ho_tro")
                ->where("MaHoTro", $request->input("trading"))
                ->limit(100)
                ->get();

            $don = [];

            foreach ($don_ho_tro as $row) {
                $list = [];

                $chats = DB::table("chat_ho_tro")
                    ->where("MaHoTro", $row->MaHoTro)
                    ->limit(100)
                    ->get();

                foreach ($chats as $chat) {
                    $list[] = [
                        "user" => ($chat->ID_Guests == "system" ? "system" : "my"),
                        "chat_code" => $chat->MaHoTro,
                        "content" => $chat->NoiDung,
                        "images" => $chat->HinhAnh,
                        "time" => $chat->created_at,
                    ];
                }

                $don[] = [
                    "trading" => $row->MaHoTro,
                    "data" => $list
                ];
            }

            return response()->json([
                "status" => "success",
                "message" => "Lấy Danh Sách Thành Công!",
                "data" => $don
            ]);
        } else if ($request->input("type") == "update_status_chat") {
            $don_ho_tro = DB::table("don_ho_tro")
                ->where("MaHoTro", $request->input("trading"))
                ->limit(100)
                ->get();

            if (!$don_ho_tro) {
                return response()->json([
                    "status" => "error",
                    "message" => "Tin Nhắn Hỗ Trợ Không Tồn Tại"
                ]);
            }

            DB::table('chat_ho_tro')->where('MaHoTro', $request->input("trading"))->update([
                    'status' => 1
                ]);

            DB::commit();

            return response()->json([
                "status" => "success",
                "message" => "Cập Nhật Thành Công!"
            ]);
        } else if ($request->input("type") == "get_products_virtual") {
            $products = DB::table('san_pham')
                ->inRandomOrder()
                ->limit(10)
                ->select('TenSanPham', 'HinhAnh')
                ->get();
            $List = [];
            foreach ($products as $row):
                $List[] = [
                    "TenSanPham" => $row->TenSanPham,
                    "HinhAnh" => Storage::url($row->HinhAnh)
                ];
            endforeach;

            return response()->json([
                "status" => "success",
                "message" => "Lấy Danh Sách Thành Công!",
                "data" => []
            ]);
        } else if ($request->input("type") == "buy_again") {
            if (Auth::check()) {
                $userId = Auth::user()->ID_Guests ?? Auth::user()->id;
            } else {
                $userId = request()->cookie('ID_Guests', Str::uuid());
                Cookie::queue('ID_Guests', $userId, 60 * 24 * 365);
            }

            if (!Auth::check()) {
                return response()->json([
                    "status" => "error",
                    "message" => "Vui Lòng Đăng Nhập Để Sử Dụng"
                ]);
            }

            $trading = $request->input("trading");

            $donHang = DB::table("don_hang")
                ->where("ID_User", Auth::user()->id)
                ->where("MaDonHang", $trading)
                ->first();

            if (!$trading) {
                return response()->json([
                    "status" => "error",
                    "message" => "Dữ Liệu Không Chính Xác, Vui Lòng Tải Lại Trang Và Thử Lại!"
                ]);
            }

            if (!$donHang) {
                return response()->json([
                    "status" => "error",
                    "message" => "Đơn Hàng Không Tồn Tại?"
                ]);
            }
            $list = [];
            foreach (DB::table("san_pham_don_hang")->where("MaDonHang", $donHang->MaDonHang)->get() as $row):

                $sanPhamAdd = DB::table("san_pham")
                    ->where("id", $row->Id_SanPham)
                    ->first();
                $soLuongMua = $row->SoLuong;
                if ($sanPhamAdd->TheLoai == "bienThe") {
                    $checkCart = DB::table('cart')
                        ->where('ID_KhachHang', $userId)
                        ->where("ID_SanPham", $row->Id_SanPham)
                        ->where("KichCo", $row->KichCo)
                        ->where("MauSac", DB::table("mau_sac")->where("TenMauSac", $row->MauSac)->first()->id)
                        ->first();

                    if ($checkCart) {
                        $thongTinBienThe = DB::table("bien_the_san_pham")
                            ->where("ID_SanPham", $checkCart->ID_SanPham)
                            ->where("ID_MauSac", $checkCart->MauSac)
                            ->where("KichCo", $checkCart->KichCo)->first();

                        $checkGioHang = DB::table("cart")
                            ->where("ID_SanPham", $checkCart->ID_SanPham)
                            ->where("KichCo", $checkCart->KichCo)
                            ->where("MauSac", $checkCart->MauSac)
                            ->first();

                        if ($soLuongMua > $thongTinBienThe->SoLuong) {
                            return response()->json([
                                "status" => "error",
                                "message" => "Sản Phẩm Chỉ Còn " . number_format($thongTinBienThe->SoLuong)
                            ]);
                        }

                        if ($checkGioHang->SoLuong > $thongTinBienThe->SoLuong) {
                            return response()->json([
                                "status" => "error",
                                "message" => "Bạn đã có " . number_format($checkGioHang->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                            ]);
                        }

                        if ($checkGioHang->SoLuong >= $thongTinBienThe->SoLuong) {
                            return response()->json([
                                "status" => "error",
                                "message" => "Bạn đã có " . number_format($checkGioHang->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                            ]);
                        }

                        $congSoLuong = $checkCart->SoLuong + $soLuongMua;
                        if ($congSoLuong > $thongTinBienThe->SoLuong) {
                            $congSoLuong = $thongTinBienThe->SoLuong;
                        }

                        DB::table("cart")->where("id", $checkCart->id)->update([
                            "SoLuong" => $congSoLuong
                        ]);
                    } else {
                        DB::table("cart")->insert([
                            "ID_KhachHang" => $userId,
                            "ID_SanPham" => $row->Id_SanPham,
                            "KichCo" => $row->KichCo,
                            "MauSac" => DB::table("mau_sac")->where("TenMauSac", $row->MauSac)->first()->id,
                            "SoLuong" => $soLuongMua,
                            "Xoa" => "0",
                            "created_at" => now()
                        ]);

                        $thongTinGioHangMoi = DB::table('cart')
                            ->where('ID_KhachHang', $userId)
                            ->where("ID_SanPham", $row->Id_SanPham)
                            ->where("KichCo", $row->KichCo)
                            ->where("MauSac", DB::table("mau_sac")->where("TenMauSac", $row->MauSac)->first()->id)
                            ->first();

                        $thongTinBienThe = DB::table("bien_the_san_pham")->where("ID_SanPham", $thongTinGioHangMoi->ID_SanPham)
                            ->where("ID_MauSac", DB::table("mau_sac")->where("id", $thongTinGioHangMoi->MauSac)->first()->id)
                            ->where("KichCo", $thongTinGioHangMoi->KichCo)->first();

                        if ($soLuongMua > $thongTinBienThe->SoLuong) {
                            return response()->json([
                                "status" => "error",
                                "message" => "Sản Phẩm Chỉ Còn " . number_format($thongTinBienThe->SoLuong)
                            ]);
                        }
                        if ($thongTinGioHangMoi->SoLuong > $thongTinBienThe->SoLuong) {
                            return response()->json([
                                "status" => "error",
                                "message" => "Bạn đã có " . number_format($thongTinGioHangMoi->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                            ]);
                        }
                    }
                } else {
                    $checkCart = DB::table('cart')
                        ->where('ID_KhachHang', $userId)
                        ->where("ID_SanPham", $row->Id_SanPham)
                        ->where("KichCo", "=", null)
                        ->where("MauSac", "=", null)
                        ->first();
                    if ($checkCart) {
                        $thongTinSanPhamThuong = DB::table("san_pham")->where("id", $row->Id_SanPham)->first();
                        if ($soLuongMua > $thongTinSanPhamThuong->SoLuong) {
                            return response()->json([
                                "status" => "error",
                                "message" => "Sản Phẩm Chỉ Còn " . number_format($thongTinSanPhamThuong->SoLuong)
                            ]);
                        }

                        $checkGioHang = DB::table("cart")
                            ->where("ID_SanPham", $row->Id_SanPham)
                            ->where("KichCo", "=", null)
                            ->where("MauSac", "=", null)
                            ->first();

                        if ($checkGioHang->SoLuong > $thongTinSanPhamThuong->SoLuong) {
                            return response()->json([
                                "status" => "error",
                                "message" => "Bạn đã có " . number_format($checkGioHang->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                            ]);
                        }

                        $tinhGioHang = $checkGioHang->SoLuong + $soLuongMua;
                        if ($tinhGioHang > $thongTinSanPhamThuong->SoLuong) {
                            return response()->json([
                                "status" => "error",
                                "message" => "Bạn đã có " . number_format($checkGioHang->SoLuong) . " sản phẩm trong giỏ hàng. " . ($thongTinSanPhamThuong->SoLuong - $checkGioHang->SoLuong == 0 ? "Bạn không thể thêm nữa vì quá số lượng sản phẩm tồn kho" : "Bạn chỉ có thể thêm " . number_format($thongTinSanPhamThuong->SoLuong - $checkGioHang->SoLuong) . " vào giỏ hàng")
                            ]);
                        }

                        if ($checkCart->SoLuong >= $thongTinSanPhamThuong->SoLuong) {
                            return response()->json([
                                "status" => "error",
                                "message" => "Bạn đã có " . number_format($checkCart->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                            ]);
                        }

                        $congSoLuong = $checkCart->SoLuong + $soLuongMua;
                        if ($congSoLuong > $thongTinSanPhamThuong->SoLuong) {
                            $congSoLuong = $thongTinSanPhamThuong->SoLuong;
                        }

                        DB::table("cart")->where("id", $checkCart->id)->update([
                            "SoLuong" => $congSoLuong
                        ]);
                    } else {
                        DB::table("cart")->insert([
                            "ID_KhachHang" => $userId,
                            "ID_SanPham" => $row->Id_SanPham,
                            "SoLuong" => $soLuongMua,
                            "Xoa" => "0",
                            "created_at" => now()
                        ]);

                        $thongTinGioHangMoi = DB::table('cart')
                            ->where('ID_KhachHang', $userId)
                            ->where("ID_SanPham", $row->Id_SanPham)
                            ->first();

                        $thongTinSanPhamThuong = DB::table("san_pham")->where("id", $row->Id_SanPham)->first();

                        if ($soLuongMua > $thongTinSanPhamThuong->SoLuong) {
                            return response()->json([
                                "status" => "error",
                                "message" => "Sản Phẩm Chỉ Còn " . number_format($thongTinSanPhamThuong->SoLuong)
                            ]);
                        }
                        if ($thongTinGioHangMoi->SoLuong > $thongTinSanPhamThuong->SoLuong) {
                            return response()->json([
                                "status" => "error",
                                "message" => "Bạn đã có " . number_format($thongTinGioHangMoi->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                            ]);
                        }
                    }
                }
            endforeach;

            DB::commit();

            return response()->json([
                "status" => "success",
                "message" => "Xác Nhận Mua Lại",
                "redirect" => route("gio-hang.index")
            ]);
        } else if ($request->input("type") == "check_deposit") {
            $PayOS = DB::table("pay_os")->where("id", 1)->first();

            $apiKey = $PayOS->API_Key;
            $clientId = $PayOS->Client_ID;
            $checksumKey = $PayOS->Checksum_Key;
            $orderCode = time();

            $data = [
                "amount" => (int) $request->input("money"),
                "cancelUrl" => route('payos.cancel'),
                "description" => Auth::user()->id,
                "orderCode" => $orderCode,
                "returnUrl" => url('/vi/nap-tien'),
            ];

            $signatureString = "amount={$data['amount']}&cancelUrl={$data['cancelUrl']}&description={$data['description']}&orderCode={$data['orderCode']}&returnUrl={$data['returnUrl']}";
            $signature = hash_hmac('sha256', $signatureString, $checksumKey);
            $data["signature"] = $signature;

            $response = Http::withHeaders([
                "x-client-id" => $clientId,
                "x-api-key" => $apiKey,
                "Content-Type" => "application/json"
            ])->post("https://api-merchant.payos.vn/v2/payment-requests/{id}", $data);
            $result = $response->json();
        } else if ($request->input("type") == "xacNhanDon") {
            $trading = $request->input("trading");

            DB::table("don_hang")->where('MaDonHang', $trading)->update([
                "TrangThai" => "danhan"
            ]);

            DB::commit();

            return response()->json([
                "status" => "success",
                "message" => "Xác Nhận 'Đã Nhận Hàng' Thành Công!"
            ]);
        } else if ($request->input("type") == "check_recharge") {
            $PayOS = DB::table("pay_os")->where("id", 1)->first();

            $apiKey = $PayOS->API_Key;
            $clientId = $PayOS->Client_ID;

            foreach (DB::table("danh_sach_tao_qr")->where("TrangThai", "dangxuly")->get() as $row):
                $response = Http::withHeaders([
                    "x-client-id" => $clientId,
                    "x-api-key" => $apiKey,
                    "Content-Type" => "application/json"
                ])->get("https://api-merchant.payos.vn/v2/payment-requests/" . $row->paymentLinkId);
                $result = $response->json();

                if(time() >= $row->ThoiGianKetThuc) {
                    DB::table("danh_sach_tao_qr")->where("id", $row->id)->update([
                        "TrangThai" => "thatbai"
                    ]);
                }

                if($result['data']['status'] == "PAID") {
                    $nguoiMua = DB::table("users")->find($row->ID_User);

                    DB::table("danh_sach_tao_qr")->where("id", $row->id)->update([
                        "TrangThai" => "hoantat"
                    ]);

                    DB::table("users")->where("id", $row->ID_User)->update([
                        "price" => $nguoiMua->price + $row->SoTienNap
                    ]);

                    DB::table("lich_su_giao_dich_vi")->insert([
                        "ID_User" => Auth::user()->id,
                        "MaGiaoDich" => $row->orderCode,
                        "TieuDe" => "Nạp Tiền Vào Tài Khoản #" . $row->orderCode,
                        "SoTien" => $row->SoTienNap,
                        "TheLoai" => "recharge",
                        "TrangThai" => "thanhcong",
                        "created_at" => now()
                    ]);

                    DB::commit();

                    return response()->json([
                        "status" => "success",
                        "message" => "Bạn Đã Nạp Thành Công ₫".number_format($row->SoTienNap),
                        "money" => number_format((Auth::user()->price ?? 0))."đ"
                    ]);
                }
            endforeach;

            return response()->json([
                "status" => "error",
                "message" => "Success",
                "money" => number_format((Auth::user()->price ?? 0))."đ"
            ]);
        }

        return response()->json([
            "status" => "error",
            "message" => "Lỗi, Vui Lòng Tải Lại Trang!"
        ]);
    }
}
