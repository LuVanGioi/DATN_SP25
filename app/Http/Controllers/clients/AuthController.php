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
        $user = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string']
        ]);

        if (Auth::attempt($user)) {
            // if(Auth::user()->role === "Admin"){
            //     return redirect()->intended('/admin/thongKe');
            // }

            $userId = request()->cookie('ID_Guests', Str::uuid());
            if ($userId) {
                DB::table("users")->where("id", Auth::user()->id)->update([
                    "ID_Guests" => $userId
                ]);
            }

            return back();
        }

        return redirect()->back()->withErrors([
            'email' => 'Thông tin người dùng không đúng',
            'password' => 'Mật khẩu không hợp lệ.'
        ]);
    }
    //Đăng ký

    public function showFormRegister()
    {
        return view("clients.TaiKhoan.register");
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ], [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'name.string' => 'Họ và tên không hợp lệ.',
            'name.max' => 'Họ và tên không được vượt quá 255 ký tự.',

            'email.required' => 'Vui lòng nhập email.',
            'email.string' => 'Email không hợp lệ.',
            'email.email' => 'Định dạng email không đúng.',
            'email.max' => 'Email không được quá 255 ký tự.',
            'email.unique' => 'Email này đã được sử dụng.',

            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.string' => 'Mật khẩu không hợp lệ.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
        ]);
        $user = User::query()->create($data);
        session()->flash('success', 'Đăng ký tài khoản thành công !');
        return redirect('/dang-nhap');

    }

    //Đăng xuất

    public function logout(Request $request)
    {
        Auth::logout();
        return back();
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

        // if ($request->filled('phone')) {
        //     $user->phone = $request->phone;
        // }
        // if ($request->filled('address')) {
        //     $user->address = $request->address;
        // }
        // if ($request->filled('birthday')) {
        //     $user->birthday = $request->birthday;
        // }
        // if ($request->filled('sex')) {
        //     $user->sex = $request->sex;
        // }

        // $user->name = $validatedData['name'];
        // $user->email = $validatedData['email'];

        $user->update($validatedData);
        return back()->with('success', 'Cập nhật thông tin thành công !');
    }
}
