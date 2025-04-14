<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DoiMatKhauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.ThongTinTaiKhoan.DoiMatKhau');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('clients.ThongTinTaiKhoan.DoiMatKhau', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        if ($request->password == $request->new_password) {
            return redirect()->route('doi-mat-khau.edit', $id)
                ->with('error', 'Mật khẩu mới không được giống mật khẩu cũ');
        }
    
        // Cập nhật mật khẩu mới
        DB::table('users')->where('id', $id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        
        return redirect()->route('doi-mat-khau.edit', $id)
            ->with('success', 'Cập nhật thành công');
    }
}
