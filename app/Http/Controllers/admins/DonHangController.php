<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donHang = DB::table('don_hang')
        ->join('users', 'don_hang.ID_User', '=', 'users.id')
        ->join('san_pham_don_hang', 'don_hang.MaDonHang', '=', 'san_pham_don_hang.MaDonHang')
        ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
        ->select(
        'don_hang.*', 
        'san_pham.TenSanPham', 
        'san_pham.GiaSanPham', 
        'san_pham_don_hang.KichCo', 
        'san_pham_don_hang.MauSac', 
        'san_pham_don_hang.GiaTien', 
        'san_pham_don_hang.SoLuong'
    )
    ->get();
    dd($donHang);   
    return view('admins.DonHang.danhSach',compact('donHang'));
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admins.DonHang.chiTiet', ['id' => $id]);
    }

}
