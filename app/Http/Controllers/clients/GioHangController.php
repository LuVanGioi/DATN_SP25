<?php

namespace App\Http\Controllers\clients;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\clients\cartRequest;

class GioHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.GioHang.GioHang');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->action === 'add_to_cart') {
            DB::beginTransaction();

            if (Auth::check()) {
                $userId = Auth::user()->ID_Guests ?? Auth::user()->id;
            } else {
                $userId = request()->cookie('ID_Guests', Str::uuid());
                Cookie::queue('ID_Guests', $userId, 60 * 24 * 365);
            }

            $checkCart = DB::table('cart')
                ->where('ID_KhachHang', $userId)
                ->where("ID_SanPham", $request->input("id_product"))
                ->where("KichCo", $request->input("size"))
                ->where("MauSac", $request->input("color"))
                ->first();

            if (!$request->input("quantity")) {
                return response()->json([
                    "status" => "error",
                    "message" => "Vui Lòng Nhập Số Lượng"
                ]);
            }

            if ($request->input("quantity") <= 0) {
                return response()->json([
                    "status" => "error",
                    "message" => "Số Lượng Tối Thiểu Là 1"
                ]);
            }

            $sanPhamAdd = DB::table("san_pham")
                ->where("id", $request->input("id_product"))->first();
            if ($sanPhamAdd->TheLoai == "bienThe") {
                if (!$request->input("size")) {
                    return response()->json([
                        "status" => "error",
                        "message" => "Vui Lòng Chọn Kích Cỡ"
                    ]);
                }

                if (!$request->input("color")) {
                    return response()->json([
                        "status" => "error",
                        "message" => "Vui Lòng Chọn Màu Sắc"
                    ]);
                }

                if ($checkCart) {
                    $thongTinBienThe = DB::table("bien_the_san_pham")
                        ->where("ID_SanPham", $request->input("id_product"))
                        ->where("ID_MauSac", DB::table("mau_sac")
                        ->where("id", $checkCart->MauSac)
                        ->first()->id)
                        ->where("KichCo", $checkCart->KichCo)->first();

                    $checkGioHang = DB::table("cart")
                    ->where("ID_SanPham", $request->input("id_product"))
                    ->where("KichCo", $request->input("size"))
                    ->where("MauSac", $request->input("color"))
                    ->first();

                    if ($request->input("quantity") > $thongTinBienThe->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Sản Phẩm Chỉ Còn " . number_format($thongTinBienThe->SoLuong)
                        ]);
                    }

                    if ($checkGioHang->SoLuong > $thongTinBienThe->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Bạn đã có " . number_format($checkGioHang->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                        ]);
                    }

                    if ($checkGioHang->SoLuong >= $thongTinBienThe->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Bạn đã có " . number_format($checkGioHang->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                        ]);
                    }

                    $congSoLuong = $checkCart->SoLuong + $request->input("quantity");
                    if ($congSoLuong > $thongTinBienThe->SoLuong) {
                        $congSoLuong = $thongTinBienThe->SoLuong;
                    }

                    DB::table("cart")->where("id", $checkCart->id)->update([
                        "SoLuong" => $congSoLuong
                    ]);

                    DB::commit();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Đã cập nhật giỏ hàng!'
                    ]);
                } else {
                    DB::table("cart")->insert([
                        "ID_KhachHang" => $userId,
                        "ID_SanPham" => $request->input("id_product"),
                        "KichCo" => $request->input("size"),
                        "MauSac" => $request->input("color"),
                        "SoLuong" => $request->input("quantity"),
                        "Xoa" => "0",
                        "created_at" => now()
                    ]);

                    $thongTinGioHangMoi = DB::table('cart')
                        ->where('ID_KhachHang', $userId)
                        ->where("ID_SanPham", $request->input("id_product"))
                        ->where("KichCo", $request->input("size"))
                        ->where("MauSac", $request->input("color"))
                        ->first();

                    $thongTinBienThe = DB::table("bien_the_san_pham")->where("ID_SanPham", $thongTinGioHangMoi->ID_SanPham)
                        ->where("ID_MauSac", DB::table("mau_sac")->where("id", $thongTinGioHangMoi->MauSac)->first()->id)
                        ->where("KichCo", $thongTinGioHangMoi->KichCo)->first();

                    if ($request->input("quantity") > $thongTinBienThe->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Sản Phẩm Chỉ Còn " . number_format($thongTinBienThe->SoLuong)
                        ]);
                    }
                    if ($thongTinGioHangMoi->SoLuong > $thongTinBienThe->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Bạn đã có " . number_format($thongTinGioHangMoi->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                        ]);
                    }

                    DB::commit();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Đã thêm sản phẩm vào giỏ hàng!'
                    ]);
                }
            } else {
                if ($checkCart) {
                    $thongTinSanPhamThuong = DB::table("san_pham")->where("id", $request->input("id_product"))->first();
                    if ($request->input("quantity") > $thongTinSanPhamThuong->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Sản Phẩm Chỉ Còn " . number_format($thongTinSanPhamThuong->SoLuong)
                        ]);
                    }
                    $checkGioHang = DB::table("cart")
                        ->where("ID_SanPham", $request->input("id_product"))
                        ->where("KichCo", "=", null)
                        ->where("MauSac", "=", null)
                        ->first();

                    if ($checkGioHang->SoLuong > $thongTinSanPhamThuong->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Bạn đã có " . number_format($checkGioHang->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                        ]);
                    }

                    $tinhGioHang = $checkGioHang->SoLuong + $request->input("quantity");
                    if ($tinhGioHang > $thongTinSanPhamThuong->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Bạn đã có " . number_format($checkGioHang->SoLuong) . " sản phẩm trong giỏ hàng. " . ($thongTinSanPhamThuong->SoLuong - $checkGioHang->SoLuong == 0 ? "Bạn không thể thêm nữa vì quá số lượng sản phẩm tồn kho" : "Bạn chỉ có thể thêm " . number_format($thongTinSanPhamThuong->SoLuong - $checkGioHang->SoLuong) . " vào giỏ hàng")
                        ]);
                    }

                    if ($checkCart->SoLuong >= $thongTinSanPhamThuong->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Bạn đã có " . number_format($checkCart->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                        ]);
                    }

                    $congSoLuong = $checkCart->SoLuong + $request->input("quantity");
                    if ($congSoLuong > $thongTinSanPhamThuong->SoLuong) {
                        $congSoLuong = $thongTinSanPhamThuong->SoLuong;
                    }

                    DB::table("cart")->where("id", $checkCart->id)->update([
                        "SoLuong" => $congSoLuong
                    ]);

                    DB::commit();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Đã cập nhật giỏ hàng!'
                    ]);
                } else {
                    DB::table("cart")->insert([
                        "ID_KhachHang" => $userId,
                        "ID_SanPham" => $request->input("id_product"),
                        "KichCo" => $request->input("size"),
                        "MauSac" => $request->input("color"),
                        "SoLuong" => $request->input("quantity"),
                        "Xoa" => "0",
                        "created_at" => now()
                    ]);

                    $thongTinGioHangMoi = DB::table('cart')
                        ->where('ID_KhachHang', $userId)
                        ->where("ID_SanPham", $request->input("id_product"))
                        ->where("KichCo", $request->input("size"))
                        ->where("MauSac", $request->input("color"))
                        ->first();

                    $thongTinSanPhamThuong = DB::table("san_pham")->where("id", $request->input("id_product"))->first();

                    if ($request->input("quantity") > $thongTinSanPhamThuong->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Sản Phẩm Chỉ Còn " . number_format($thongTinSanPhamThuong->SoLuong)
                        ]);
                    }
                    if ($thongTinGioHangMoi->SoLuong > $thongTinSanPhamThuong->SoLuong) {
                        return response()->json([
                            "status" => "error",
                            "message" => "Bạn đã có " . number_format($thongTinGioHangMoi->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn."
                        ]);
                    }

                    DB::commit();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Đã thêm sản phẩm vào giỏ hàng!'
                    ]);
                }
            }
        } elseif ($request->action === 'buy_now') {
            DB::beginTransaction();

            if (Auth::check()) {
                $userId = Auth::user()->ID_Guests ?? Auth::user()->id;
            } else {
                $userId = request()->cookie('ID_Guests', Str::uuid());
                Cookie::queue('ID_Guests', $userId, 60 * 24 * 365);
            }

            $sanPham = DB::table("san_pham")
                ->where("id", $request->input("id_product"))
                ->where("san_pham.Xoa", "=", 0)
                ->where("TrangThai", "hien")
                ->first();

            if (!$sanPham) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Sản Phẩm Không Tồn Tại'
                ]);
            }
            if ($sanPham->TheLoai == "bienThe") {
                $checkCart = DB::table('cart')
                    ->join("san_pham", function ($join) {
                        $join->on("cart.ID_SanPham", "=", "san_pham.id")
                            ->where("san_pham.TheLoai", "=", "bienThe")
                            ->where("san_pham.Xoa", "=", 0)
                            ->where("TrangThai", "hien");
                    })
                    ->where("KichCo", $request->input("size"))
                    ->where("MauSac", $request->input("color"))
                    ->where('cart.ID_KhachHang', $userId)
                    ->where("cart.ID_SanPham", $request->input("id_product"))
                    ->selectRaw("cart.id as idCart, cart.SoLuong as SoLuongCart, cart.*, san_pham.*")
                    ->first();

                if (!$request->input("size")) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Vui Lòng Chọn Kích Cỡ'
                    ]);
                }

                if (!$request->input("color")) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Vui Lòng Chọn Màu Sắc'
                    ]);
                }

                if ($checkCart) {
                    $layLaiThongTin = DB::table('cart')
                        ->join("san_pham", function ($join) {
                            $join->on("cart.ID_SanPham", "=", "san_pham.id")
                                ->where("san_pham.TheLoai", "=", "bienThe")
                                ->where("san_pham.Xoa", "=", 0)
                                ->where("TrangThai", "hien");
                        })
                        ->where("KichCo", $request->input("size"))
                        ->where("MauSac", $request->input("color"))
                        ->where('cart.ID_KhachHang', $userId)
                        ->where("cart.ID_SanPham", $request->input("id_product"))
                        ->selectRaw("cart.id as idCart, cart.SoLuong as SoLuongCart, cart.*, san_pham.*")
                        ->first();

                    $thongTinBT = DB::table("bien_the_san_pham")
                        ->where("ID_SanPham", $layLaiThongTin->ID_SanPham)
                        ->where("ID_MauSac", $layLaiThongTin->MauSac)
                        ->where("KichCo", $layLaiThongTin->KichCo)
                        ->first();

                    if ($request->input("quantity") > $thongTinBT->SoLuong) {
                        if ($layLaiThongTin->SoLuongCart < $thongTinBT->SoLuong) {
                            DB::table("cart")->where("id", $checkCart->idCart)->update([
                                "SoLuong" => $checkCart->SoLuongCart + $request->input("quantity")
                            ]);
                        }


                        if ($layLaiThongTin->SoLuongCart > $thongTinBT->SoLuong) {
                            DB::table("cart")->where("id", $layLaiThongTin->idCart)->update([
                                "SoLuong" => $thongTinBT->SoLuong
                            ]);
                        }

                        if ($request->input("quantity") > $thongTinBT->SoLuong) {
                            return response()->json([
                                'status' => 'error',
                                'message' => 'Sản Phẩm Chỉ Còn ' . number_format($thongTinBT->SoLuong)
                            ]);
                        }
                    } else {
                        DB::table("cart")->where("id", $layLaiThongTin->idCart)->update([
                            "SoLuong" => $request->input("quantity")
                        ]);
                    }

                    $orderCode = strtoupper(Str::random(40));
                    Session::put('order_code', $orderCode);
                    session()->forget('selected_products');
                    session([
                        'selected_products' => [
                            $layLaiThongTin->idCart
                        ]
                    ]);

                    DB::commit();

                    return response()->json([
                        'status' => 'success',
                        'message' => '',
                        'type' => 'payment',
                        'redirect' => route('payent', $orderCode)
                    ]);
                } else {
                    DB::table("cart")->insert([
                        "ID_KhachHang" => $userId,
                        "ID_SanPham" => $request->input("id_product"),
                        "KichCo" => $request->input("size"),
                        "MauSac" => $request->input("color"),
                        "SoLuong" => $request->input("quantity"),
                        "Xoa" => "0",
                        "created_at" => now()
                    ]);

                    $layLaiThongTin = DB::table('cart')
                        ->join("san_pham", function ($join) {
                            $join->on("cart.ID_SanPham", "=", "san_pham.id")
                                ->where("san_pham.TheLoai", "=", "bienThe")
                                ->where("san_pham.Xoa", "=", 0)
                                ->where("TrangThai", "hien");
                        })
                        ->where("KichCo", $request->input("size"))
                        ->where("MauSac", $request->input("color"))
                        ->where('cart.ID_KhachHang', $userId)
                        ->where("cart.ID_SanPham", $request->input("id_product"))
                        ->selectRaw("cart.id as idCart, cart.SoLuong as SoLuongCart, cart.*, san_pham.*")
                        ->first();

                    $thongTinBT = DB::table("bien_the_san_pham")
                        ->where("ID_SanPham", $layLaiThongTin->ID_SanPham)
                        ->where("ID_MauSac", $layLaiThongTin->MauSac)
                        ->where("KichCo", $layLaiThongTin->KichCo)
                        ->first();

                    $thongTinBT = DB::table("bien_the_san_pham")
                        ->where("ID_SanPham", $layLaiThongTin->ID_SanPham)
                        ->where("ID_MauSac", $layLaiThongTin->MauSac)
                        ->where("KichCo", $layLaiThongTin->KichCo)
                        ->first();

                    if ($request->input("quantity") > $thongTinBT->SoLuong) {
                        if ($layLaiThongTin->SoLuongCart < $thongTinBT->SoLuong) {
                            DB::table("cart")->where("id", $layLaiThongTin->idCart)->update([
                                "SoLuong" => $layLaiThongTin->SoLuongCart + $request->input("quantity")
                            ]);
                        }


                        if ($layLaiThongTin->SoLuongCart > $thongTinBT->SoLuong) {
                            DB::table("cart")->where("id", $layLaiThongTin->idCart)->update([
                                "SoLuong" => $thongTinBT->SoLuong
                            ]);
                        }

                        if ($request->input("quantity") > $thongTinBT->SoLuong) {
                            return response()->json([
                                'status' => 'error',
                                'message' => 'Sản Phẩm Chỉ Còn ' . number_format($thongTinBT->SoLuong)
                            ]);
                        }
                    } else {
                        DB::table("cart")->where("id", $layLaiThongTin->idCart)->update([
                            "SoLuong" => $request->input("quantity")
                        ]);
                    }

                    $orderCode = strtoupper(Str::random(40));
                    Session::put('order_code', $orderCode);
                    session()->forget('selected_products');
                    session([
                        'selected_products' => [
                            $layLaiThongTin->idCart
                        ]
                    ]);

                    DB::commit();

                    return response()->json([
                        'status' => 'success',
                        'type' => 'payment',
                        'message' => '',
                        'redirect' => route('payent', $orderCode)
                    ]);
                }
            } else {
                $checkCart = DB::table('cart')
                    ->join("san_pham", function ($join) {
                        $join->on("cart.ID_SanPham", "=", "san_pham.id")
                            ->where("san_pham.TheLoai", "=", "thuong")
                            ->where("san_pham.Xoa", "=", 0)
                            ->where("TrangThai", "hien");
                    })
                    ->where('cart.KichCo', "=", null)
                    ->where('cart.MauSac', "=", null)
                    ->where('cart.ID_KhachHang', $userId)
                    ->where("cart.ID_SanPham", $request->input("id_product"))
                    ->selectRaw("cart.id as idCart, cart.SoLuong as SoLuongCart, cart.*, san_pham.*")
                    ->first();

                if ($checkCart) {
                    $layLaiThongTin = DB::table('cart')
                        ->join("san_pham", function ($join) {
                            $join->on("cart.ID_SanPham", "=", "san_pham.id")
                                ->where("san_pham.TheLoai", "=", "thuong")
                                ->where("san_pham.Xoa", "=", 0)
                                ->where("TrangThai", "hien");
                        })
                        ->where('cart.KichCo', "=", null)
                        ->where('cart.MauSac', "=", null)
                        ->where('cart.ID_KhachHang', $userId)
                        ->where("cart.ID_SanPham", $request->input("id_product"))
                        ->selectRaw("cart.id as idCart, cart.SoLuong as SoLuongCart, cart.*, san_pham.*")
                        ->first();

                    $thongTinSanPhamThuong = DB::table("san_pham")->where("id", $request->input("id_product"))->first();

                    $layLaiThongTinNe = DB::table('cart')
                        ->join("san_pham", function ($join) {
                            $join->on("cart.ID_SanPham", "=", "san_pham.id")
                                ->where("san_pham.TheLoai", "=", "thuong")
                                ->where("san_pham.Xoa", "=", 0)
                                ->where("TrangThai", "hien");
                        })
                        ->where('cart.KichCo', "=", null)
                        ->where('cart.MauSac', "=", null)
                        ->where('cart.ID_KhachHang', $userId)
                        ->where("cart.ID_SanPham", $request->input("id_product"))
                        ->selectRaw("cart.id as idCart, cart.SoLuong as SoLuongCart, cart.*, san_pham.*")
                        ->first();

                    if ($request->input("quantity") > $thongTinSanPhamThuong->SoLuong) {
                        if ($layLaiThongTin->SoLuongCart < $thongTinSanPhamThuong->SoLuong) {
                            DB::table("cart")->where("id", $checkCart->idCart)->update([
                                "SoLuong" => $checkCart->SoLuongCart + $request->input("quantity")
                            ]);
                        }


                        if ($layLaiThongTinNe->SoLuongCart > $thongTinSanPhamThuong->SoLuong) {
                            DB::table("cart")->where("id", $layLaiThongTinNe->idCart)->update([
                                "SoLuong" => $thongTinSanPhamThuong->SoLuong
                            ]);
                        }

                        if ($request->input("quantity") > $thongTinSanPhamThuong->SoLuong) {
                            return response()->json([
                                'status' => 'error',
                                'message' => 'Sản Phẩm Chỉ Còn ' . number_format($thongTinSanPhamThuong->SoLuong)
                            ]);
                        }
                    } else {
                        DB::table("cart")->where("id", $layLaiThongTinNe->idCart)->update([
                            "SoLuong" => $request->input("quantity")
                        ]);
                    }

                    $orderCode = strtoupper(Str::random(40));
                    Session::put('order_code', $orderCode);
                    session()->forget('selected_products');
                    session([
                        'selected_products' => [
                            $layLaiThongTinNe->idCart
                        ]
                    ]);

                    DB::commit();

                    return response()->json([
                        'status' => 'success',
                        'message' => '',
                        'type' => 'payment',
                        'redirect' => route('payent', $orderCode)
                    ]);
                } else {
                    DB::table("cart")->insert([
                        "ID_KhachHang" => $userId,
                        "ID_SanPham" => $request->input("id_product"),
                        "KichCo" => $request->input("size"),
                        "MauSac" => $request->input("color"),
                        "SoLuong" => $request->input("quantity"),
                        "Xoa" => "0",
                        "created_at" => now()
                    ]);

                    $layLaiThongTin = DB::table('cart')
                        ->join("san_pham", function ($join) {
                            $join->on("cart.ID_SanPham", "=", "san_pham.id")
                                ->where("san_pham.TheLoai", "=", "thuong")
                                ->where("san_pham.Xoa", "=", 0)
                                ->where("TrangThai", "hien");
                        })
                        ->where('cart.ID_KhachHang', $userId)
                        ->where("cart.ID_SanPham", $request->input("id_product"))
                        ->first();

                    $orderCode = strtoupper(Str::random(40));
                    Session::put('order_code', $orderCode);
                    session()->forget('selected_products');
                    session([
                        'selected_products' => [
                            $layLaiThongTin->id
                        ]
                    ]);

                    DB::commit();

                    return response()->json([
                        'status' => 'success',
                        'type' => 'payment',
                        'message' => 'Chuyển đến trang thanh toán!',
                        'redirect' => route('payent', $orderCode)
                    ]);
                }
            }
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Hành động không hợp lệ!'
        ], 400);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::check()) {
            $userId = Auth::user()->ID_Guests ?? Auth::user()->id;
        } else {
            $userId = request()->cookie('ID_Guests', Str::uuid());
            Cookie::queue('ID_Guests', $userId, 60 * 24 * 365);
        }

        $cart = DB::table("cart")->find($id);
        if (!$cart):
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 500);
        endif;

        $cartUpdate = DB::table("cart")
            ->join("bien_the_san_pham", function ($join) {
                $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                    ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                    ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
            })
            ->where("cart.id", $id)
            ->first();

        $money = 0;

        if ($cartUpdate) {
            $checkBienThe = DB::table("bien_the_san_pham")->where("ID_SanPham", $cartUpdate->ID_SanPham)->where("ID_MauSac", $cartUpdate->MauSac)->where("KichCo", $cartUpdate->KichCo)->first();
            $layMauBienThe = DB::table("mau_sac")->where("id", $checkBienThe->ID_MauSac)->first();

            DB::table("cart")->where("id", $id)->update([
                "SoLuong" => $request->input("quantity")
            ]);

            $money += $request->input("quantity") * $cartUpdate->Gia;

            $layGiaTienSanPham = DB::table("cart")
                ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
                ->join("bien_the_san_pham", function ($join) {
                    $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                        ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                        ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
                })
                ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
                ->where("bien_the_san_pham.SoLuong", ">", 0)
                ->selectRaw("COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong) as soLuongSP, SUM(cart.SoLuong * bien_the_san_pham.Gia) as tongTien")
                ->first();

            $layGiaTienSanPhamThuong = DB::table("cart")
                ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
                ->where("KichCo", "=", null)
                ->where("MauSac", "=", null)
                ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
                ->selectRaw("COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong) as soLuongSP, SUM(cart.SoLuong * san_pham.GiaSanPham) as tongTien")
                ->first();

            $soLuongSP = $layGiaTienSanPhamThuong->soLuongSP + $layGiaTienSanPham->soLuongSP;
            $soLuongGioHangClient = $layGiaTienSanPhamThuong->soLuongGioHangClient + $layGiaTienSanPham->soLuongGioHangClient;

            $tongTien = ($layGiaTienSanPhamThuong->tongTien + $layGiaTienSanPham->tongTien);

            if ($request->input("quantity") > $checkBienThe->SoLuong) {
                $a = $request->input("quantity") - $checkBienThe->SoLuong;
                $b = $request->input("quantity") - $a;
                DB::table("cart")->where("id", $id)->update([
                    "SoLuong" => $b
                ]);
                return response()->json([
                    'status' => "error",
                    'message' => "Không Thể Thêm Vì Sản Phẩm Đã Hết!",
                    'input' => $b
                ]);
            }


            if ($checkBienThe->SoLuong <= 0) {
                DB::table("cart")->where("id", $id)->update([
                    "SoLuong" => 1
                ]);

                return response()->json([
                    'status' => "error",
                    'message' => 'Kích Cỡ ' . $cartUpdate->KichCo . ' - ' . $layMauBienThe->TenMauSac . " Đã Hết, Vui Lòng Chọn Màu Khác",
                    'id' => $id,
                    'total' => $money,
                    'total_cart' => $layGiaTienSanPham
                ]);
            }
        } else {
            $thongTinCartThuong = DB::table("cart")->where("id", $id)->first();
            if (!$thongTinCartThuong) {
                return response()->json([
                    'status' => "error",
                    'message' => 'Giỏ Hàng Không Tồn Tại',
                ]);
            }

            DB::table("cart")->where("id", $id)->update([
                "SoLuong" => $request->input("quantity")
            ]);

            $sanPhamThuong = DB::table("san_pham")->where("id", $thongTinCartThuong->ID_SanPham)->first();

            $layGiaTienSanPham = DB::table("cart")
                ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
                ->join("bien_the_san_pham", function ($join) {
                    $join->on("cart.ID_SanPham", "=", "bien_the_san_pham.ID_SanPham")
                        ->on("cart.KichCo", "=", "bien_the_san_pham.KichCo")
                        ->on("cart.MauSac", "=", "bien_the_san_pham.ID_MauSac");
                })
                ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
                ->where("bien_the_san_pham.SoLuong", ">", 0)
                ->selectRaw("COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong) as soLuongSP, SUM(cart.SoLuong * bien_the_san_pham.Gia) as tongTien")
                ->first();

            $layGiaTienSanPhamThuong = DB::table("cart")
                ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
                ->where("KichCo", "=", null)
                ->where("MauSac", "=", null)
                ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
                ->selectRaw("COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong) as soLuongSP, SUM(cart.SoLuong * san_pham.GiaSanPham) as tongTien")
                ->first();

            $soLuongSP = $layGiaTienSanPhamThuong->soLuongSP + $layGiaTienSanPham->soLuongSP;
            $soLuongGioHangClient = $layGiaTienSanPhamThuong->soLuongGioHangClient + $layGiaTienSanPham->soLuongGioHangClient;

            $tongTien = ($layGiaTienSanPhamThuong->tongTien + $layGiaTienSanPham->tongTien);

            if (!$sanPhamThuong) {
                return response()->json([
                    'status' => "error",
                    'message' => 'Sản Phẩm Không Tồn Tại',
                ]);
            }

            $money += $request->input("quantity") * $sanPhamThuong->GiaSanPham;

            $layGiaTienSanPham = DB::table("cart")
                ->join("san_pham", "cart.ID_SanPham", "=", "san_pham.id")
                ->whereIn("cart.ID_KhachHang", [$userId, (Auth::user()->id ?? $userId)])
                ->selectRaw("COUNT(cart.ID_SanPham) as soLuongGioHangClient, SUM(cart.SoLuong) as soLuongSP, SUM(cart.SoLuong * san_pham.GiaSanPham) as tongTien")
                ->first();

            if ($request->input("quantity") > $sanPhamThuong->SoLuong) {
                $a = $request->input("quantity") - $sanPhamThuong->SoLuong;
                $b = $request->input("quantity") - $a;
                DB::table("cart")->where("id", $id)->update([
                    "SoLuong" => $b
                ]);
                return response()->json([
                    'status' => "error",
                    'message' => "Bạn đã có " . number_format($thongTinCartThuong->SoLuong) . " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn.",
                    'input' => $b
                ]);
            }

            if ($sanPhamThuong->SoLuong <= 0) {
                DB::table("cart")->where("id", $id)->update([
                    "SoLuong" => 1
                ]);

                return response()->json([
                    'status' => "error",
                    'message' => "Sản Phẩm Đã Hết Hàng!",
                    'id' => $id,
                    'total' => $money,
                    'total_cart' => $layGiaTienSanPham
                ]);
            }
        }

        return response()->json([
            'status' => "success",
            'message' => 'Cập nhật thành công',
            'id' => $id,
            'total' => $money,
            'total_cart' => [
                "tongTien" => $tongTien,
                "soLuongGioHangClient" => $soLuongGioHangClient,
                "soLuongSP" => $soLuongSP
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = DB::table("cart")->find($id);
        if (!$cart) {
            return back()->with("error", "Sản Phẩm Trong Giỏ Hàng Không Tồn Tại Hoặc Đã Bị Xóa");
        }

        DB::table("cart")->where("id", $id)->delete();

        return back()->with("success", "Sản Phẩm Trong Giỏ Hàng Đã Được Xóa");
    }
}
