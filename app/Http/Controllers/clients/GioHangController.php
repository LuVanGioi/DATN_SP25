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
                $userId = Auth::user()->id;
            } else {
                $userId = request()->cookie('ID_KhachHang', Str::uuid());
                Cookie::queue('ID_KhachHang', $userId, 60 * 24 * 365);
            }

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
        } elseif ($request->action === 'buy_now') {
            return redirect()->route('gio-hang.index')->with('success', 'Chuyển đến thanh toán!');
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
        //
    }
}
