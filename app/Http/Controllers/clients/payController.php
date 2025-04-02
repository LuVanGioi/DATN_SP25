<?php

namespace App\Http\Controllers\clients;

use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class payController extends Controller
{
    public function checkDiscount(Request $request)
    {

        if ($request->action === 'acept_voucher') {
            DB::beginTransaction();
            $giamGia = 0;

            $discount = DB::table('magiamgia')->where('name', $request->input('discount'))->first();
            if ($discount) {
                $giamGia = $discount->value;
                session()->flash('success', "Áp dụng mã giảm giá thành công! Giảm " . number_format($giamGia) . " đ.");
            } else {
                session()->flash('error', "Mã giảm giá không hợp lệ!");
            }

            return redirect()->back()->with([
                'giamGia' => $giamGia
            ]);
        } else if ($request->action === 'payment') {
            $giamGia = 0;

            if ($request->input('discount')) {
                $discount = DB::table('magiamgia')->where('name', $request->input('discount'))->first();
                if (!$discount) {
                    session()->flash('error', "Mã giảm giá không hợp lệ!");
                }
            }

            $orderCode = strtoupper(Str::random(40));
            Session::put('order_code', $orderCode);
            session()->forget('selected_products');
            session([
                'selected_products' => $request->input('selected_products', [])
            ]);

            return redirect()->route('payent', $orderCode);
        }
    }

    public function payment(Request $request, $code)
    {
        if (Auth::check()) {
            $userId = Auth::user()->ID_Guests ?? Auth::user()->id;
        } else {
            $userId = request()->cookie('ID_Guests', Str::uuid());
            Cookie::queue('ID_Guests', $userId, 60 * 24 * 365);
        }

        $orderCode = $request->query('order_code', Session::get('order_code'));
        if (!$orderCode) {
            return redirect()->route('gio-hang.index')->with('error', 'Đơn Hàng Đã Được Xử Lý Hoặc Không Tồn Tại');
        }

        if ($code !== $orderCode) {
            abort(404, 'Dữ liệu không hợp lệ.');
        }

        $danhSachTinhThanh = DB::table("tinh_thanh")->get();

        $danhSachDiaChimacDinh = DB::table("location")->where('ID_User', (Auth::id() ?? ""))->get();



        $selectedCartIds = session('selected_products', []);

        $checkCartThuong = DB::table('cart')
            ->where('ID_KhachHang', $userId)
            ->whereIn("id", $selectedCartIds)
            ->first();

        $sanPhamThuong = DB::table("bien_the_san_pham")->where("ID_SanPham", $checkCartThuong->ID_SanPham)->count();

        $sanPhamDaChon = DB::table("cart")
            ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
            ->join("kich_co", "cart.KichCo", "=", "kich_co.TenKichCo")
            ->join("mau_sac", "cart.MauSac", "=", "mau_sac.id")
            ->join("bien_the_san_pham", function ($join) {
                $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                    ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                    ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
            })
            ->select("bien_the_san_pham.SoLuong as soLuongBienThe")
            ->whereIn("cart.id", $selectedCartIds)
            ->where(function ($query) use ($userId) {
                if ($userId) {
                    $query->where("cart.ID_KhachHang", $userId);
                }
            })
            ->selectRaw("cart.id as cart_id, cart.soLuong as SoLuongSanPham, cart.*, bien_the_san_pham.*, san_pham.*, kich_co.*, mau_sac.*, cart.SoLuong * bien_the_san_pham.Gia as ThanhTien")->get();

        $layGiaTienSanPham = DB::table("cart")
            ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
            ->join("bien_the_san_pham", function ($join) {
                $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                    ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                    ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
            })
            ->whereIn("cart.id", $selectedCartIds)
            ->where(function ($query) use ($userId) {
                if ($userId) {
                    $query->where("cart.ID_KhachHang", $userId);
                }
            })
            ->selectRaw(" COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong * bien_the_san_pham.Gia) as tongTien")->first();

        $sanPhamDaChon2 = DB::table("cart")
            ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
            ->whereIn("cart.id", $selectedCartIds)
            ->where("KichCo", "=", null)
            ->where("MauSac", "=", null)
            ->where("cart.ID_KhachHang", $userId)
            ->selectRaw("cart.id as cart_id, cart.soLuong as SoLuongSanPham, cart.*, san_pham.*, cart.SoLuong * san_pham.GiaSanPham as ThanhTien")->get();

        $layGiaTienSanPham2 = DB::table("cart")
            ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
            ->whereIn("cart.id", $selectedCartIds)
            ->where("KichCo", "=", null)
            ->where("MauSac", "=", null)
            ->where("cart.ID_KhachHang", $userId)
            ->selectRaw(" COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong * san_pham.GiaSanPham) as tongTien")->first();

        $tongTien1 = $layGiaTienSanPham->tongTien ?? 0;
        $tongTien2 = $layGiaTienSanPham2->tongTien ?? 0;
        $tongTienSanPhamDaChon = $tongTien1 + $tongTien2;

        return view("clients.ThanhToan.index", compact('orderCode', 'sanPhamThuong', 'danhSachTinhThanh', 'danhSachDiaChimacDinh', 'sanPhamDaChon', 'tongTienSanPhamDaChon', 'sanPhamDaChon2', 'layGiaTienSanPham2'));
    }

    public function payment_store(Request $request)
    {

        if (Auth::check()) {
            $userId = Auth::user()->ID_Guests ?? Auth::user()->id;
        } else {
            return redirect()->back()->with('error', 'Vui Lòng Đăng Nhập Để Thanh Toán');
        }

        DB::beginTransaction();

        $selectedCartIds = session('selected_products', []);

        $sanPhamDaChon = DB::table("cart")
            ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
            ->join("bien_the_san_pham", function ($join) {
                $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                    ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                    ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
            })
            ->join("kich_co", "cart.KichCo", "=", "kich_co.TenKichCo")
            ->join("mau_sac", "cart.MauSac", "=", "mau_sac.id")
            ->whereIn("cart.id", $selectedCartIds)
            ->where(function ($query) use ($userId) {
                if ($userId) {
                    $query->where("cart.ID_KhachHang", $userId);
                }
            })
            ->selectRaw("cart.id as cart_id, cart.SoLuong as SoLuongCart , cart.*, san_pham.*, kich_co.*, mau_sac.*, cart.SoLuong * bien_the_san_pham.Gia as ThanhTien")->get();
        $layGiaTienSanPham = DB::table("cart")
            ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
            ->join("bien_the_san_pham", function ($join) {
                $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                    ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                    ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
            })
            ->whereIn("cart.id", $selectedCartIds)
            ->where(function ($query) use ($userId) {
                if ($userId) {
                    $query->where("cart.ID_KhachHang", $userId);
                }
            })
            ->selectRaw(" COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong * bien_the_san_pham.Gia) as tongTien")->first();

        $tinhPhanTram = 0;
        $sanPhamDaChon2 = DB::table("cart")
            ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
            ->whereIn("cart.id", $selectedCartIds)
            ->where("KichCo", "=", null)
            ->where("MauSac", "=", null)
            ->where("cart.ID_KhachHang", $userId)
            ->selectRaw("cart.id as cart_id, cart.soLuong as SoLuongSanPham, cart.*, san_pham.*, cart.SoLuong * san_pham.GiaSanPham as ThanhTien")->get();

        $layGiaTienSanPham2 = DB::table("cart")
            ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
            ->whereIn("cart.id", $selectedCartIds)
            ->where("KichCo", "=", null)
            ->where("MauSac", "=", null)
            ->where("cart.ID_KhachHang", $userId)
            ->selectRaw(" COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong * san_pham.GiaSanPham) as tongTien")->first();

        $tongTien1 = $layGiaTienSanPham->tongTien ?? 0;
        $tongTien2 = $layGiaTienSanPham2->tongTien ?? 0;
        $tongTienSanPhamDaChon = $tongTien1 + $tongTien2;

        if (!$request->input("location")):
            return response()->json([
                "status" => "error",
                "message" => "Vui Lòng Thêm Địa Chỉ Nhận Hàng"
            ]);
        endif;

        if ($request->input("voucher")):
            $discount = DB::table('magiamgia')->where('name', $request->input('voucher'))->first();
            if (!$discount):
                return response()->json([
                    "status" => "error",
                    "message" => "Mã giảm giá không hợp lệ!"
                ]);
            endif;

            if ($tongTienSanPhamDaChon < $discount->min_value):
                return response()->json([
                    "status" => "error",
                    "message" => 'Áp Dụng Tối Thiểu Là ' . number_format($discount->min_value) . 'đ'
                ]);
            endif;

            if (time() < strtotime($discount->start_date . ' 00:00:00') || time() > strtotime($discount->end_date . ' 23:59:59')):
                return response()->json([
                    "status" => "error",
                    "message" => 'Mã Giảm Giá Đã Hết Hạn Sử Dụng'
                ]);
            endif;

            $kiemTraSuDung = DB::table('su_dung_ma_giam_gia')->where('ID_User', Auth::user()->id)->where('MaGiamGia', $request->input('voucher'))->first();

            if ($kiemTraSuDung):
                return response()->json([
                    "status" => "error",
                    "message" => 'Mã Giảm Giá Đã Được Sử Dụng'
                ]);
            endif;

            $soLanSuDung = DB::table('su_dung_ma_giam_gia')->where('MaGiamGia', $request->input('voucher'))->count();
            if ($soLanSuDung > $discount->quantity):
                return response()->json([
                    "status" => "error",
                    "message" => 'Mã Giảm Giá Hết Lượt Sử Dụng'
                ]);
            endif;

            $tinhPhanTram = ($tongTienSanPhamDaChon * $discount->value) / 100;
            $tinhPhanTram = min($tinhPhanTram, $discount->max_value);
            $tongTienSanPhamDaChon = max(0, ceil($tongTienSanPhamDaChon - $tinhPhanTram));
        endif;

        $trading = strtoupper(Str::random(8));

        if (!$request->input('termsAndServices') || $request->input('termsAndServices') !== "on"):
            return response()->json([
                "status" => "error",
                "message" => "Vui Lòng Chấp Nhận Điều Khoản Và Dịch Vụ"
            ]);
        endif;
        
        if ($request->input("method") == "COD"):
            DB::table("don_hang")->insert([
                "orderCode" => time(),
                "MaDonHang" => $trading,
                "ID_User" => Auth::user()->id,
                "TrangThai" => "choxacnhan",
                "PhuongThucThanhToan" => "Thanh Toán Khi Nhận Hàng",
                "DiaChiNhan" => $request->input("location"),
                "TongTien" => $tongTienSanPhamDaChon,
                "GiamGia" => $tinhPhanTram,
                "MaGiamGia" => ($request->input('voucher') ?? ""),
                "GhiChu" => $request->input("message"),
                "created_at" => date("Y-m-d H:i:s"),
            ]);
            
            foreach ($sanPhamDaChon as $cart):
                $thongTinBienThe = DB::table("bien_the_san_pham")->where("ID_SanPham", $cart->ID_SanPham)
                    ->where("ID_MauSac", DB::table("mau_sac")->where("id", $cart->MauSac)->first()->id)
                    ->where("KichCo", $cart->KichCo)->first();

                if ($thongTinBienThe->SoLuong >= 1):
                    DB::table("san_pham_don_hang")->insert([
                        "MaDonHang" => $trading,
                        "Id_SanPham" => $cart->ID_SanPham,
                        "KichCo" => $cart->KichCo,
                        "MauSac" => DB::table("mau_sac")->where("id", $cart->MauSac)->first()->TenMauSac,
                        "GiaTien" => $thongTinBienThe->Gia * $cart->SoLuongCart,
                        "SoLuong" => $cart->SoLuongCart,
                        "created_at" => date("Y-m-d H:i:s"),
                    ]);

                    DB::table("bien_the_san_pham")
                        ->where("ID_SanPham", $cart->ID_SanPham)
                        ->where("ID_MauSac", DB::table("mau_sac")->where("id", $cart->MauSac)->first()->id)
                        ->where("KichCo", $cart->KichCo)
                        ->update([
                            "SoLuong" => $thongTinBienThe->SoLuong - $cart->SoLuong
                        ]);
                endif;
            endforeach;

           
            foreach ($sanPhamDaChon2 as $cart):
                $thongTinSanPham = DB::table("san_pham")->where("id", $cart->ID_SanPham)->first();

                if ($thongTinSanPham->SoLuong >= 1):
                    DB::table("san_pham_don_hang")->insert([
                        "MaDonHang" => $trading,
                        "Id_SanPham" => $thongTinSanPham->id,
                        "GiaTien" => $thongTinSanPham->GiaSanPham,
                        "SoLuong" => $cart->SoLuong,
                        "created_at" => date("Y-m-d H:i:s"),
                    ]);

                    DB::table("san_pham")
                        ->where("id", $thongTinSanPham->id)
                        ->update([
                            "SoLuong" => $thongTinSanPham->SoLuong - $cart->SoLuong
                        ]);
                endif;
            endforeach;

            if ($request->input("voucher")):
                DB::table("su_dung_ma_giam_gia")->insert([
                    "ID_User" => Auth::user()->id,
                    "MaGiamGia" => $request->input('voucher'),
                    "created_at" => date("Y-m-d H:i:s"),
                ]);
            endif;

            DB::table("cart")->where("ID_KhachHang", (Auth::user()->ID_Guests ?? Auth::user()->id))->whereIn("cart.id", $selectedCartIds)->delete();

            DB::commit();

            Session::forget('order_code');

            return response()->json([
                "status" => "success",
                "message" => "Tạo Đơn Hàng Thành Công!",
                'redirect' => route('payment.success', $trading)
            ]);
        elseif ($request->input("method") == "Banking"):

            $PayOS = DB::table("pay_os")->where("id", 1)->first();
            $apiKey = $PayOS->API_Key;
            $clientId = $PayOS->Client_ID;
            $checksumKey = $PayOS->Checksum_Key;
            $orderCode = time();

            $data = [
                "amount" => (int) $tongTienSanPhamDaChon,
                "cancelUrl" => route('payos.cancel'),
                "description" => $trading,
                "orderCode" => $orderCode,
                "returnUrl" => url('/payos/callback'),
            ];

            $signatureString = "amount={$data['amount']}&cancelUrl={$data['cancelUrl']}&description={$data['description']}&orderCode={$data['orderCode']}&returnUrl={$data['returnUrl']}";
            $signature = hash_hmac('sha256', $signatureString, $checksumKey);
            $data["signature"] = $signature;

            $response = Http::withHeaders([
                "x-client-id" => $clientId,
                "x-api-key" => $apiKey,
                "Content-Type" => "application/json"
            ])->post("https://api-merchant.payos.vn/v2/payment-requests", $data);
            $result = $response->json();

            if (isset($result['data']['checkoutUrl'])) {

                $selectedCartIds = session('selected_products', []);

                DB::table("don_hang")->insert([
                    "orderCode" => $orderCode,
                    "MaDonHang" => $trading,
                    "ID_User" => Auth::user()->id,
                    "TrangThai" => "chuathanhtoan",
                    "PhuongThucThanhToan" => "Chuyển Khoản Ngân Hàng",
                    "DiaChiNhan" => $request->input("location"),
                    "TongTien" => $tongTienSanPhamDaChon,
                    "GiamGia" => $tinhPhanTram,
                    "MaGiamGia" => ($request->input('voucher') ?? ""),
                    "GhiChu" => $request->input("message"),
                    "created_at" => date("Y-m-d H:i:s"),
                ]);

                foreach ($sanPhamDaChon as $cart):
                    $thongTinBienThe = DB::table("bien_the_san_pham")->where("ID_SanPham", $cart->ID_SanPham)
                        ->where("ID_MauSac", DB::table("mau_sac")->where("id", $cart->MauSac)->first()->id)
                        ->where("KichCo", $cart->KichCo)->first();
    
                    if ($thongTinBienThe->SoLuong >= 1):
                        DB::table("san_pham_don_hang")->insert([
                            "MaDonHang" => $trading,
                            "Id_SanPham" => $cart->ID_SanPham,
                            "KichCo" => $cart->KichCo,
                            "MauSac" => DB::table("mau_sac")->where("id", $cart->MauSac)->first()->TenMauSac,
                            "GiaTien" => $thongTinBienThe->Gia * $cart->SoLuongCart,
                            "SoLuong" => $cart->SoLuongCart,
                            "created_at" => date("Y-m-d H:i:s"),
                        ]);
    
                        DB::table("bien_the_san_pham")
                            ->where("ID_SanPham", $cart->ID_SanPham)
                            ->where("ID_MauSac", DB::table("mau_sac")->where("id", $cart->MauSac)->first()->id)
                            ->where("KichCo", $cart->KichCo)
                            ->update([
                                "SoLuong" => $thongTinBienThe->SoLuong - $cart->SoLuong
                            ]);
                    endif;
                endforeach;
    
    
                foreach ($sanPhamDaChon2 as $cart):
                    $thongTinSanPham = DB::table("san_pham")->where("id", $cart->ID_SanPham)->first();
    
                    if ($thongTinSanPham->SoLuong >= 1):
                        DB::table("san_pham_don_hang")->insert([
                            "MaDonHang" => $trading,
                            "Id_SanPham" => $thongTinSanPham->id,
                            "GiaTien" => $thongTinSanPham->GiaSanPham,
                            "SoLuong" => $cart->SoLuong,
                            "created_at" => date("Y-m-d H:i:s"),
                        ]);
    
                        DB::table("san_pham")
                            ->where("id", $thongTinSanPham->id)
                            ->update([
                                "SoLuong" => $thongTinSanPham->SoLuong - $cart->SoLuong
                            ]);
                    endif;
                endforeach;

                if ($request->input("voucher")):
                    DB::table("su_dung_ma_giam_gia")->insert([
                        "ID_User" => Auth::user()->id,
                        "MaGiamGia" => $request->input('voucher'),
                        "created_at" => date("Y-m-d H:i:s"),
                    ]);
                endif;

                DB::table("cart")->where("ID_KhachHang", (Auth::user()->ID_Guests ?? Auth::user()->id))->whereIn("cart.id", $selectedCartIds)->delete();

                DB::commit();

                Session::forget('order_code');

                return response()->json([
                    "status" => "success",
                    "message" => "Tạo Đơn Hàng Thành Công!",
                    'redirect' => $result['data']['checkoutUrl']
                ]);
            } else {
                return redirect()->back()->with('error', 'Lỗi, Vui Lòng Thanh Toán Lại');
            }
        endif;
    }

    public function payment_success($trading)
    {
        return view("clients.ThanhToan.ThanhToanThanhCong", compact("trading"));
    }
}
