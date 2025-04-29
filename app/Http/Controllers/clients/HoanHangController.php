<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HoanHangController extends Controller
{
    public function show(string $id)
    {
        $sanPhamMua = DB::table("san_pham_don_hang")
            ->where("san_pham_don_hang.MaDonHang", $id)
            ->where(function ($query) {
                $query->where('san_pham_don_hang.TrangThai', '!=', 'hoanhang')
                    ->orWhereNull('san_pham_don_hang.TrangThai');
            })
            ->join("san_pham", "san_pham_don_hang.Id_SanPham", "=", "san_pham.id")
            ->selectRaw("san_pham_don_hang.SoLuong as SoLuongMua, san_pham_don_hang.*, san_pham.*")
            ->get();

        if (!$sanPhamMua) {
            return redirect()->route("lich-su-don-hang.index")->with("error", "Không Có Sản Phẩm Để Hủy");
        }

        $donHang = DB::table("don_hang")->where("MaDonHang", $id)->first();

        if (!$donHang) {
            return redirect()->route("lich-su-don-hang.index")->with("error", "Đơn Hàng Không Tồn Tại");
        }

        return view("clients.HoanHang.index", compact("id", "sanPhamMua", "donHang"));
    }

    public function edit(Request $request, string $id)
    {
        $chiTietDonHang = DB::table("don_hang")->where("MaDonHang", $id)->first();

        if (!$chiTietDonHang) {
            return redirect()->route("lich-su-don-hang.index")->with("error", "Đơn Hàng Không Tồn Tại");
        }

        $sanPhamMua = DB::table("san_pham_don_hang")
            ->where("san_pham_don_hang.MaDonHang", $id)
            ->where(function ($query) {
                $query->where('san_pham_don_hang.TrangThai', '=', 'hoanhang')
                    ->orWhereNull('san_pham_don_hang.TrangThai');
            })
            ->join("san_pham", "san_pham_don_hang.Id_SanPham", "=", "san_pham.id")
            ->selectRaw("san_pham_don_hang.SoLuong as SoLuongMua, san_pham_don_hang.*, san_pham.*")
            ->get();

        $hinhAnh = DB::table("hinh_anh_huy_don")->where("MaDonHang", $id)->get();

        return view("clients.HoanHang.detail", compact("id", "sanPhamMua", "chiTietDonHang", "hinhAnh"));
    }
}
