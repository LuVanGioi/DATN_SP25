<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\BaiVietRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('bai_viet')
            ->join('danh_muc_bai_viet', 'bai_viet.danh_muc_id', '=', 'danh_muc_bai_viet.id')
            ->select('bai_viet.*', 'danh_muc_bai_viet.TenDanhMucBaiViet as ten_danh_muc');

        if ($search) {
            $query->where('bai_viet.tieu_de', 'like', '%' . $search . '%');
        }

        $baiViet = $query->orderByDesc('bai_viet.id')->get();

        return view('admins.BaiViet.danhSach', compact('baiViet', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $danhMuc = DB::table('danh_muc_bai_viet')->where('Xoa', 0)->get();
        return view('admins.BaiViet.taoBaiViet', compact('danhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BaiVietRequest $request)
    {


        $path = $request->file('hinh_anh')->store('images', 'public');

        DB::beginTransaction();

        DB::table('bai_viet')->insert([
            'hinh_anh' => $path,
            'tieu_de' => $request->tieu_de,
            'danh_muc_id' => $request->danh_muc_id,
            'tac_gia' => $request->tac_gia,
            'noi_dung' => $request->noi_dung,
            'ngay_dang' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::commit();
        return redirect()->route('BaiViet.index')->with('success', 'Bài viết đã được tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $baiViet = DB::table('bai_viet')->where('id', $id)->first();
        $baiVietLienQuan = DB::table('bai_viet')
            ->where('danh_muc_id', $baiViet->danh_muc_id)
            ->where('id', '!=', $id)
            ->limit(5)
            ->get();

        return view('admins.BaiViet.chiTiet', compact('baiViet', 'baiVietLienQuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $baiViet = DB::table('bai_viet')->where('id', $id)->first();
        $danhMuc = DB::table('danh_muc_bai_viet')->where('Xoa', 0)->get();
        return view('admins.BaiViet.suaBaiViet', compact('baiViet', 'danhMuc'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(BaiVietRequest $request, string $id)
    {
        DB::beginTransaction();
        $baiViet = DB::table('bai_viet')->find($id);
        if (!$baiViet) {
            return redirect()->route('BaiViet.index')->with('error', 'Bài viết không tồn tại.');
        }
        $image = $baiViet->hinh_anh;
        if ($request->hasFile('hinh_anh')) {
            $image = $request->file('hinh_anh')->store('uploads/BaiViet', 'public');
            Storage::disk('public')->delete($baiViet->hinh_anh);
            
        }

        DB::table('bai_viet')->where('id', $id)->update([
            'hinh_anh' => $image,
            'tieu_de' => $request->tieu_de,
            'danh_muc_id' => $request->danh_muc_id,
            'tac_gia' => $request->tac_gia,
            'noi_dung' => $request->noi_dung,
            'updated_at' => now(),
        ]);
        DB::commit();
        return redirect()->route('BaiViet.index')->with('success', 'Bài viết đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            DB::table('bai_viet')->where('id', $id)->delete();
            DB::commit();
            return redirect()->route('BaiViet.index')->with('success', 'Bài viết đã được xóa thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Xóa bài viết thất bại.');
        }
    }
}
