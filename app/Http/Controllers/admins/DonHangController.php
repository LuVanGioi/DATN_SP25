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
            ->select('don_hang.MaDonHang','don_hang.TrangThai as TrangThai','don_hang.PhuongThucThanhToan','don_hang.TrangThaiThanhToan',
            )
            ->groupBy(
                'don_hang.MaDonHang',
                'don_hang.TrangThai',
                'don_hang.PhuongThucThanhToan',
                'don_hang.TrangThai'
            )
            ->get();
                
        return view('admins.DonHang.danhSach', compact('donHang'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $donHang = DB::table('don_hang')
            ->join('location', 'don_hang.DiaChiNhan', '=', 'location.id')
            ->join('san_pham_don_hang', 'don_hang.MaDonHang', '=', 'san_pham_don_hang.MaDonHang')
            ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
            ->join('huyen', 'location.Huyen', '=', 'huyen.MaHuyen')
            ->join('tinh_thanh', 'location.Tinh', '=', 'tinh_thanh.IdTinh')
            ->where('don_hang.MaDonHang', $id)


            ->selectRaw('don_hang.TrangThai as TrangThaiDonHang,don_hang.*,san_pham_don_hang.*,huyen.*,tinh_thanh.*,san_pham.*,location.*')->first();
        $sanPhamMua = DB::table('san_pham_don_hang')
            ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
            ->where('san_pham_don_hang.MaDonHang', $id)
            ->select(
                'san_pham_don_hang.Id_SanPham',
                'san_pham.TenSanPham',
                'san_pham.DuongDan',
                'san_pham.HinhAnh',
                'san_pham_don_hang.KichCo',
                'san_pham_don_hang.MauSac',
                DB::raw('SUM(san_pham_don_hang.SoLuong) as SoLuong'),
                DB::raw('SUM(san_pham_don_hang.GiaTien) as GiaTien')
            )
            ->groupBy(
                'san_pham_don_hang.Id_SanPham',
                'san_pham.TenSanPham',
                'san_pham.DuongDan',
                'san_pham.HinhAnh',
                'san_pham_don_hang.KichCo',
                'san_pham_don_hang.MauSac'
            )
            ->get();
        if (!$donHang) {
            return redirect()->route('DonHang.index')->with('error', 'Đơn hàng không tồn tại.');
        }

        return view('admins.DonHang.chiTiet', compact('donHang', 'sanPhamMua'), ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        DB::table('don_hang')->where('MaDonHang', $id)->update([
            'TrangThai' => $request->input('TrangThai'),
        ]);

        DB::commit();

        return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
    }
}
