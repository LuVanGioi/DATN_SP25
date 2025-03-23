<?php

namespace App\Http\Controllers\clients;

use App\Mail\ThongBaoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showFormForgotPassword()
    {
        return view('clients.TaiKhoan.forgot-password');
    }

    public function sendMailResetPassword(Request $request)
    {
        $noiDungKhoiPhucMatKhau = DB::table("noi_dung_gui_mail")->where("Loai", "forgot_password")->first();

        $data = [
            'subject' => 'Khôi phục mật khẩu OK !',
            'message' => $noiDungKhoiPhucMatKhau->NoiDung
        ]; 
        $data = [
                'subject' => "ManhDev",
                'message' => 'test Thôi'
            ];
    
        Mail::to($request->input("email"))->send(new ThongBaoMail($data));

        return redirect()->route('forgot-password')->with('success', 'Vui lòng kiểm tra email để khôi phục mật khẩu');
    }
}
