<?php

namespace App\Http\Controllers\clients;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class ViController extends Controller
{
    public function index()
    {
        return view("Clients.ViTien.Vi");
    }

    public function NapTien()
    {
        return view("Clients.ViTien.NapTien");
    }

    public function TaoQr(Request $request)
    {
        DB::beginTransaction();

        $checkMaNapTien = DB::table("danh_sach_tao_qr")
            ->where("ID_User", Auth::user()->id)
            ->where("TrangThai", "dangxuly");
        if ($checkMaNapTien->count() >= 3) {
            return response()->json([
                "status" => "error",
                "message" => "Bạn Đang Có " . $checkMaNapTien->count() . " Đơn Nạp Tiền Chưa Được Thanh Toán, Vui Lòng Vào Lịch Sử Giao Dịch Để Nạp Hoặc Chờ Đơn Hết Hạn"
            ]);
        }

        $PayOS = DB::table("pay_os")->where("id", 1)->first();
        if (!$PayOS) {
            return response()->json([
                "status" => "error",
                "message" => "Thanh Toán Ngân Hàng Đang Bảo Trì, Vui Lòng Quay Lại Sau!"
            ]);
        }

        $apiKey = $PayOS->API_Key;
        $clientId = $PayOS->Client_ID;
        $checksumKey = $PayOS->Checksum_Key;
        $orderCode = time();

        if (empty($request->input("money"))) {
            return response()->json([
                "status" => "error",
                "message" => "Vui Lòng Nhập Số Tiền Cần Nạp"
            ]);
        }

        if ($request->input("money") < 10000) {
            return response()->json([
                "status" => "error",
                "message" => "Số Tiền Nạp Tối Thiểu ₫10.000"
            ]);
        }

        $data = [
            "amount" => (int) $request->input("money"),
            "cancelUrl" => route('payos.cancel'),
            "description" => Auth::user()->id,
            "orderCode" => $orderCode,
            "returnUrl" => url('/vi/nap-tien'),
        ];

        $signatureString = "amount={$data['amount']}&cancelUrl={$data['cancelUrl']}&description={$data['description']}&orderCode={$data['orderCode']}&returnUrl={$data['returnUrl']}";
        $signature = hash_hmac('sha256', $signatureString, $checksumKey);
        $data["signature"] = $signature;

        $response = Http::withHeaders([
            "x-client-id" => $clientId,
            "x-api-key" => $apiKey,
            "Content-Type" => "application/json"
        ])->post("https://api-merchant.payos.vn/v2/payment-requests", $data);
        $result = $response->json();

        if (isset($result['data']['checkoutUrl'])) {
            DB::table("danh_sach_tao_qr")->insert([
                "paymentLinkId" => $result['data']['paymentLinkId'],
                "orderCode" => $result['data']['orderCode'],
                "ID_User" => Auth::user()->id,
                "SoTienNap" => $request->input("money"),
                "ThoiGianNap" => time(),
                "TrangThai" => "dangxuly",
                "ThoiGianKetThuc" => strtotime("+5 minute", time()),
                "created_at" => now()
            ]);

            DB::commit();

            return response()->json([
                "status" => "success",
                "message" => "Tạo Mã QR Thành Công, Vui Lòng Quét Để Nạp Tiền",
                "qrCode" => $result['data']['qrCode']
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Lỗi, Vui Lòng Tải Lại Trang Và Thử Lại!"
            ]);
        }
    }

    public function RutTien()
    {
        $nganHang = DB::table("ngan_hang")->get();
        return view("Clients.ViTien.RutTien", compact("nganHang"));
    }


