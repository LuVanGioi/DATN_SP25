<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChiTietHuyDonController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
        } else {
            return redirect()->route('login')->with('error', 'Vui Lòng Đăng Nhập');
        }

       
        $lichSu = DB::table('don_hang')
            ->join('location', 'don_hang.DiaChiNhan', '=', 'location.id')
            ->join('huyen', 'location.Huyen', '=', 'huyen.MaHuyen')
            ->join('tinh_thanh', 'location.Tinh', '=', 'tinh_thanh.IdTinh')
            ->where('don_hang.ID_User', $userId)
            ->where('don_hang.TrangThai', 'choxacnhan')
            ->selectRaw('don_hang.TrangThai as TrangThaiDonHang, don_hang.*,huyen.*,tinh_thanh.*,location.*')
            ->get();

        if (!$lichSu) {
            return redirect()->route('DonHang.index')->with('error', 'Không tìm thấy đơn hàng hoặc đơn hàng không thể hủy.');
        }
        $donHangHuy = DB::table('san_pham_don_hang')
        ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
        ->where('san_pham_don_hang.MaDonHang', $lichSu[1]->MaDonHang) 
        ->select('san_pham.*', 'san_pham_don_hang.*')
        ->get();

        return view("clients.HuyDonHang.ChiTietHuyDon", compact('lichSu', 'donHangHuy'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
    public function update(Request $request, string $id) {}
}
