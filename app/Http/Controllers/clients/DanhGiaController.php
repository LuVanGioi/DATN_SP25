<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DanhGiaController extends Controller
{
    public function index()
    {
        //
    }
    public function show($id)
    {
        $donHang = DB::table('don_hang')->where('MaDonHang', $id)->first();
        $sanPhams = DB::table('san_pham_don_hang')
            ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
            ->where('san_pham_don_hang.MaDonHang', $id)
            ->select('san_pham.*', 'san_pham_don_hang.SoLuong')
            ->get();

        $danhGias = DB::table('danh_gia')
            ->join('users', 'danh_gia.id_users', '=', 'users.id')
            ->join('san_pham', 'danh_gia.id_san_pham', '=', 'san_pham.id')
            ->where("danh_gia.trading", $id)
            ->whereIn('id_san_pham', $sanPhams->pluck('id'))
            ->select('danh_gia.*', 'users.name as user_name', 'san_pham.TenSanPham')
            ->orderBy('ngay_danh_gia', 'desc')
            ->get();

        return view('clients.ThongTinTaiKhoan.DanhGia', compact('donHang', 'sanPhams', 'danhGias'));
    }
    public function store(Request $request, $id)
    {
        if(empty($request->input("rating"))) {
            return response()->json([
                "status" => "error",
                "message" => "Vui Lòng Chọn Sao Đánh Giá"
            ]);
        }

        if(empty($request->input("noi_dung"))) {
            return response()->json([
                "status" => "error",
                "message" => "Vui Lòng Nhập Nội Dung Bình Luận"
            ]);
        }

        $checkDanhGia = DB::table('danh_gia')->where("id_users", Auth::user()->id)->where("id_san_pham", $id)->where("trading", $request->input("trading"))->first();

        if($checkDanhGia) {
            return response()->json([
                "status" => "error",
                "message" => "Bạn Đã Đánh Giá Sản Phẩm Này Rồi"
            ]);
        }

        DB::table('danh_gia')->insert([
            'trading' => $request->input("trading"),
            'id_san_pham' => $id,
            'id_users' => Auth::user()->id,
            'noi_dung' => $request->input("noi_dung"),
            'rating' => $request->input("rating"),
            'ngay_danh_gia' => now(),
        ]);

        return response()->json([
            "status" => "success",
            "message" => "Đánh Giá Của Bạn Đã Được Gửi",
            "redirect" => "/danh-gia/".$request->input("trading")
        ]);
    }

    public function update(Request $request, $id)
    {
        if(empty($request->input("noi_dung"))) {
            return response()->json([
                "status" => "error",
                "message" => "Vui Lòng Nhập Nội Dung Bình Luận"
            ]);
        }

        if(empty($request->input("rating"))) {
            return response()->json([
                "status" => "error",
                "message" => "Vui Lòng Chọn Sao Đánh Giá"
            ]);
        }

        DB::table('danh_gia')
            ->where('id', $id)
            ->where('id_users', Auth::user()->id)
            ->update([
                'noi_dung' => $request->input("noi_dung"),
                'rating' => $request->input("rating"),
                'da_sua' => true,
                'ngay_danh_gia' => now(),
            ]);

        return response()->json([
                "status" => "success",
                "message" => "Đánh Giá Thành Công!"
            ]);;
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'tra_loi' => 'required|string|max:1000',
        ]);

        DB::table('danh_gia')
            ->where('id', $id)
            ->update([
                'tra_loi' => $request->tra_loi,
            ]);

        return redirect()->back()->with('success', 'Đã trả lời đánh giá.');
    }
}
