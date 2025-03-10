<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.DonHang.danhSach');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admins.DonHang.chiTiet', ['id' => $id]);
    }

}
