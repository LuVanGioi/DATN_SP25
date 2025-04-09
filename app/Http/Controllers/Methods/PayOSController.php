<?php

namespace App\Http\Controllers\Methods;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PayOSController extends Controller
{

    public function callback(Request $request)
    {
        $orderCode = $request->input("orderCode");
        DB::beginTransaction();

        if(!$orderCode) {
           return abort(500,"Thiếu Truy Vấn");
        }

        $donHang = DB::table("don_hang")->where("orderCode", $orderCode)->first();

        if(!$donHang) {
            return abort(404,"Đơn Hàng Không Hợp Lệ");
        }

        if ($request->input("status") == "PAID") {
            DB::table("don_hang")->where("orderCode", $orderCode)->update([
                "TrangThai" => "dathanhtoan"
            ]);
        } else {
            DB::table("don_hang")->where("orderCode", $orderCode)->update([
                "TrangThai" => "huythanhtoan"
            ]);
        }
        
        DB::commit();

        Session::forget('order_code');
        
        return redirect()->route("payment.success", $donHang->MaDonHang)->with("success", "Tạo Đơn Hàng Thành Công!");
    }

    public function cancel(Request $request)
    {
        if ($request->input("status") == "CANCELLED" && $request->input("cancel") == true) {
            $thongTinDonHang = DB::table("don_hang")->where("orderCode", $request->input("orderCode"))->first();
            if ($thongTinDonHang) {
                DB::table("don_hang")->where("orderCode", $request->input("orderCode"))->update([
                    "TrangThai" => "huythanhtoan"
                ]);
            } else {
                return redirect()->route("gio-hang.index")->with("error", "Đơn Hàng Không Tồn Tại");
            }

            return redirect()->route("gio-hang.index")->with("success", "Đã Hủy Thanh Toán Hóa Đơn");
        }
    }
}
