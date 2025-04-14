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
            ->selectRaw('
        YEAR(created_at) as year,
        MONTH(created_at) as month,
        SUM(TongTien) as revenue,
        SUM(CASE WHEN TrangThai = "hoanhang" THEN TongTien ELSE 0 END) as hoan_hang,
        SUM(CASE WHEN TrangThai = "dagiao" THEN TongTien ELSE 0 END) as da_giao
    ')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();



        $months = $data->map(fn($item) => "Tháng {$item->month}/{$item->year}")->toArray();
        $revenues = $data->pluck('revenue')->toArray();
        $hoanHang = $data->pluck('hoan_hang')->toArray();
        $daGiao = $data->pluck('da_giao')->toArray();

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

        return view("admins.home", compact("months", "daGiao", "hoanHang", "tongDonHang", "tongDonHangChoGiao", "tongDonHangDangGiao", "tongDonHangDaGiao", "tongDonHangHoanHang", "tongDonHangThatBai", "danhMuc", "sanPham", "khachHang", "monTheThao", "maGiamGia", "baiViet"));
    }
}
