<?php

namespace App\Http\Controllers\clients;

use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class payController extends Controller
{
    public function checkDiscount(Request $request)
    {

        if ($request->action === 'acept_voucher') {
            DB::beginTransaction();
            $giamGia = 0;

            $discount = DB::table('magiamgia')->where('name', $request->input('discount'))->first();
            if ($discount) {
                $giamGia = $discount->value;
                session()->flash('success', "Áp dụng mã giảm giá thành công! Giảm " . number_format($giamGia) . " đ.");
            } else {
                session()->flash('error', "Mã giảm giá không hợp lệ!");
            }

            return redirect()->back()->with([
                'giamGia' => $giamGia
            ]);
        } else if ($request->action === 'payment') {
            $giamGia = 0;

            if ($request->input('discount')) {
                $discount = DB::table('magiamgia')->where('name', $request->input('discount'))->first();
                if (!$discount) {
                    session()->flash('error', "Mã giảm giá không hợp lệ!");
                }
            }

            $orderCode = strtoupper(Str::random(40));
            Session::put('order_code', $orderCode);
            session()->forget('selected_products');
            session([
                'selected_products' => $request->input('selected_products', [])
            ]);

            return redirect()->route('payent', $orderCode)->with('success', 'Đã chuyển đến thanh toán!');
        }
    }

    public function payment(Request $request, $code)
    {
        if (Auth::check()) {
            $userId = Auth::user()->ID_Guests ?? Auth::user()->id;
        } else {
            $userId = request()->cookie('ID_Guests', Str::uuid());
            Cookie::queue('ID_Guests', $userId, 60 * 24 * 365);
        }

        $orderCode = $request->query('order_code', Session::get('order_code'));
        if (!$orderCode) {
            abort(404, 'Dữ liệu không hợp lệ.');
        }

        if ($code !== $orderCode) {
            abort(404, 'Dữ liệu không hợp lệ.');
        }

        $danhSachTinhThanh = DB::table("tinh_thanh")->get();

        $danhSachDiaChimacDinh = DB::table("location")->where('ID_User', (Auth::id() ?? ""))->get();

        $selectedCartIds = session('selected_products', []);
        $sanPhamDaChon = $danhSachSanPhamThanhToan = DB::table("cart")
            ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
            ->join("kich_co", "cart.KichCo", "=", "kich_co.TenKichCo")
            ->join("mau_sac", "cart.MauSac", "=", "mau_sac.id")
            ->whereIn("cart.id", $selectedCartIds)
            ->where(function ($query) use ($userId) {
                if ($userId) {
                    $query->where("cart.ID_KhachHang", $userId);
                }
            })
            ->selectRaw("
            cart.id as cart_id, 
            cart.*, 
            san_pham.*, 
            kich_co.*, 
            mau_sac.*, 
            cart.SoLuong * san_pham.GiaSanPham as ThanhTien
        ")->get();

        $layGiaTienSanPham = DB::table("cart")
            ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
            ->whereIn("cart.id", $selectedCartIds)
            ->where(function ($query) use ($userId) {
                if ($userId) {
                    $query->where("cart.ID_KhachHang", $userId);
                }
            })
            ->selectRaw("
            COUNT(cart.ID_SanPham) as soLuongGioHangClient, 
            SUM(cart.SoLuong * san_pham.GiaSanPham) as tongTien
        ")->first();

        $tongTienSanPhamDaChon = $layGiaTienSanPham->tongTien ?? 0;

        return view("clients.ThanhToan.index", compact('orderCode', 'danhSachTinhThanh', 'danhSachDiaChimacDinh', 'sanPhamDaChon', 'tongTienSanPhamDaChon'));
    }

    public function payment_store(Request $request)
    {

        if (Auth::check()) {
            $userId = Auth::user()->ID_Guests ?? Auth::user()->id;
        } else {
            $userId = request()->cookie('ID_Guests', Str::uuid());
            Cookie::queue('ID_Guests', $userId, 60 * 24 * 365);
        }
        DB::beginTransaction();
        $layGiaTienSanPham = DB::table("cart")
            ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
            ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
            ->selectRaw("COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong * san_pham.GiaSanPham) as tongTien")
            ->first();

        $tongTienSanPhamGioHangClient = $layGiaTienSanPham->tongTien ?? 0;
        $tinhPhanTram = 0;

        if ($request->input("voucher")):
            $discount = DB::table('magiamgia')->where('name', $request->input('voucher'))->first();
            if (!$discount):
                return redirect()->back()->with('voucher_error', 'Mã giảm giá không hợp lệ!');
            endif;

            if ($tongTienSanPhamGioHangClient < $discount->min_value):
                return redirect()->back()->with('voucher_error', 'Áp Dụng Tối Thiểu Là ' . number_format($discount->min_value) . 'đ');
            endif;

            if ($tongTienSanPhamGioHangClient > $discount->max_value):
                return redirect()->back()->with('voucher_error', 'Áp Dụng Tối Đa Là ' . number_format($discount->max_value) . 'đ');
            endif;

            if (time() < strtotime($discount->start_date . ' 00:00:00') || time() > strtotime($discount->end_date . ' 23:59:59')):
                return redirect()->back()->with('voucher_error', 'Mã Giảm Giá Đã Hết Hạn Sử Dụng');
            endif;

            $tinhPhanTram = $tongTienSanPhamGioHangClient / $discount->value;
            $tongTienSanPhamGioHangClient = $tongTienSanPhamGioHangClient - $tinhPhanTram;
        endif;

        $trading = strtoupper(Str::random(8));

        if ($request->input("method") == "COD"):
            DB::table("don_hang")->insert([
                "MaDonHang" => $trading,
                "ID_User" => Auth::user()->id,
                "TrangThai" => "choxacnhan",
                "PhuongThucThanhToan" => $request->input("method"),
                "DiaChiNhan" => $request->input("location"),
                "TongTien" => $tongTienSanPhamGioHangClient,
                "GiamGia" => $tinhPhanTram,
                "MaGiamGia" => ($request->input('voucher') ?? ""),
                "GhiChu" => $request->input("message"),
                "created_at" => date("Y-m-d H:i:s"),
            ]);

            foreach (DB::table("cart")->where("ID_KhachHang", (Auth::user()->ID_Guests ?? Auth::user()->id))->get() as $cart):
                DB::table("san_pham_don_hang")->insert([
                    "MaDonHang" => $trading,
                    "Id_SanPham" => $cart->id,
                    "KichCo" => $cart->KichCo,
                    "MauSac" => DB::table("mau_sac")->where("id", $cart->MauSac)->first()->TenMauSac,
                    "GiaTien" => DB::table("san_pham")->where("id", $cart->ID_SanPham)->first()->GiaSanPham,
                    "SoLuong" => $cart->SoLuong,
                    "created_at" => date("Y-m-d H:i:s"),
                ]);
            endforeach;

            DB::table("cart")->where("ID_KhachHang", (Auth::user()->ID_Guests ?? Auth::user()->id))->delete();

            DB::commit();

            return redirect()->route("payment.success", $trading)->with("success", "Tạo Đơn Hàng Thành Công!");
        endif;
    }

    public function payment_success($trading)
    {
        return view("clients.ThanhToan.ThanhToanThanhCong", compact("trading"));
    }
}
