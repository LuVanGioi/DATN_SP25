<?php

namespace App\Http\Controllers\clients;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
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
    public function store(cartRequest $request)
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

            if ($checkCart) {
                DB::table("cart")->where("id", $checkCart->id)->update([
                    "SoLuong" => $checkCart->SoLuong + $request->input("quantity")
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

                DB::commit();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Đã thêm sản phẩm vào giỏ hàng!',
                    'redirect' => route('gio-hang.index')
                ]);
            }
        } elseif ($request->action === 'payment') {
            DB::beginTransaction();

            return response()->json([
                'status' => 'success',
                'message' => 'Chuyển đến trang thanh toán!',
                'redirect' => route('gio-hang.index')
            ]);
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

        DB::table("cart")->where("id", $id)->update([
            "SoLuong" => $request->input("quantity")
        ]);

        $cartUpdate = DB::table("cart")->find($cart->id);
        $productUpdate = DB::table("san_pham")->find($cartUpdate->ID_SanPham);
        $money = $cartUpdate->SoLuong * $productUpdate->GiaSanPham;

        $layGiaTienSanPham = DB::table("cart")
            ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
            ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
            ->selectRaw("COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong) as soLuongSP, SUM(cart.SoLuong * san_pham.GiaSanPham) as tongTien")
            ->first();

        return response()->json([
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
