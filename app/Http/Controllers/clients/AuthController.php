<?php

namespace App\Http\Controllers\clients;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     //Đăng nhập

     public function showFormLogin(){
        return view("clients.TaiKhoan.login");
    }

    public function login(Request $request){
        $user = $request->validate([
            'email'     => ['required', 'string', 'email', 'max:255'],
            'password'  => ['required', 'string']
        ]);

        if(Auth::attempt($user)){
            // if(Auth::user()->role === "Admin"){
            //     return redirect()->intended('/admin/thongKe');
            // }

            $userId = request()->cookie('ID_Guests', Str::uuid());
            if($userId) {
                DB::table("users")->where("id", Auth::user()->id)->update([
                    "ID_Guests" => $userId
                ]);
            }

            return back();    
        }

        return redirect()->back()->withErrors([
            'email' => 'Thông tin người dùng không đúng'
        ]);
    }
    //Đăng ký

    public function showFormRegister(){
        return view("clients.TaiKhoan.register");
    }

    public function register(Request $request){
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255',
            'password'      => 'required|string|min:8'
        ]);

        $user = User::query()->create($data);
        return redirect('/dang-nhap');
    }

    //Đăng xuất

    public function logout(Request $request){
        Auth::logout();
        return back();
    }
}
