<?php

namespace App\Http\Controllers\Methods;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class PayOSController extends Controller
{

    public function callback(Request $request)
    {
        $orderCode = $request->input("orderCode");
        DB::beginTransaction();

        if (!$orderCode) {
            return abort(500, "Thiếu Truy Vấn");
        }

        $donHang = DB::table("don_hang")->where("orderCode", $orderCode)->first();

        if (!$donHang) {
            return abort(404, "Đơn Hàng Không Hợp Lệ");
        }

        if ($request->input("status") == "PAID") {
            DB::table("don_hang")->where("orderCode", $orderCode)->update([
                "TrangThaiThanhToan" => "dathanhtoan"
            ]);

            $list_product = DB::table("san_pham_don_hang")->where("MaDonHang", $donHang->MaDonHang)->get();
            $html_product = '<table border="1" cellpadding="5" cellspacing="0"><tr><th>Tên sản phẩm</th><th>Số lượng</th><th>Giá</th></tr>';
            foreach ($list_product as $sp) {
                $tenSanPham = $sp->TenSanPham;
                $soLuong = $sp->SoLuong;
                $gia = number_format($sp->GiaTien) . 'đ';
                $html_product .= "<tr><td>{$tenSanPham}</td><td>{$soLuong}</td><td>{$gia}</td></tr>";
            }
            $html_product .= '</table>';

            Session::forget('order_code');
            $smtp_mail = DB::table("smtp_mail")->where("id", "1")->first();
            $caiDatWebsite = DB::table("cai_dat_website")->where("id", 1)->first();
            Config::set('mail.mailers.smtp.host', $smtp_mail->smtp_host);
            Config::set('mail.mailers.smtp.port', $smtp_mail->smtp_port);
            Config::set('mail.mailers.smtp.username', $smtp_mail->smtp_email);
            Config::set('mail.mailers.smtp.password', $smtp_mail->smtp_password);
            Config::set('mail.mailers.smtp.encryption', $smtp_mail->smtp_encryption);
            Config::set('mail.from.address', $smtp_mail->smtp_email);
            Config::set('mail.from.name', $caiDatWebsite->TenCuaHang);

            $noiDungDonHang = DB::table("noi_dung_gui_mail")->where("Loai", "order_buy")->first();

            $data = [
                'domain'   => url('/'),
                'title'    => $caiDatWebsite->TenCuaHang ?? 'Tên website mặc định',
                'username' => Auth::user()->name ?? 'Khách',
                'ip'       => request()->ip(),
                'device'   => $request->header('User-Agent'),
                'time'     => now()->format(format: 'd/m/Y H:i:s'),
                'trans_id' => $donHang->MaDonHang,
                'list_product' => $html_product
            ];

            $message = str_replace(
                ["{domain}", "{title}", "{username}", "{ip}", "{device}", "{time}", "{trans_id}", "{list_product}"],
                [$data['domain'], $data['title'], $data['username'], $data['ip'], $data['device'], $data['time'], $donHang->MaDonHang, $data['list_product']],
                $noiDungDonHang->NoiDung
            );

            $data['subject'] = 'Đơn hàng của bạn đã được tạo thành công!';
            $data['message'] = $message;

            Mail::to(Auth::user()->email)->send(new \App\Mail\ThongBaoMail($data));
        } else {
            DB::table("don_hang")->where("orderCode", $orderCode)->update([
                "TrangThaiThanhToan" => "huythanhtoan",
                "TrangThai" => "thatbai"
            ]);
        }

        DB::commit();

        Session::forget('order_code');

        return redirect()->route("payment.success", $donHang->MaDonHang)->with("success", "Tạo Đơn Hàng Thành Công!");
    }

    public function cancel(Request $request)
    {
        if ($request->input("status") == "CANCELLED" && $request->input("cancel") == true) {
            $thongTinDonHang = DB::table("don_hang")->where("orderCode", $request->input("orderCode"))->first();
            if ($thongTinDonHang) {
                DB::table("don_hang")->where("orderCode", $request->input("orderCode"))->update([
                    "TrangThaiThanhToan" => "huythanhtoan",
                    "TrangThai" => "thatbai"
                ]);

                DB::commit();
            } else {
                return redirect()->route("gio-hang.index")->with("error", "Đơn Hàng Không Tồn Tại");
            }

            return redirect()->route("gio-hang.index")->with("success", "Đã Hủy Thanh Toán Hóa Đơn");
        }
    }
}
