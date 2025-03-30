<?php

namespace App\Http\Controllers\Methods;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VnPayController extends Controller
{
    public function createPayment(Request $request)
    {
        $vnpay = DB::table("vnpay_settings")->where("id", 1)->first();

        $vnp_TmnCode = $vnpay->vnp_tmn_code;
        $vnp_HashSecret = $vnpay->vnp_hash_secret;
        $vnp_Url = $vnpay->vnp_url;
        $vnp_Returnurl = route('vnpay.return');
        $vnp_TxnRef = time();
        $vnp_OrderInfo = "Thanh toán đơn hàng";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $request->amount * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = $request->bank_code ?? "";
        $vnp_IpAddr = $request->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        ksort($inputData);
        $query = http_build_query($inputData);
        $hashdata = urldecode($query);
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $query .= '&vnp_SecureHash=' . $vnpSecureHash;
        $paymentUrl = $vnp_Url . '?' . $query;

        return redirect($paymentUrl);
    }

    public function paymentReturn(Request $request)
    {
        if ($request->vnp_ResponseCode == "00") {
            return "Thanh toán thành công!";
        }
        return "Thanh toán thất bại!";
    }
}
