<?php

namespace App\Http\Controllers\clients;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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

            return redirect()->route('payent', $orderCode)->with('success', 'Đã chuyển đến thanh toán!');
        }
    }

    public function payment(Request $request, $code)
    {

        $orderCode = $request->query('order_code', Session::get('order_code'));
        if (!$orderCode) {
            abort(404, 'Dữ liệu không hợp lệ.');
        }

        if($code !== $orderCode) {
            abort(404, 'Dữ liệu không hợp lệ.');
        }

        $danhSachTinhThanh = DB::table("tinh_thanh")->get();

        return view("clients.ThanhToan.index", compact('orderCode', 'danhSachTinhThanh'));
    }
}
