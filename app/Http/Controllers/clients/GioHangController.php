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

                return back()->with('success', 'Đã Cập Nhật Giỏ Hàng!');
            } else {
                DB::table("cart")->insert([
                    "ID_KhachHang" => $userId,
                    "ID_SanPham" => $request->input("id_product"),
                    "KichCo" => $request->input("size"),
                    "MauSac" => $request->input("color"),
                    "SoLuong" => $request->input("quantity"),
                    "Xoa" => "0",
                    "created_at" => date("Y/m/d H:i:s")
                ]);

                DB::commit();

                return back()->with('success', 'Đã Thêm Sản Phẩm Vào Giỏ Hàng!');
            }
        } elseif ($request->action === 'payment') {
            DB::beginTransaction();
            
            dd($request->all());

            //return redirect()->route('gio-hang.index')->with('success', 'Chuyển đến thanh toán!');
        }

        return back()->with('error', 'Hành động không hợp lệ!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = DB::table("cart")->find($id);
        if(!$cart) {
            return back()->with("error","Sản Phẩm Trong Giỏ Hàng Không Tồn Tại Hoặc Đã Bị Xóa");
        }

        DB::table("cart")->where("id", $id)->delete();

        return back()->with("success","Sản Phẩm Trong Giỏ Hàng Đã Được Xóa");
    }
}
