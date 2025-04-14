<?php

namespace App\Http\Controllers\admins;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('don_hang')
            ->selectRaw('MONTH(created_at) as month, SUM(TongTien) as revenue')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $choNhan = "";
        $months = $data->pluck('month')->map(fn($month) => "Tháng $month")->toArray();
        $revenues = $data->pluck('revenue')->toArray();

        $tongDonHang = DB::table('don_hang')->count();
        $tongDonHangChoGiao = DB::table('don_hang')->where("TrangThai", "=", "daxacnhan")->count();
        $tongDonHangDangGiao = DB::table('don_hang')->where("TrangThai", "=", "danggiao")->count();
        $tongDonHangDaGiao = DB::table('don_hang')->where("TrangThai", "=", "dagiao")->count();
        $tongDonHangThatBai = DB::table('don_hang')->where("TrangThai", "=", "thatbai")->count();
        $tongDonHangHoanHang = DB::table('don_hang')->where("TrangThai", "=", "hoanhang")->count();
        
        $danhMuc = DB::table('danh_muc_san_pham')->count();
        $monTheThao = DB::table('dich_vu_san_pham')->count();
        $sanPham = DB::table('san_pham')->count();
        $khachHang = DB::table('users')->count();
        $maGiamGia = DB::table('magiamgia')->count();
        $baiViet = DB::table('bai_viet')->count();

        return view("admins.home", compact("months", "choNhan", "revenues", "tongDonHang", "tongDonHangChoGiao", "tongDonHangDangGiao", "tongDonHangDaGiao", "tongDonHangHoanHang", "tongDonHangThatBai", "danhMuc", "sanPham", "khachHang", "monTheThao", "maGiamGia", "baiViet"));
    }
}
