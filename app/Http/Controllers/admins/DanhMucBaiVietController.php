<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\DanhMucBaiVietRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhMucBaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('danh_muc_bai_viet')->where('Xoa', 0);

        if ($search) {
            $query->where('TenDanhMucBaiViet', 'like', '%' . $search . '%');
        }

        $danhSach = $query->orderByDesc('id')->get();
        return view('admins.DanhMucBaiViet.danhSach', compact('danhSach', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.DanhMucBaiViet.taoDanhMucBaiViet');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DanhMucBaiVietRequest $request)
    {
       

        DB::beginTransaction();
        try {
            DB::table('danh_muc_bai_viet')->insert([
                'TenDanhMucBaiViet' => $request->TenDanhMucBaiViet,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::commit();
            return redirect()->route('DanhMucBaiViet.index')->with('success', 'Thêm danh mục bài viết thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $danhMuc = DB::table('danh_muc_bai_viet')->where('id', $id)->first();
        return view('admins.DanhMucBaiViet.suaDanhMucBaiViet', compact('danhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DanhMucBaiVietRequest $request, string $id)
    {
        $request->validate([
            'TenDanhMucBaiViet' => 'required|max:255',
        ]);

        DB::beginTransaction();
        try {
            DB::table('danh_muc_bai_viet')->where('id', $id)->update([
                'TenDanhMucBaiViet' => $request->TenDanhMucBaiViet,
                'updated_at' => now(),
            ]);
            DB::commit();
            return redirect()->route('DanhMucBaiViet.index')->with('success', 'Sửa danh mục bài viết thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Sửa danh mục bài viết thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            DB::table('danh_muc_bai_viet')->where('id', $id)->update([
                'Xoa' => 1,
                'updated_at' => now(),
            ]);

            DB::table('bai_viet')->where('danh_muc_id', $id)->update([
                'Xoa' => 1,
                'updated_at' => now(),
            ]);

            DB::commit();
            return redirect()->route('DanhMucBaiViet.index')->with('success', 'Xóa danh mục bài viết thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Xóa danh mục bài viết thất bại');
        }
    }
}
