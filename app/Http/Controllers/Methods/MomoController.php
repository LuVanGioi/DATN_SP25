<?php

namespace App\Http\Controllers\Methods;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MomoController extends Controller
{
    public function callback(Request $request)
{
    dd($request->all());
    
    if ($request->resultCode == 0) {
        DB::table('orders')->where('order_id', $request->orderId)->update(['status' => 'paid']);
        return "Thanh toán thành công!";
    }
    return "Thanh toán thất bại!";
}

}
