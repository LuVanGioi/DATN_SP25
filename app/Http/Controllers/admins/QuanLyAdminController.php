<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class QuanLyAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = DB::table('users')->orderByDesc('id')->where('role', 'Admin')->get();
        return view('admins.QuanLyAdmin.DanhSach',compact('admin'));
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
        $chiTiet = DB::table('users')->find($id);
        return view("admins.QuanLyAdmin.Admin", compact("chiTiet"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $capNhat = DB::table('users')->find($id);
        return view("admins.QuanLyAdmin.Update", compact("capNhat"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255',
            'password'          => 'required|string|min:8',
            'sex'               => 'required|string|max:10',
            'phone'             => 'required|string|max:10|nullable',
            'address'           => 'string|max:255|nullable',
            'image'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ]);

        $user = DB::table('users')->find($id);
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('uploads/admin', 'public');
            Storage::disk('public')->delete($user->image);
        }else{
            $imagePath = $user->image;
        }

        DB::table('users')->where('id', $id)->update([
            'name'              => $request->input('name'),
            'email'             => $request->input('email'),
            'password'          => bcrypt($request->input('password')),
            'sex'               => $request->input(),
            'phone'             => $request->input('phone'),
            'address'           => $request->input('address'),
            'image'             => $imagePath,
            'updated_at' => now()
        ]);

        return redirect()->route('admin.thongtin')->with('success', 'Cập nhật thông tin thành công!');
    }

   
}
