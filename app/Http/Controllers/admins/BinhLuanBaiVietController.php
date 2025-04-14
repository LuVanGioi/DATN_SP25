<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BinhLuanBaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $binhLuans = DB::table('binh_luan_bai_viet')->get();
    $phanHois = DB::table('phan_hoi_binh_luan')->get();

    return view('admins.BinhLuanBaiViet.danhSach', compact('binhLuans', 'phanHois'));
}

    /**
     * Store a newly created resource in storage.
     */
  
public function store(Request $request)
{
    $request->validate([
        'id_baiviet' => 'required|exists:bai_viet,id', 
        'noi_dung' => 'required|string|max:1000',
    ]);

    DB::table('binh_luan_bai_viet')->insert([
        'id_baiviet' => $request->id_baiviet,
        'id_users' => auth()->id(),
        'noi_dung' => $request->noi_dung,
        'ngay_binh_luan' => now(),
        'duyet' => 0,
    ]);

    return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $binhLuan = DB::table('binh_luan_bai_viet')->where('id', $id)->first();
        return view('admins.BinhLuanBaiViet.chiTiet', compact('binhLuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $binhLuan = DB::table('binh_luan_bai_viet')->where('id', $id)->first();
        return view('admins.BinhLuanBaiViet.suaBinhLuan', compact('binhLuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'noi_dung' => 'required|string|max:1000',
        ]);

        DB::table('binh_luan_bai_viet')
            ->where('id', $id)
            ->update([
                'noi_dung' => $request->noi_dung,
                'ngay_binh_luan' => now(),
            ]);

        return redirect()->route('binhluan.index')->with('success', 'Bình luận đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('binh_luan_bai_viet')->where('id', $id)->delete();
        return redirect()->route('binhluan.index')->with('success', 'Bình luận đã được xóa.');
    }

    /**
     * Approve the specified comment.
     */
    public function duyet($id)
    {
        DB::table('binh_luan_bai_viet')
            ->where('id', $id)
            ->update(['duyet' => 1]);

        return redirect()->back()->with('success', 'Bình luận đã được duyệt.');
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
    /// xử lý phản hồi 
    public function showPhanHoi($id)
{
    $phanHoi = DB::table('phan_hoi_binh_luan')->where('id', $id)->first();
    return view('admins.BinhLuanBaiViet.chiTietPhanHoi', compact('phanHoi'));
}
public function editPhanHoi($id)
{
    $phanHoi = DB::table('phan_hoi_binh_luan')->where('id', $id)->first();
    return view('admins.BinhLuanBaiViet.suaBinhLuanPhanHoi', compact('phanHoi'));
}
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

public function duyetPhanHoi($id)
{
    DB::table('phan_hoi_binh_luan')
        ->where('id', $id)
        ->update(['duyet' => 1]);

    return redirect()->back()->with('success', 'Phản hồi đã được duyệt.');
}

public function destroyPhanHoi($id)
{
    DB::table('phan_hoi_binh_luan')->where('id', $id)->delete();
    return redirect()->route('binhluan.index')->with('success', 'Phản hồi đã được xóa.');
}
}