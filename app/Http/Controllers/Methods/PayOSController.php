<?php

namespace App\Http\Controllers\Methods;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PayOSController extends Controller
{

    public function callback(Request $request)
    {
        return response()->json($request->all());
    }

    public function cancel(Request $request)
    {
        if ($request->input("status") == "CANCELLED" && $request->input("cancel") == true) {
            $thongTinDonHang = DB::table("don_hang")->where("orderCode", $request->input("orderCode"))->first();
            if ($thongTinDonHang) {
                DB::table("don_hang")->where("orderCode", $request->input("orderCode"))->update([
                    "TrangThai" => "huythanhtoan"
                ]);

                DB::table("don_hang")->where("orderCode", $request->input("orderCode"))->update([
                    "TrangThai" => "huythanhtoan"
                ]);
            } else {
                return redirect()->route("gio-hang.index")->with("error", "Đơn Hàng Không Tồn Tại");
            }

            return redirect()->route("gio-hang.index")->with("success", "Đã Hủy Thanh Toán Hóa Đơn");
        }
        dd($request->all());
    }
}
