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
        DB::table('cai_dat_website')->truncate();

        DB::table('cai_dat_website')->insert([
            'id' => 1,
            'Favicon_website' => 'Mẫu',
            'Logo_website' => 'Mẫu',
            'Bia_website' => 'Mẫu',
            'TenCuaHang' => 'Mẫu',
            'TuKhoa' => 'Mẫu',
            'MoTa' => 'Mẫu',
            'created_at' => now()
        ]);


        // Kết Nối
        DB::table('smtp_mail')->truncate();

DB::table('smtp_mail')->insert([
    'id' => 1,
    'smtp_status' => 0,
    'smtp_host' => 'smtp.gmail.com',
    'smtp_encryption' => 'tls',
    'smtp_port' => 587,
    'smtp_email' => 'Mẫu',
    'smtp_password' => 'Mẫu',
    'created_at' => now()
]);



        // Nội Dung Gửi Mail
        DB::table('noi_dung_gui_mail')->insert([
            'Loai' => 'order_buy',
            'TieuDe' => 'Chi tiết đơn hàng - {title}',
            'NoiDung' => '<p>Xin Ch&agrave;o, {username}</p>

<p>Cảm ơn bạn đ&atilde; mua h&agrave;ng tại cửa h&agrave;ng của ch&uacute;ng t&ocirc;i! &nbsp;<br />
M&atilde; giao dịch của bạn l&agrave;: {trans_id}</p>

<p>Ch&uacute;ng t&ocirc;i sẽ xử l&yacute; v&agrave; giao h&agrave;ng sớm nhất c&oacute; thể. &nbsp;<br />
Nếu bạn cần hỗ trợ, vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i c&ugrave;ng m&atilde; giao dịch để được phục vụ nhanh hơn.</p>

<p>Ch&uacute;c bạn một ng&agrave;y tuyệt vời!</p>

<p>Tr&acirc;n trọng, {title}</p>

<p>{list_product}</p>

<p>Thời gian:&nbsp;{time}</p>',
            'created_at' => date('Y/m/d H:i:s')
        ]);

        DB::table('noi_dung_gui_mail')->insert([
            'Loai' => 'alert_login',
            'TieuDe' => 'Cảnh báo đăng nhập tài khoản - {title}',
            'NoiDung' => '<p>Xin ch&agrave;o, {username}</p>

<p>Bạn vừa đăng nhập v&agrave;o t&agrave;i khoản của m&igrave;nh tại {domain}.</p>

<p>Th&ocirc;ng tin đăng nhập:<br />
- Thời gian: {time}<br />
- Địa chỉ IP: {ip}<br />
- Thiết bị: {device}</p>

<p>Nếu đ&acirc;y kh&ocirc;ng phải l&agrave; bạn, vui l&ograve;ng đổi mật khẩu ngay lập tức v&agrave; li&ecirc;n hệ với bộ phận hỗ trợ của ch&uacute;ng t&ocirc;i để đảm bảo an to&agrave;n cho t&agrave;i khoản.</p>

<p>Cảm ơn bạn đ&atilde; sử dụng dịch vụ của ch&uacute;ng t&ocirc;i!</p>

<p>Tr&acirc;n trọng, {title}</p>',
            'created_at' => date('Y/m/d H:i:s')
        ]);

        DB::table('noi_dung_gui_mail')->insert([
            'Loai' => 'forgot_password',
            'TieuDe' => 'Xác nhận khôi phục mật khẩu website - {title}',
            'NoiDung' => '<p>Xin ch&agrave;o, {username}</p>

<p>Ch&uacute;ng t&ocirc;i đ&atilde; nhận được y&ecirc;u cầu kh&ocirc;i phục mật khẩu cho t&agrave;i khoản của bạn tại {domain}.</p>

<p>Nếu bạn l&agrave; người thực hiện y&ecirc;u cầu n&agrave;y, vui l&ograve;ng nhấn v&agrave;o li&ecirc;n kết b&ecirc;n dưới để đặt lại mật khẩu:</p>

<p>{link}</p>

<p>Li&ecirc;n kết n&agrave;y sẽ hết hạn sau 5 ph&uacute;t v&agrave; chỉ c&oacute; thể sử dụng một lần.</p>

<p>Nếu bạn <strong>**kh&ocirc;ng y&ecirc;u cầu kh&ocirc;i phục mật khẩu**</strong>, vui l&ograve;ng bỏ qua email n&agrave;y. T&agrave;i khoản của bạn vẫn an to&agrave;n.</p>

<p>Tr&acirc;n trọng, {title}</p>',
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
