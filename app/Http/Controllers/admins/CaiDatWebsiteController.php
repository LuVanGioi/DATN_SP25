<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Mail\ThongBaoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class CaiDatWebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cai_dat_website = DB::table("cai_dat_website")->find(1);
        $smtp_mail = DB::table("smtp_mail")->find(1);
        $noi_dung_gui_mail = DB::table("noi_dung_gui_mail")->get();
        $tien_ich_website = DB::table("tien_ich_website")->get();
        $cai_dat_giao_dien_website = DB::table("cai_dat_giao_dien_website")->get();
        $pay_os = DB::table("pay_os")->find(1);

        return view("admins.CaiDatWebsite.index", compact("cai_dat_website", "smtp_mail", "pay_os", "noi_dung_gui_mail", "tien_ich_website", "cai_dat_giao_dien_website"));
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        $caiDatWebsite = DB::table("cai_dat_website")->find($id);
        if (!$caiDatWebsite) {
            return redirect()->route("CaiDatWebsite.index")->with("error", "Vui Lòng Chạy Seeder Để Sử Dụng!");
        }

        $Favicon_website = $caiDatWebsite->Favicon_website;
        $Logo_website = $caiDatWebsite->Logo_website;
        $Bia_website = $caiDatWebsite->Bia_website;

        if ($request->hasFile("Favicon_website")) {
            $Favicon_website = $request->file("Favicon_website")->store("uploads/System", "public");
            Storage::disk('public')->delete($caiDatWebsite->Favicon_website);
        }

        if ($request->hasFile("Logo_website")) {
            $Logo_website = $request->file("Logo_website")->store("uploads/System", "public");
            Storage::disk('public')->delete($caiDatWebsite->Logo_website);
        }

        if ($request->hasFile("Bia_website")) {
            $Bia_website = $request->file("Bia_website")->store("uploads/System", "public");
            Storage::disk('public')->delete($caiDatWebsite->Bia_website);
        }

        DB::table("cai_dat_website")->where("id", $id)->update([
            "Favicon_website" => $Favicon_website,
            "Logo_website" => $Logo_website,
            "Bia_website" => $Bia_website,
            "TenCuaHang" => $request->input("TenCuaHang"),
            "TuKhoa" => $request->input("TuKhoa"),
            "MoTa" => $request->input("MoTa"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); // Cài Đặt Chung

        Config::set('mail.mailers.smtp.host', $request->input("smtp_host"));
        Config::set('mail.mailers.smtp.port', $request->input("smtp_port"));
        Config::set('mail.mailers.smtp.username', $request->input("smtp_email"));
        Config::set('mail.mailers.smtp.password', $request->input("smtp_password"));
        Config::set('mail.mailers.smtp.encryption', $request->input("smtp_encryption"));
        Config::set('mail.from.address', $request->input("smtp_email"));
        Config::set('mail.from.name', $request->input("TenCuaHang"));

        // $data = [
        //     'subject' => "ManhDev",
        //     'message' => 'Thiết Kế Website'
        // ];

        // Mail::to("namvdph47498@fpt.edu.vn")->send(new ThongBaoMail($data));

        DB::table("smtp_mail")->where("id", 1)->update([
            "smtp_status" => $request->input("smtp_status"),
            "smtp_host" => $request->input("smtp_host"),
            "smtp_encryption" => $request->input("smtp_encryption"),
            "smtp_port" => $request->input("smtp_port"),
            "smtp_email" => $request->input("smtp_email"),
            "smtp_password" => $request->input("smtp_password"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật thông tin kết nối Mail

        DB::table("pay_os")->where("id", 1)->update([
            "Client_ID" => $request->input("PayOs_Client_ID"),
            "API_Key" => $request->input("PayOs_API_Key"),
            "Checksum_Key" => $request->input("PayOs_Checksum_Key"),
            "status" => $request->input("PayOs_status"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật cổng thanh toán

        DB::table("noi_dung_gui_mail")->where("Loai", "order_buy")->update([
            "TieuDe" => $request->input("email_temp_subject_buy_order"),
            "NoiDung" => $request->input("email_temp_content_buy_order"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật nội dung Mail mua hàng

        DB::table("noi_dung_gui_mail")->where("Loai", "alert_login")->update([
            "TieuDe" => $request->input("email_temp_subject_warning_login"),
            "NoiDung" => $request->input("email_temp_content_warning_login"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật nội dung Mail mua hàng

        DB::table("noi_dung_gui_mail")->where("Loai", "forgot_password")->update([
            "TieuDe" => $request->input("email_temp_subject_forgot_password"),
            "NoiDung" => $request->input("email_temp_content_forgot_password"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật nội dung Mail mua hàng



        DB::table("tien_ich_website")->where("Loai", "support_zalo")->update([
            "TrangThai" => $request->input("TienIchZalo_status"),
            "SoDienThoai" => $request->input("TienIchZalo_phone"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật tiện ích

        DB::table("tien_ich_website")->where("Loai", "support_zalo_2")->update([
            "TrangThai" => $request->input("TienIchZalo2_status"),
            "SoDienThoai" => $request->input("TienIchZalo2_phone"),
            "DuongDan" => $request->input("TienIchZalo2_DuongDan"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật tiện ích

        DB::table("tien_ich_website")->where("Loai", "support_phone")->update([
            "TrangThai" => $request->input("TienIchPhone_status"),
            "SoDienThoai" => $request->input("TienIchPhone_phone"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật tiện ích

        DB::table("tien_ich_website")->where("Loai", "live_chat")->update([
            "TrangThai" => $request->input("liveChat_status"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật tiện ích


        DB::table("cai_dat_giao_dien_website")->where("Loai", "categoris_product_new_home")->update([
            "GiaTri" => $request->input("product_new_home"),
            "TrangThai" => $request->input("product_new_home"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật giao diện

        DB::table("cai_dat_giao_dien_website")->where("Loai", "categoris_product_sale_home")->update([
            "GiaTri" => $request->input("product_sale_home"),
            "TrangThai" => $request->input("product_sale_home"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật giao diện

        DB::table("cai_dat_giao_dien_website")->where("Loai", "quantity_product_home")->update([
            "GiaTri" => $request->input("product_sale_home"),
            "TrangThai" => $request->input("product_sale_home"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật giao diện

        DB::table("cai_dat_giao_dien_website")->where("Loai", "quantity_product_home")->update([
            "GiaTri" => $request->input("amount_product_home"),
            "TrangThai" => "1",
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật giao diện

        DB::table("cai_dat_giao_dien_website")->where("Loai", "style_product_home")->update([
            "GiaTri" => $request->input("product_style_home"),
            "TrangThai" => "1",
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật giao diện

        DB::table("cai_dat_giao_dien_website")->where("Loai", "product_cate_quality_trademark_home")->update([
            "GiaTri" => $request->input("product_cate_quality_trademark_home"),
            "TrangThai" => $request->input("product_cate_quality_trademark_home"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật giao diện

        DB::table("cai_dat_giao_dien_website")->where("Loai", "news_author_home")->update([
            "GiaTri" => $request->input("news_author_home"),
            "TrangThai" => $request->input("news_author_home"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật giao diện

        DB::table("cai_dat_giao_dien_website")->where("Loai", "news_view_home")->update([
            "GiaTri" => $request->input("news_view_home"),
            "TrangThai" => $request->input("news_view_home"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật giao diện

        DB::table("cai_dat_giao_dien_website")->where("Loai", "news_comment_home")->update([
            "GiaTri" => $request->input("news_comment_home"),
            "TrangThai" => $request->input("news_comment_home"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật giao diện

        DB::table("cai_dat_giao_dien_website")->where("Loai", "message_status_home")->update([
            "GiaTri" => $request->input("message_status_home"),
            "TrangThai" => $request->input("message_status_home"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật giao diện

        DB::table("cai_dat_giao_dien_website")->where("Loai", "message_home")->update([
            "GiaTri" => $request->input("message_home"),
            "TrangThai" => $request->input("message_status_home"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật giao diện

        DB::table("cai_dat_giao_dien_website")->where("Loai", "3_banners_status_home")->update([
            "GiaTri" => $request->input("3_banners_status_home"),
            "TrangThai" => $request->input("3_banners_status_home"),
            "updated_at" => date("Y/m/d H:i:s")
        ]); //Cập nhật giao diện

        DB::commit();

        return redirect()->route("CaiDatWebsite.index")->with("success", "Cập Nhật Tất Cả Thông Tin Thành Công!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
