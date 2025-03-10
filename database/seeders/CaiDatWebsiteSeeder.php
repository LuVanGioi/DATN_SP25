<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CaiDatWebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cài Đặt Thông Tin Website
        DB::table('cai_dat_website')->insert([
            'id' => '1',
            'Favicon_website' => 'Mẫu',
            'Logo_website' => 'Mẫu',
            'Bia_website' => 'Mẫu',
            'TenCuaHang' => 'Mẫu',
            'TuKhoa' => 'Mẫu',
            'MoTa' => 'Mẫu',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        // Kết Nối
        DB::table('smtp_mail')->insert([
            'id' => '1',
            'smtp_status' => '0',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_encryption' => 'tls',
            'smtp_port' => '587',
            'smtp_email' => 'Mẫu',
            'smtp_password' => 'Mẫu',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('re_captcha')->insert([
            'id' => '1',
            'reCAPTCHA_status' => '0',
            'reCAPTCHA_site_key' => 'Mẫu',
            'reCAPTCHA_secret_key' => 'Mẫu',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        // Nội Dung Gửi Mail
        DB::table('noi_dung_gui_mail')->insert([
            'Loai' => 'order_buy',
            'TieuDe' => 'Chi tiết đơn hàng {product} - {title}',
            'NoiDung' => 'Nội Dung Mua Hàng',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('noi_dung_gui_mail')->insert([
            'Loai' => 'alert_login',
            'TieuDe' => 'Cảnh báo đăng nhập tài khoản - {title}',
            'NoiDung' => 'Nội Dung Cảnh Báo',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('noi_dung_gui_mail')->insert([
            'Loai' => 'forgot_password',
            'TieuDe' => 'Xác nhận khôi phục mật khẩu website - {title}',
            'NoiDung' => 'Nội Dung Mua Hàng',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        // Tiện Ích
        DB::table('tien_ich_website')->insert([
            'Loai' => 'support_zalo',
            'TrangThai' => '0',
            'SoDienThoai' => '0123456789',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('tien_ich_website')->insert([
            'Loai' => 'support_zalo_2',
            'TrangThai' => '0',
            'SoDienThoai' => '0123456789',
            'DuongDan' => 'Đường Dẫn Facebook',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('tien_ich_website')->insert([
            'Loai' => 'support_phone',
            'TrangThai' => '0',
            'SoDienThoai' => '0123456789',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('tien_ich_website')->insert([
            'Loai' => 'live_chat',
            'TrangThai' => '0',
            'MaJava' => 'Mã Code JsSript Tại Đây',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        // Giao Diện
        DB::table('cai_dat_giao_dien_website')->insert([
            'Loai' => 'categoris_product_new_home',
            'TrangThai' => '0',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('cai_dat_giao_dien_website')->insert([
            'Loai' => 'categoris_product_sale_home',
            'TrangThai' => '0',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('cai_dat_giao_dien_website')->insert([
            'Loai' => 'quantity_product_home',
            'TrangThai' => '1',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('cai_dat_giao_dien_website')->insert([
            'Loai' => 'style_product_home',
            'TrangThai' => '1',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('cai_dat_giao_dien_website')->insert([
            'Loai' => 'product_cate_quality_trademark_home',
            'TrangThai' => '1',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('cai_dat_giao_dien_website')->insert([
            'Loai' => 'news_author_home',
            'TrangThai' => '1',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('cai_dat_giao_dien_website')->insert([
            'Loai' => 'news_view_home',
            'TrangThai' => '1',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('cai_dat_giao_dien_website')->insert([
            'Loai' => 'news_comment_home',
            'TrangThai' => '1',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('cai_dat_giao_dien_website')->insert([
            'Loai' => 'message_status_home',
            'TrangThai' => '1',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('cai_dat_giao_dien_website')->insert([
            'Loai' => 'message_home',
            'TrangThai' => '1',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

        DB::table('cai_dat_giao_dien_website')->insert([
            'Loai' => '3_banners_status_home',
            'TrangThai' => '1',
            'created_at' => date('Y/m/d H:i:s') 
        ]);

    }
}
