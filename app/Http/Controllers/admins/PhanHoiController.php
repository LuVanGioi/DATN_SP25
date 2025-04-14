<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhanHoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $phanHois = DB::table('phan_hoi_binh_luan')
        ->leftJoin('users', 'phan_hoi_binh_luan.id_users', '=', 'users.id')
        ->select('phan_hoi_binh_luan.*', 'users.name as user_name')
        ->orderBy('ngay_phan_hoi', 'desc')
        ->get();

    return view('admins.BinhLuanBaiViet.danhSach', compact('phanHois'));
}

    /**
     * Show the form for editing the specified resource.
     */
    
public function editPhanHoi($id)
{
    $phanHoi = DB::table('phan_hoi_binh_luan')->where('id', $id)->first();
    return view('admins.BinhLuanBaiViet.suaBinhLuanPhanHoi', compact('phanHoi'));
}

    /**
     * Update the specified resource in storage.
     */
    
public function updatePhanHoi(Request $request, $id)
{
    $request->validate([
        'noi_dung' => 'required|string|max:1000',
    ]);

    DB::table('phan_hoi_binh_luan')
        ->where('id', $id)
        ->update([
            'noi_dung' => $request->noi_dung,
            'ngay_phan_hoi' => now(),
        ]);

    return redirect()->route('binhluan.index')->with('success', 'Phản hồi đã được cập nhật.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('phan_hoi_binh_luan')->where('id', $id)->delete();
        return redirect()->route('phanhoi.index')->with('success', 'Phản hồi đã được xóa.');
    }

    /**
     * Approve the specified response.
     */
    public function duyet($id)
    {
        DB::table('phan_hoi_binh_luan')
            ->where('id', $id)
            ->update(['duyet' => 1]);

        return redirect()->back()->with('success', 'Phản hồi đã được duyệt.');
    }

    /**
     * Display the specified resource.
     */
    
public function showPhanHoi($id)
{
    $phanHoi = DB::table('phan_hoi_binh_luan')->where('id', $id)->first();
    return view('admins.BinhLuanBaiViet.chiTietPhanHoi', compact('phanHoi'));
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

public function duyetPhanHoi($id)
{
    DB::table('phan_hoi_binh_luan')
        ->where('id', $id)
        ->update(['duyet' => 1]);

    return redirect()->back()->with('success', 'Phản hồi đã được duyệt.');
}
}