<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ThongTinTaiKhoanController extends Controller
{
    public function edit(string $id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('clients.ThongTinTaiKhoan.ThongTinTaiKhoan', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            DB::table('users')->where('id', $id)->update([
                'name' => $request->name ,
                'email' => $request->email ,
                'sex'   => $request->sex ,
                'birthday' => $request->birthday ,
                'phone' => $request->phone ,
                'address' => $request->address,
            ]);
            return redirect()->route('thong-tin-tai-khoan.edit', $id)->with('success', 'Cập nhật thành công');
    }
   
}
