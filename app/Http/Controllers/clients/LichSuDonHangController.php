<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LichSuDonHangController extends Controller
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
            ->selectRaw('don_hang.TrangThai as TrangThaiDonHang, don_hang.*,huyen.*,tinh_thanh.*,location.*')->orderBygit ('don_hang.MaDonHang')->get();

        if (!$lichSu) {
            return redirect()->route('DonHang.index')->with('error', 'Bạn chưa có đơn hàng nào.');
        }
        return view('clients.ThongTinTaiKhoan.LichSuDonHang', compact('lichSu'));
    }

    public function show(string $id)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
        } else {
            return redirect()->route('login')->with('error', 'Vui Lòng Đăng Nhập');
        }

        $chiTietDonHang = DB::table('don_hang')
            ->join('location', 'don_hang.DiaChiNhan', '=', 'location.id')
            ->join('san_pham_don_hang', 'don_hang.MaDonHang', '=', 'san_pham_don_hang.MaDonHang')
            ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
            ->join('huyen', 'location.Huyen', '=', 'huyen.MaHuyen')
            ->join('tinh_thanh', 'location.Tinh', '=', 'tinh_thanh.IdTinh')
            ->where('don_hang.ID_User', $userId)
            ->where('don_hang.MaDonHang', $id)
            ->selectRaw('don_hang.TrangThai as TrangThaiDonHang,don_hang.*,san_pham_don_hang.*,huyen.*,tinh_thanh.*,san_pham.*,location.*')->first();

        $sanPhamMua = DB::table('san_pham_don_hang')
            ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
            ->where('MaDonHang', $id)->select('san_pham.*', 'san_pham_don_hang.*')->get();

        if (!$chiTietDonHang) {
            return redirect()->route('DonHang.index')->with('error', 'Bạn chưa có đơn hàng nào.');
        }

        return view('clients.ThongTinTaiKhoan.ChiTietDonHang', compact('chiTietDonHang', 'sanPhamMua'));
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