    public function LichSu()
    {
        $lichSu = DB::table("lich_su_giao_dich_vi")
            ->where("ID_User", Auth::id())
            ->orderByDesc("id")
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('Y-m');
            })
            ->sortKeysDesc();

        return view("clients.ViTien.LichSu", compact("lichSu"));
    }

    public function RutTienStore(Request $request)
    {
        DB::beginTransaction();

        $checkBank = DB::table("ngan_hang")->where("bin", $request->input("banking"))->first();

        if (empty($request->input("money"))) {
            return response()->json([
                "status" => "error",
                "message" => "Vui Lòng Nhập Số Tiền"
            ]);
        }

        if ($request->input("money") < 10000) {
            return response()->json([
                "status" => "error",
                "message" => "Số Tiền Rút Tối Thiểu ₫10.000"
            ]);
        }

        if ($request->input("money") > Auth::user()->price) {
            return response()->json([
                "status" => "error",
                "message" => "Số Dư Ví Không Đủ Để Rút Tiền"
            ]);
        }

        if (empty($request->input("banking"))) {
            return response()->json([
                "status" => "error",
                "message" => "Vui Lòng Chọn Ngân Hàng Nhận Tiền"
            ]);
        }

        if (!$checkBank) {
            return response()->json([
                "status" => "error",
                "message" => "Ngân Hàng Không Tồn Tại!"
            ]);
        }

        if (empty($request->input("nameBank"))) {
            return response()->json([
                "status" => "error",
                "message" => "Vui Lòng Nhập Tên Chủ Tài Khoản"
            ]);
        }

        if (strlen($request->input("nameBank")) <= 6) {
            return response()->json([
                "status" => "error",
                "message" => "Tên Chủ Tài Khoản Không Hợp Lệ"
            ]);
        }

        if (empty($request->input("numberBank"))) {
            return response()->json([
                "status" => "error",
                "message" => "Vui Lòng Nhập Số Tài Khoản Ngân Hàng Nhận Tiền"
            ]);
        }

        if (strlen($request->input("numberBank")) < 4) {
            return response()->json([
                "status" => "error",
                "message" => "Số Tài Tài Khoản Không Hợp Lệ"
            ]);
        }

        if (empty($request->input("password"))) {
            return response()->json([
                "status" => "error",
                "message" => "Vui Lòng Nhập Mật Khẩu Tài Khoản Của Bạn"
            ]);
        }

        if (!Hash::check($request->input("password"), Auth::user()->password)) {
            return response()->json([
                "status" => "error",
                "message" => "Mật Khẩu Không Chính Xác!"
            ]);
        }

        if ($request->input("saveInfo") == "on") {
            DB::table(table: "users")->where("id", Auth::user()->id)->update([
                "nameBank" => $request->input("nameBank"),
                "numberBank" => $request->input("numberBank"),
                "banking" => $request->input("banking"),
            ]);
        }

        $trading = strtoupper(Str::random(8));

        DB::table("lich_su_giao_dich_vi")->insert([
            "ID_User" => Auth::user()->id,
            "MaGiaoDich" => $trading,
            "TieuDe" => "Rút Tiền Tới Tài Khoản Ngân Hàng: " . $request->input("numberBank"),
            "SoTien" => $request->input("money"),
            "TheLoai" => "withdraw",
            "TrangThai" => "dangxuly",
            "namebank" => $request->input("nameBank"),
            "numberBank" => $request->input("numberBank"),
            "banking" => $request->input("banking"),
            "created_at" => now()
        ]);

        DB::table("users")->where("id", Auth::user()->id)->update([
            "price" => (Auth::user()->price - $request->input("money")),
        ]);

        DB::commit();

        return response()->json([
            "status" => "success",
            "message" => "Rút Tiền Thành Công!",
            "redirect" => route("vi.LichSu")
        ]);
    }

    public function ChiTietGiaoDich(Request $request, $code)
    {
        $donHang = DB::table("lich_su_giao_dich_vi")->where("MaGiaoDich", $code)->first();

        if (!$donHang) {
            return redirect()->route("vi.LichSu");
        }

        if ($donHang->TheLoai == "withdraw") {
            $nganHangRutTien = DB::table("ngan_hang")->where("bin", $donHang->banking)->first();
        } else {
            $nganHangRutTien = [];
        }
        return view("clients.ViTien.ChiTietGiaoDich", compact("donHang", "nganHangRutTien"));
    }
}
