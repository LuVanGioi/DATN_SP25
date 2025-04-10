<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FAQClientController extends Controller
{
    public function index()
    {
        $faq = DB::table("faq")->where("Xoa", 0)->get();

        if ($faq->isEmpty()) {
            abort(404, "Không tìm thấy!");
        }

        return view("clients.Faq.Faq", compact("faq"));
    }


}
