<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChiTietHuyDonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
        } else {
            return redirect()->route('login')->with('error', 'Vui Lòng Đăng Nhập');
        }

        $lichSu = DB::table('don_hang')
            ->join('location', 'don_hang.DiaChiNhan', '=', 'location.id')
            ->join('huyen', 'location.Huyen', '=', 'huyen.MaHuyen')
            ->join('tinh_thanh', 'location.Tinh', '=', 'tinh_thanh.IdTinh')
            ->where('don_hang.ID_User', $userId)
            ->selectRaw('don_hang.TrangThai as TrangThaiDonHang, don_hang.*,huyen.*,tinh_thanh.*,location.*')->get();

        if (!$lichSu) {
            return redirect()->route('DonHang.index')->with('error', 'Bạn chưa có đơn hàng nào.');
        }
        return view("clients.HuyDonHang.ChiTietHuyDon", compact('lichSu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
