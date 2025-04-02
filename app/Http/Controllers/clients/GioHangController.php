<?php

namespace App\Http\Controllers\clients;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\clients\cartRequest;

class GioHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.GioHang.GioHang');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->action === 'add_to_cart') {
            DB::beginTransaction();

            if (Auth::check()) {
                $userId = Auth::user()->ID_Guests ?? Auth::user()->id;
            } else {
                $userId = request()->cookie('ID_Guests', Str::uuid());
                Cookie::queue('ID_Guests', $userId, 60 * 24 * 365);
            }

            $checkCart = DB::table('cart')
                ->where('ID_KhachHang', $userId)
                ->where("ID_SanPham", $request->input("id_product"))
                ->where("KichCo", $request->input("size"))
                ->where("MauSac", $request->input("color"))
                ->first();

            if (!$request->input("quantity")) {
                return response()->json([
                    "status" => "error",
                    "message" => "Vui Lòng Nhập Số Lượng"
                ]);
            }

            if ($request->input("quantity") <= 0) {
                return response()->json([
                    "status" => "error",
                    "message" => "Số Lượng Tối Thiểu Là 1"
                ]);
            }

            $soLuongBienTheSanPham = DB::table("bien_the_san_pham")
                ->where("ID_SanPham", $request->input("id_product"))
                ->count();
            if ($soLuongBienTheSanPham >= 1) {
                if (!$request->input("size")) {
                    return response()->json([
                        "status" => "error",
                        "message" => "Vui Lòng Chọn Kích Cỡ"
                    ]);
                }

                if (!$request->input("color")) {
                    return response()->json([
                        "status" => "error",
                        "message" => "Vui Lòng Chọn Màu Sắc"
                    ]);
                }

                if ($checkCart) {
                    $thongTinBienThe = DB::table("bien_the_san_pham")->where("ID_SanPham", $request->input("id_product"))
                        ->where("ID_MauSac", DB::table("mau_sac")->where("id", $checkCart->MauSac)->first()->id)
                        ->where("KichCo", $checkCart->KichCo)->first();
                    if ($request->input("quantity") > $thongTinBienThe->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Sản Phẩm Chỉ Còn " . number_format($thongTinBienThe->SoLuong)
                        ]);
                    }

                    if ($checkCart->SoLuong >= $thongTinBienThe->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Bạn đã có " . number_format($checkCart->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                        ]);
                    }

                    $congSoLuong = $checkCart->SoLuong + $request->input("quantity");
                    if ($congSoLuong > $thongTinBienThe->SoLuong) {
                        $congSoLuong = $thongTinBienThe->SoLuong;
                    }

                    DB::table("cart")->where("id", $checkCart->id)->update([
                        "SoLuong" => $congSoLuong
                    ]);

                    DB::commit();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Đã cập nhật giỏ hàng!',
                        'redirect' => route('gio-hang.index')
                    ]);
                } else {
                    DB::table("cart")->insert([
                        "ID_KhachHang" => $userId,
                        "ID_SanPham" => $request->input("id_product"),
                        "KichCo" => $request->input("size"),
                        "MauSac" => $request->input("color"),
                        "SoLuong" => $request->input("quantity"),
                        "Xoa" => "0",
                        "created_at" => now()
                    ]);

                    $thongTinGioHangMoi = DB::table('cart')
                        ->where('ID_KhachHang', $userId)
                        ->where("ID_SanPham", $request->input("id_product"))
                        ->where("KichCo", $request->input("size"))
                        ->where("MauSac", $request->input("color"))
                        ->first();

                    $thongTinBienThe = DB::table("bien_the_san_pham")->where("ID_SanPham", $thongTinGioHangMoi->ID_SanPham)
                        ->where("ID_MauSac", DB::table("mau_sac")->where("id", $thongTinGioHangMoi->MauSac)->first()->id)
                        ->where("KichCo", $thongTinGioHangMoi->KichCo)->first();

                    if ($request->input("quantity") > $thongTinBienThe->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Sản Phẩm Chỉ Còn " . number_format($thongTinBienThe->SoLuong)
                        ]);
                    }
                    if ($thongTinGioHangMoi->SoLuong >= $thongTinBienThe->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Bạn đã có " . number_format($thongTinGioHangMoi->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                        ]);
                    }

                    DB::commit();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Đã thêm sản phẩm vào giỏ hàng!',
                        'redirect' => route('gio-hang.index')
                    ]);
                }
            } else {
                if ($checkCart) {
                    $thongTinBienThe = DB::table("bien_the_san_pham")->where("ID_SanPham", $request->input("id_product"))
                        ->where("ID_MauSac", DB::table("mau_sac")->where("id", $checkCart->MauSac)->first()->id)
                        ->where("KichCo", $checkCart->KichCo)->first();
                    if ($request->input("quantity") > $thongTinBienThe->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Sản Phẩm Chỉ Còn " . number_format($thongTinBienThe->SoLuong)
                        ]);
                    }

                    if ($checkCart->SoLuong >= $thongTinBienThe->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Bạn đã có " . number_format($checkCart->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                        ]);
                    }

                    $congSoLuong = $checkCart->SoLuong + $request->input("quantity");
                    if ($congSoLuong > $thongTinBienThe->SoLuong) {
                        $congSoLuong = $thongTinBienThe->SoLuong;
                    }

                    DB::table("cart")->where("id", $checkCart->id)->update([
                        "SoLuong" => $congSoLuong
                    ]);

                    DB::commit();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Đã cập nhật giỏ hàng!'
                    ]);
                } else {
                    DB::table("cart")->insert([
                        "ID_KhachHang" => $userId,
                        "ID_SanPham" => $request->input("id_product"),
                        "KichCo" => $request->input("size"),
                        "MauSac" => $request->input("color"),
                        "SoLuong" => $request->input("quantity"),
                        "Xoa" => "0",
                        "created_at" => now()
                    ]);

                    $thongTinGioHangMoi = DB::table('cart')
                        ->where('ID_KhachHang', $userId)
                        ->where("ID_SanPham", $request->input("id_product"))
                        ->where("KichCo", $request->input("size"))
                        ->where("MauSac", $request->input("color"))
                        ->first();

                    $thongTinBienThe = DB::table("bien_the_san_pham")->where("ID_SanPham", $thongTinGioHangMoi->ID_SanPham)
                        ->where("ID_MauSac", DB::table("mau_sac")->where("id", $thongTinGioHangMoi->MauSac)->first()->id)
                        ->where("KichCo", $thongTinGioHangMoi->KichCo)->first();

                    if ($request->input("quantity") > $thongTinBienThe->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Sản Phẩm Chỉ Còn " . number_format($thongTinBienThe->SoLuong)
                        ]);
                    }
                    if ($thongTinGioHangMoi->SoLuong >= $thongTinBienThe->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Bạn đã có " . number_format($thongTinGioHangMoi->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                        ]);
                    }

                    DB::commit();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Đã thêm sản phẩm vào giỏ hàng!'
                    ]);
                }
            }
        } elseif ($request->action === 'buy_now') {
            DB::beginTransaction();

            if (Auth::check()) {
                $userId = Auth::user()->ID_Guests ?? Auth::user()->id;
            } else {
                $userId = request()->cookie('ID_Guests', Str::uuid());
                Cookie::queue('ID_Guests', $userId, 60 * 24 * 365);
            }

            $checkCart = DB::table('cart')
                ->where('ID_KhachHang', $userId)
                ->where("ID_SanPham", $request->input("id_product"))
                ->where("KichCo", $request->input("size"))
                ->where("MauSac", $request->input("color"))
                ->first();

            if ($checkCart) {
                DB::table("cart")->where("id", $checkCart->id)->update([
                    "SoLuong" => $checkCart->SoLuong + $request->input("quantity")
                ]);

                $layLaiThongTin = DB::table('cart')
                    ->where('ID_KhachHang', $userId)
                    ->where("ID_SanPham", $request->input("id_product"))
                    ->where("KichCo", $request->input("size"))
                    ->where("MauSac", $request->input("color"))
                    ->first();

                $orderCode = strtoupper(Str::random(40));
                Session::put('order_code', $orderCode);
                session()->forget('selected_products');
                session([
                    'selected_products' => [
                        $layLaiThongTin->id
                    ]
                ]);

                DB::commit();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Chuyển đến trang thanh toán!',
                    'type' => 'payment',
                    'redirect' => route('payent', $orderCode)
                ]);
            } else {
                DB::table("cart")->insert([
                    "ID_KhachHang" => $userId,
                    "ID_SanPham" => $request->input("id_product"),
                    "KichCo" => $request->input("size"),
                    "MauSac" => $request->input("color"),
                    "SoLuong" => $request->input("quantity"),
                    "Xoa" => "0",
                    "created_at" => now()
                ]);

                $layLaiThongTin = DB::table('cart')
                    ->where('ID_KhachHang', $userId)
                    ->where("ID_SanPham", $request->input("id_product"))
                    ->where("KichCo", $request->input("size"))
                    ->where("MauSac", $request->input("color"))
                    ->first();

                $orderCode = strtoupper(Str::random(40));
                Session::put('order_code', $orderCode);
                session()->forget('selected_products');
                session([
                    'selected_products' => [
                        $layLaiThongTin->id
                    ]
                ]);

                DB::commit();

                return response()->json([
                    'status' => 'success',
                    'type' => 'payment',
                    'message' => 'Chuyển đến trang thanh toán!',
                    'redirect' => route('payent', $orderCode)
                ]);
            }
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Hành động không hợp lệ!'
        ], 400);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::check()) {
            $userId = Auth::user()->ID_Guests ?? Auth::user()->id;
        } else {
            $userId = request()->cookie('ID_Guests', Str::uuid());
            Cookie::queue('ID_Guests', $userId, 60 * 24 * 365);
        }

        $cart = DB::table("cart")->find($id);
        if (!$cart):
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 500);
        endif;

        $cartUpdate = DB::table("cart")
            ->join("bien_the_san_pham", function ($join) {
                $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                    ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                    ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
            })
            ->where("cart.id", $id)
            ->first();

        $checkBienThe = DB::table("bien_the_san_pham")->where("ID_SanPham", $cartUpdate->ID_SanPham)->where("ID_MauSac", $cartUpdate->MauSac)->where("KichCo", $cartUpdate->KichCo)->first();
        $layMauBienThe = DB::table("mau_sac")->where("id", $checkBienThe->ID_MauSac)->first();

        $money = $request->input("quantity") * $cartUpdate->Gia;

        $layGiaTienSanPham = DB::table("cart")
            ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
            ->join("bien_the_san_pham", function ($join) {
                $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                    ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                    ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
            })
            ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
            ->where("bien_the_san_pham.SoLuong", ">", 0)
            ->selectRaw("COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong) as soLuongSP, SUM(cart.SoLuong * bien_the_san_pham.Gia) as tongTien")
            ->first();

        DB::table("cart")->where("id", $id)->update([
            "SoLuong" => $request->input("quantity")
        ]);

        if ($checkBienThe->SoLuong <= 0) {
            DB::table("cart")->where("id", $id)->update([
                "SoLuong" => 1
            ]);

            return response()->json([
                'status' => "error",
                'message' => 'Kích Cỡ ' . $cartUpdate->KichCo . ' - ' . $layMauBienThe->TenMauSac . " Đã Hết, Vui Lòng Chọn Màu Khác",
                'id' => $id,
                'total' => $money,
                'total_cart' => $layGiaTienSanPham
            ]);
        }
        return response()->json([
            'status' => "success",
            'message' => 'Cập nhật thành công',
            'id' => $id,
            'total' => $money,
            'total_cart' => $layGiaTienSanPham
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = DB::table("cart")->find($id);
        if (!$cart) {
            return back()->with("error", "Sản Phẩm Trong Giỏ Hàng Không Tồn Tại Hoặc Đã Bị Xóa");
        }

        DB::table("cart")->where("id", $id)->delete();

        return back()->with("success", "Sản Phẩm Trong Giỏ Hàng Đã Được Xóa");
    }
}
