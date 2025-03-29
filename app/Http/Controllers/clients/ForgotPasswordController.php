<?php

namespace App\Http\Controllers\clients;


use App\Mail\ThongBaoMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;


class ForgotPasswordController extends Controller
{
    public function showFormForgotPassword()
    {
        return view('clients.TaiKhoan.forgot-password');
    }

    public function sendMailResetPassword(Request $request)
    {

        $user = DB::table("users")->where("email", $request->input("email"))->first();

        if (!$user) {
            return redirect()->route('forgot-password')->withErrors([
                'email' => 'Email chưa được đăng ký trong hệ thống.'
            ]);
        }


        $smtp_mail = DB::table("smtp_mail")->where("id", "1")->first();
        $caiDatWebsite = DB::table("cai_dat_website")->where("id", 1)->first();
        Config::set('mail.mailers.smtp.host', $smtp_mail->smtp_host);
        Config::set('mail.mailers.smtp.port', $smtp_mail->smtp_port);
        Config::set('mail.mailers.smtp.username', $smtp_mail->smtp_email);
        Config::set('mail.mailers.smtp.password', $smtp_mail->smtp_password);
        Config::set('mail.mailers.smtp.encryption', $smtp_mail->smtp_encryption);
        Config::set('mail.from.address', $smtp_mail->smtp_email);
        Config::set('mail.from.name', $caiDatWebsite->TenCuaHang);

        $noiDungKhoiPhucMatKhau = DB::table("noi_dung_gui_mail")->where("Loai", "forgot_password")->first();

        $tokenRs = strtoupper(Str::random(40));

        DB::table("users")->where("email", $request->input("email"))->update([
            "remember_token" => $tokenRs
        ]);
        
        $link = "http://".$_SERVER['SERVER_NAME'].':8000/mat-khau-moi/'.$tokenRs;

        $data = [
            'subject' => 'Khôi Phục Mật Khẩu Của Bạn !',
            'message' => str_replace("{link}", $link, $noiDungKhoiPhucMatKhau->NoiDung)
        ];

        Mail::to($request->input("email"))->send(new ThongBaoMail($data));

        return redirect()->route('forgot-password')->with('success', 'Vui lòng kiểm tra email để khôi phục mật khẩu');
    }

    public function showFormResetPassword($token)
    {
        $user = DB::table("users")->where("remember_token", $token)->first();
        if(!$user) {
            abort(404, 'Dữ liệu không hợp lệ.');
        }
        return view('clients.TaiKhoan.reset-password', compact('user'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password_new' => 'required|min:6',
            'password_confirm' => 'required|same:password_new',
            'email' => 'required|email'
        ]);

        $user = DB::table("users")->where("email", $request->input('email'))->first();

        if (!$user) {
            return redirect()->route('forgot-password')->withErrors([
                'email' => 'Email không hợp lệ.'
            ]);
        }

        if ($request->input('password_new') !== $request->input('password_confirm')) {
            return redirect()->route('forgot-password')->withErrors([
                'password_new' => 'Mật không khớp nhau.'
            ]);
        }

        DB::table('users')->where('email', $request->input('email'))->update([
            'password' => Hash::make($request->input('password_new'))
        ]);

        return redirect()->route('login')->with('success', 'Mật khẩu đã được thay đổi thành công!');
    }
}
