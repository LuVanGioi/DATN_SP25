<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showFormForgotPassword()
    {
        return view('clients.TaiKhoan.quen-mat-khau');
    }
}
