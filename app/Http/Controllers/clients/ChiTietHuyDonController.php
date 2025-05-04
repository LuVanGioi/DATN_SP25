<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;

class ChiTietHuyDonController extends Controller
{
    public function edit(string $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thực hiện chức năng này');
        }

        $userId = Auth::user()->id;

        $donHang = DB::table('don_hang')
            ->where('MaDonHang', $id)
            ->where('ID_User', $userId)
            ->first();

        if (!$donHang) {
            return redirect()->route('DonHang.index')
                ->with('error', 'Không tìm thấy đơn hàng hoặc bạn không có quyền truy cập đơn hàng này');
        }


        if ($donHang->TrangThai !== 'choxacnhan') {
            return redirect()->route('DonHang.index')
                ->with('error', 'Đơn hàng này không thể hủy vì đã được xử lý hoặc đang trong quá trình vận chuyển');
        }

        $donHangHuy = DB::table('san_pham_don_hang')
            ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
            ->where('san_pham_don_hang.MaDonHang', $id)
            ->selectRaw('san_pham.id as idSP, san_pham.*, san_pham_don_hang.*')
            ->get();

            
        return view("clients.HuyDonHang.HuyDon", compact('donHangHuy', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                "status" => "error",
                "message" => "Vui lòng đăng nhập để thực hiện chức năng này"
            ]);
        }

        $userId = Auth::user()->id;

        $donHang = DB::table('don_hang')
            ->where('MaDonHang', $request->input("id"))
            ->where('ID_User', $userId)
            ->first();

        if (!$donHang) {
            return response()->json([
                "status" => "error",
                "message" => "Không tìm thấy đơn hàng hoặc bạn không có quyền truy cập đơn hàng này"
            ]);
        }
        
        if (empty($request->input("ly_do_huy"))) {
            return response()->json([
                "status" => "error",
                "message" => "Vui lòng nhập lý do hủy đơn "
            ]);
        }

        if ($donHang->TrangThai !== 'choxacnhan') {
            return response()->json([
                "status" => "error",
                "message" => "Đơn hàng này không thể hủy vì đã được xử lý hoặc đang trong quá trình vận chuyển"
            ]);
        }

        DB::beginTransaction();

        $updateOrder = DB::table('don_hang')
            ->where('MaDonHang', $request->input("id"))
            ->update([
                'TrangThai' => 'huydon',
                'LyDoHuy' => $request->ly_do_huy
            ]);

        if (!$updateOrder) {
            return response()->json([
                "status" => "error",
                "message" => "Không thể cập nhật trạng thái đơn hàng"
            ]);
        }

        $sanPhamDonHang = DB::table('san_pham_don_hang')
            ->where('MaDonHang', $request->input("id"))
            ->get();

        foreach ($sanPhamDonHang as $item) {
            $sanPham = DB::table('san_pham')
                ->where('id', $item->Id_SanPham)
                ->first();
            if ($sanPham->TheLoai == "bienThe") {
                $bienThe = DB::table('bien_the_san_pham')
                    ->where('ID_SanPham', $sanPham->id)
                    ->where('KichCo', $item->KichCo)
                    ->where('ID_MauSac', DB::table("mau_sac")->where("TenMauSac", $item->MauSac)->first()->id)
                    ->first();
                $soLuongSp = $bienThe->SoLuong;


                DB::table("bien_the_san_pham")
                    ->where('ID_SanPham', $bienThe->ID_SanPham)
                    ->where('KichCo', $bienThe->KichCo)
                    ->where('ID_MauSac', $bienThe->ID_MauSac)->update([
                        "SoLuong" => $soLuongSp + $item->SoLuong
                    ]);
            } else {
                $soLuongSp = $sanPham->SoLuong;

                DB::table("san_pham")
                    ->where('id', $sanPham->id)
                    ->update([
                        "SoLuong" => $soLuongSp + $item->SoLuong
                    ]);
            }
        }

        DB::commit();

        return response()->json([
            "status" => "success",
            "message" => "Hủy đơn hàng thành công",
            "redirect" => route('lich-su-don-hang.show', $request->input("id"))
        ]);
    }
}
