<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HinhAnhBienTheController extends Controller
{
    public function destroyImage(string $id)
    {
        $bienThe = DB::table("hinh_anh_san_pham")->find($id);

        if (!$bienThe) {
            return redirect()->back()->with("error", "Hình Ảnh Không Tồn Tại!");
        }

        DB::table("hinh_anh_san_pham")->where("id", $id)->delete();

        DB::commit();

        return redirect()->back()->with("success", "Xóa Hình Ảnh Thành Công!");
    }
}
