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

    public function showFormLogin()
    {
        return view("clients.TaiKhoan.login");
    }

    public function login(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");

        if (!$email) {
            return response()->json([
                'status' => "error",
                'message' => "Vui Lòng Nhập Email",
            ]);
        }

        if (!$password) {
            return response()->json([
                'status' => "error",
                'message' => "Vui Lòng Nhập Mật Khẩu",
            ]);
        }

        $user = [
            "email" => $email,
            "password" => $password
        ];
        $login = Auth::attempt($user);

        if ($login) {
            $userId = request()->cookie('ID_Guests', Str::uuid());
            if ($userId) {
                DB::table("users")->where("id", Auth::user()->id)->update([
                    "ID_Guests" => $userId
                ]);
            }

            return response()->json([
                'status' => "success",
                'message' => "Đăng Nhập Thành Công!",
                "redirect" => url()->full()
            ]);
        }

        return response()->json([
            'status' => "error",
            'message' => "Đăng Nhập Thất Bại Vui Lòng Kiểm Tra Lại!"
        ]);
        // if(Auth::user()->role === "Admin"){
        //     return redirect()->intended('/admin/thongKe');
        // }
    }
    //Đăng ký

    public function showFormRegister()
    {
        return view("clients.TaiKhoan.register");
    }

    public function register(Request $request)
    {
        $name = $request->input("name");
        $email = $request->input("email");
        $password = $request->input("password");

        if (!$name) {
            return response()->json([
                'status' => "error",
                'message' => "Vui Lòng Nhập Email",
            ]);
        }

        if (!$email) {
            return response()->json([
                'status' => "error",
                'message' => "Vui Lòng Nhập Email",
            ]);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'status' => "error",
                'message' => "Email Không Hợp Lệ",
            ]);
        }

        if (!$password) {
            return response()->json([
                'status' => "error",
                'message' => "Vui Lòng Nhập Mật Khẩu",
            ]);
        }

        if (strlen($password) < 8) {
            return response()->json([
                'status' => "error",
                'message' => "Mật Khẩu Phải Từ 8 Kí Tự",
            ]);
        }

        $check = DB::table("users")->where("email", $email)->first();
        if($check) {
            return response()->json([
                'status' => "error",
                'message' => "Tài Khoản Đã Tồn Tại Trong Hệ Thống",
            ]);
        }

        $data = [
            "name" => $name,
            "email" => $email,
            "password" => $password
        ];

        $signup = User::query()->create($data);
        
        if($signup) {
            return response()->json([
                'status' => "success",
                'message' => "Đăng Ký Tài Khoản Thành Công!",
                "redirect" => route("login")
            ]);
        }

        return response()->json([
            'status' => "error",
            'message' => "Đăng Ký Tài Khoản Thất Bại!"
        ]);
    }

    //Đăng xuất

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Hiển thị thông tin người dùng
    public function getProfile(Request $request)
    {
        $user = Auth::user();

        return view('clients.ThongTinTaiKhoan.ThongtinTaiKhoan', compact('user'));
    }

    // Cập nhật thông tin người dùng
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ], [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.unique' => 'Email này đã được sử dụng.',
        ]);

        // Cập nhật thông tin người dùng
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        return back()->with('success', 'Cập nhật thông tin thành công !');
    }
}
