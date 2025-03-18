<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\clients\supportRequest;

class supportController extends Controller
{
    public function email_event(supportRequest $request) {
        DB::beginTransaction();

        DB::table("support_client")->insert([
            "Email" => $request->input("email"),
            "TrangThai" => "0",
            "created_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();
        
        return redirect()->back()->with("success_support","Đăng Ký Mail Thành Công!");
    }

    public function contact_form(Request $request) {

    }
}
