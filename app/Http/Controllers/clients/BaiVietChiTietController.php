<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaiVietChiTietController extends Controller
{
    public function show($id)
{
  
    $news = DB::table('bai_viet')->where('id', $id)->first();

    $danhMuc = DB::table("danh_muc_bai_viet")
            ->where("Xoa", 0)
            ->orderByDesc("id")
            ->limit(10)
            ->get();
    
    $binhLuans = DB::table('binh_luan_bai_viet')
        ->leftJoin('users', 'binh_luan_bai_viet.id_users', '=', 'users.id')
        ->where('id_baiviet', $id)
        ->where('duyet', 1)
        ->select('binh_luan_bai_viet.*', 'users.name as user_name')
        ->orderBy('ngay_binh_luan', 'desc')
        ->get();

    $phanHois = DB::table('phan_hoi_binh_luan')
        ->leftJoin('users', 'phan_hoi_binh_luan.id_users', '=', 'users.id')
        ->whereIn('id_binh_luan', $binhLuans->pluck('id'))
        ->where('duyet', 1)
        ->select('phan_hoi_binh_luan.*', 'users.name as user_name')
        ->orderBy('ngay_phan_hoi', 'asc')
        ->get();

    return view('clients.BaiViet.BaiVietChiTiet', compact('news', 'danhMuc', 'binhLuans', 'phanHois'));
}
    
public function like($id)
{
    $userId = auth()->id();

    $liked = DB::table('luot_thich_binh_luan')
        ->where('id_binh_luan', $id)
        ->where('id_users', $userId)
        ->exists();

    if ($liked) {
        return response()->json(['success' => false, 'message' => 'Bạn đã thích bình luận này rồi']);
    }

    DB::table('binh_luan_bai_viet')
        ->where('id', $id)
        ->increment('so_luot_thich');

    DB::table('luot_thich_binh_luan')->insert([
        'id_binh_luan' => $id,
        'id_users' => $userId,
        'ngay_thich' => now(),
    ]);

    return response()->json(['success' => true, 'message' => 'Đã thích bình luận']);
}


public function reply(Request $request)
{
    $request->validate([
        'id_binh_luan' => 'required|exists:phan_hoi_binh_luan,id', 
        'noi_dung' => 'required|string|max:1000',
    ]);

    DB::table('phan_hoi_binh_luan')->insert([
        'id_binh_luan' => $request->id_binh_luan, 
        'id_users' => auth()->id(),
        'noi_dung' => $request->noi_dung,
        'duyet' => 0, 
        'ngay_phan_hoi' => now(),
    ]);

    return redirect()->back()->with('success', 'Phản hồi của bạn đã được gửi và đang chờ duyệt.');
}

public function store(Request $request)
{
    // Validate dữ liệu từ form
    $request->validate([
        'id_baiviet' => 'required|exists:bai_viet,id', // Đảm bảo bài viết tồn tại
        'noi_dung' => 'required|string|max:1000', // Nội dung bình luận không được vượt quá 1000 ký tự
    ]);

    // Lưu bình luận vào cơ sở dữ liệu
    DB::table('binh_luan_bai_viet')->insert([
        'id_baiviet' => $request->id_baiviet, // ID bài viết
        'id_users' => auth()->id(), // ID người dùng hiện tại
        'noi_dung' => $request->noi_dung, // Nội dung bình luận
        'duyet' => 0, // Bình luận cần được duyệt trước khi hiển thị
        'ngay_binh_luan' => now(), // Thời gian bình luận
    ]);

    // Trả về thông báo thành công
    return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi và đang chờ duyệt.');
}

public function duyet($id)
{
    // Kiểm tra xem bình luận có tồn tại không
    $binhLuan = DB::table('binh_luan_bai_viet')->where('id', $id)->first();

    if (!$binhLuan) {
        return redirect()->back()->with('error', 'Bình luận không tồn tại.');
    }

    // Cập nhật trạng thái duyệt
    DB::table('binh_luan_bai_viet')
        ->where('id', $id)
        ->update(['duyet' => 1]);

    return redirect()->back()->with('success', 'Bình luận đã được duyệt.');
}
}