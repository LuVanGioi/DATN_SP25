<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhGiaController extends Controller
{
    public function index()
{
    $danhGias = DB::table('danh_gia')
        ->join('users', 'danh_gia.id_users', '=', 'users.id')
        ->join('san_pham', 'danh_gia.id_san_pham', '=', 'san_pham.id')
        ->select('danh_gia.*', 'users.name as user_name', 'san_pham.TenSanPham')
        ->orderBy('ngay_danh_gia', 'desc')
        ->get();

    return view('admins.DanhGia.danhSach', compact('danhGias'));
}
    public function show($id)
{
    $donHang = DB::table('don_hang')->where('MaDonHang', $id)->first();
    $sanPhams = DB::table('san_pham_don_hang')
        ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
        ->where('san_pham_don_hang.MaDonHang', $id)
        ->select('san_pham.*', 'san_pham_don_hang.SoLuong')
        ->get();

    // Lấy danh sách đánh giá
    $danhGias = DB::table('danh_gia')
        ->join('users', 'danh_gia.id_users', '=', 'users.id')
        ->join('san_pham', 'danh_gia.id_san_pham', '=', 'san_pham.id') // Kết hợp với bảng san_pham
        ->whereIn('id_san_pham', $sanPhams->pluck('id')) // Lọc theo danh sách sản phẩm trong đơn hàng
        ->select('danh_gia.*', 'users.name as user_name', 'san_pham.TenSanPham') // Lấy thêm TenSanPham
        ->orderBy('ngay_danh_gia', 'desc')
        ->get();

    return view('clients.ThongTinTaiKhoan.DanhGia', compact('donHang', 'sanPhams', 'danhGias'));
}
    public function store(Request $request, $id)
    {
        $request->validate([
            'noi_dung' => 'required|string|max:1000',
        ]);
    
        DB::table('danh_gia')->insert([
            'id_san_pham' => $id,
            'id_users' => auth()->id(),
            'noi_dung' => $request->noi_dung,
            'ngay_danh_gia' => now(),
        ]);
    
        return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi.');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'noi_dung' => 'required|string|max:1000',
    ]);

    // Cập nhật nội dung đánh giá và đánh dấu là đã chỉnh sửa
    DB::table('danh_gia')
        ->where('id', $id)
        ->where('id_users', auth()->id()) 
        ->update([
            'noi_dung' => $request->noi_dung,
            'da_sua' => true, 
            'ngay_danh_gia' => now(),
        ]);

    return redirect()->back()->with('success', 'Đánh giá của bạn đã được cập nhật.');
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
