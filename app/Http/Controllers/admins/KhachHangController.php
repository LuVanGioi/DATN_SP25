<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $khachHang = DB::table('users')->orderByDesc('id')->where('role', 'User')->get();
        return view('admins.KhachHang.DanhSach',compact('khachHang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //tesst git 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chiTiet = DB::table('users')->find($id);
    
        $donHang = DB::table('don_hang')
            ->join('san_pham_don_hang', 'don_hang.MaDonHang', '=', 'san_pham_don_hang.MaDonHang')
            ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
            ->where('don_hang.ID_User', $id) // Cập nhật cột đúng tên
            ->select(
                'don_hang.MaDonHang',
                'don_hang.created_at',
                'san_pham.TenSanPham',
                'san_pham_don_hang.SoLuong',
                'san_pham_don_hang.GiaTien',
                'don_hang.TrangThai'
            )
            ->orderBy('don_hang.created_at', 'desc') // Thay 'NgayMua' bằng 'created_at'
            ->get();
    
        return view("admins.KhachHang.chiTiet", compact("chiTiet", "donHang"));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    DB::beginTransaction();
    $KhachHang = DB::table('khach_hang')->find($id);
    if(!$KhachHang){
        return redirect()->route('KhachHang.index')->with('error','Khách Hàng Không Tồn Tại');
    }
    DB::table('khach_hang')->where("id",$id)->update([
        'TrangThai' => ($request->input('TrangThai') == "0" ? "1" : "0"),
    ]);
    DB::commit();
    return redirect()->route('KhachHang.index')->with('success','Bỏ chặn thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
