<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\SanPhamRequest;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhSach = DB::table("san_pham")->where("Xoa", 0)->orderByDesc("id")->get();
        $danhSachDanhMuc = DB::table("danh_muc_san_pham")->where("Xoa", 0)->orderByDesc("id")->get();
        $danhSachThuongHieu = DB::table("thuong_hieu")->where("Xoa", 0)->orderByDesc("id")->get();


        return view("admins.SanPham.DanhSach", compact("danhSach", "danhSachDanhMuc", "danhSachThuongHieu"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dichVu = DB::table("dich_vu_san_pham")->where("Xoa", 0)->get();
        $danhSachDanhMuc = DB::table("danh_muc_san_pham")->where("Xoa", 0)->orderByDesc("id")->get();
        $danhSachThuongHieu = DB::table("thuong_hieu")->where("Xoa", 0)->orderByDesc("id")->get();
        $danhSachBienThe = DB::table("bien_the")->where("Xoa", 0)->orderByDesc("id")->get();
        $thongTinMauSac = DB::table("mau_sac")->where("Xoa", 0)->get();
        $thongTinKichCo = DB::table("kich_co")->where("Xoa", 0)->get();

        return view("admins.SanPham.TaoSanPham", compact("danhSachDanhMuc", "danhSachThuongHieu", "dichVu", "danhSachBienThe", "thongTinMauSac", "thongTinKichCo"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SanPhamRequest $request)
    {
        DB::beginTransaction();

        $image = null;

        if ($request->hasFile("hinhAnh")) {
            $image = $request->file("hinhAnh")->store("uploads/SanPham", "public");
        }

        $sanPham = DB::table("san_pham")->where("TenSanPham", $request->input("TenSanPham"))->first();

        if ($sanPham) {
            return redirect()->back()->with("error", "Sản Phẩm Đã Tồn Tại!");
        }

        DB::table("san_pham")->insert([
            "DuongDan" => xoadau($request->input("TenSanPham")),
            "HinhAnh" => $image,
            "TenSanPham" => $request->input("TenSanPham"),
            "ID_DichVuSanPham" => $request->input("ID_DichVuSanPham"),
            "ID_DanhMuc" => $request->input("DanhMuc"),
            "ID_ThuongHieu" => $request->input("ThuongHieu"),
            "ChatLieu" => $request->input("ChatLieu"),
            "GiaSanPham" => $request->input("GiaSanPham"),
            "GiaKhuyenMai" => $request->input("GiaKhuyenMai"),
            "SoLuong" => $request->input("SoLuong"),
            "Nhan" => $request->input("Nhan"),
            "Mota" => $request->input("MoTaSanPham"),
            "TrangThai" => "hien",
            "TheLoai" => "bienThe",
            "created_at" => date("Y/m/d H:i:s")
        ]);

        DB::commit();

        $sanPham = DB::table("san_pham")->orderByDesc("id")->first();

        if ($request->file("images")) {
            foreach ($request->file("images") as $row) {
                if ($row->isValid()) {
                    $images = $row->store("uploads/SanPham", "public");
                    DB::table("hinh_anh_san_pham")->insert([
                        "DuongDan" => $images,
                        "ID_SanPham" => $sanPham->id,
                        "created_at" => date("Y/m/d H:i:s")
                    ]);
                }
            }
        }

        $thongTinBienThes = $request->input('ThongTinBienThe', []);
        $giaBienThes = $request->input('GiaBienThe', []);
        $soLuongBienThes = $request->input('SoLuongBienThe', []);
        $hinhAnhBienThes = $request->file("HinhAnh", []);

        foreach ($thongTinBienThes as $index => $thongTin) {
            [$kichCo, $idMauSac] = explode('|', $thongTin);

            $idBienThe = DB::table('bien_the_san_pham')->insertGetId([
                'KichCo' => $kichCo,
                'ID_MauSac' => $idMauSac,
                'ID_SanPham' => $sanPham->id,
                'Gia' => $giaBienThes[$index],
                'SoLuong' => $soLuongBienThes[$index],
                'created_at' => now(),
            ]);


            if (isset($hinhAnhBienThes[$index])) {
                foreach ($hinhAnhBienThes[$index] as $HinhAnh) {
                    $fileName = $kichCo . '_' . $idMauSac . '_' . $sanPham->id . '_' . uniqid() . '.png';
                    $up = $HinhAnh->storeAs("uploads/SanPham", $fileName, "public");

                    DB::table('hinh_anh_san_pham')->insert([
                        'DuongDan' => $up,
                        'ID_SanPham' => $idBienThe,
                        'created_at' => now(),
                    ]);
                }
            }
        }

        DB::commit();

        return redirect()->route("SanPham.index")->with("success", "Thêm Sản Phẩm Thành Công!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sanPham = DB::table("san_pham")->where("Xoa", 0)->find($id);

        if (!$sanPham) {
            return redirect()->route("SanPham.index")->with("error", "Sản Phẩm Không Tồn Tại!");
        }


        $dichVu = DB::table("dich_vu_san_pham")->where("Xoa", 0)->find($sanPham->ID_DichVuSanPham);
        $danhMuc = DB::table("danh_muc_san_pham")->where("Xoa", 0)->find($sanPham->ID_DanhMuc);
        $thuongHieu = DB::table("thuong_hieu")->where("Xoa", 0)->find($sanPham->ID_ThuongHieu);
        $danhSachHinhAnh = DB::table("hinh_anh_san_pham")->where("ID_SanPham", $id)->where("Xoa", 0)->get();

        $danhSachBienThe = DB::table("bien_the_san_pham")->where("xoa", 0)->where("ID_SanPham", $id)->get();

        $danhSachMauSac = DB::table("mau_sac")->where("xoa", 0)->get();

        $idMauSacDaCo = $danhSachBienThe->pluck('KichCo')->toArray();

        $danhSachKichCo = DB::table("kich_co")->where("Xoa", 0)->whereIn("TenKichCo", $idMauSacDaCo)->get();

        $KichCoDaCo = DB::table('mau_sac')->whereIn('id', $idMauSacDaCo)->count();

        $bienTheGop = DB::table('bien_the_san_pham')
            ->where("ID_SanPham", $id)
            ->select('ID_MauSac', DB::raw('min(ID) as ID'), DB::raw('min(KichCo) as KichCo'))
            ->groupBy('ID_MauSac')
            ->get();
        return view("admins.SanPham.ChiTiet", compact("dichVu", "bienTheGop", "sanPham", "danhMuc", "thuongHieu", "danhSachHinhAnh", "danhSachKichCo", "danhSachBienThe", "danhSachMauSac", "KichCoDaCo"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sanPham = DB::table("san_pham")->where("Xoa", 0)->find($id);

        if (!$sanPham) {
            return redirect()->route("SanPham.index")->with("error", "Sản Phẩm Không Tồn Tại!");
        }

        $dichVu = DB::table("dich_vu_san_pham")->where("Xoa", 0)->get();
        $danhSachDanhMuc = DB::table("danh_muc_san_pham")->where("Xoa", 0)->orderByDesc("id")->get();
        $danhSachThuongHieu = DB::table("thuong_hieu")->where("Xoa", 0)->orderByDesc("id")->get();
        $danhSachBienThe = DB::table("bien_the_san_pham")->where("ID_SanPham", $id)->where("Xoa", 0)->get();
        $thongTinMauSac = DB::table("mau_sac")->where("Xoa", 0)->get();
        $thongTinKichCo = DB::table("kich_co")->where("Xoa", 0)->get();
        $danhSachBienThe1 = DB::table("bien_the")->where("Xoa", 0)->orderByDesc("id")->get();
        $danhSachHinhAnh = DB::table("hinh_anh_san_pham")->where("ID_SanPham", $id)->where("Xoa", 0)->get();

        $idKichCoDaCo = $danhSachBienThe->pluck('KichCo')->toArray();

        $KichCoChuaCo = DB::table('kich_co')->whereNotIn('TenKichCo', $idKichCoDaCo)->get();

        return view("admins.SanPham.SuaSanPham", compact("dichVu", "sanPham", "danhSachDanhMuc", "danhSachThuongHieu", "danhSachBienThe", "thongTinMauSac", "thongTinKichCo", "danhSachHinhAnh", "KichCoChuaCo", "danhSachBienThe1"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SanPhamRequest $request, string $id)
    {
        DB::beginTransaction();
        $sanPham = DB::table("san_pham")->where("Xoa", 0)->find($id);

        if (!$sanPham) {
            return redirect()->route("SanPham.index")->with("error", "Sản Phẩm Không Tồn Tại!");
        }

        $image = $sanPham->HinhAnh;
        $images = null;

        if ($request->hasFile("hinhAnh")) {
            $image = $request->file("hinhAnh")->store("uploads/SanPham", "public");
            Storage::disk('public')->delete($sanPham->HinhAnh);
        }

        DB::table("san_pham")->where("id", $id)->update([
            "HinhAnh" => $image,
            "TenSanPham" => $request->input("TenSanPham"),
            "ID_DichVuSanPham" => $request->input("ID_DichVuSanPham"),
            "ID_DanhMuc" => $request->input("DanhMuc"),
            "ID_ThuongHieu" => $request->input("ThuongHieu"),
            "ChatLieu" => $request->input("ChatLieu"),
            "GiaSanPham" => $request->input("GiaSanPham"),
            "GiaKhuyenMai" => $request->input("GiaKhuyenMai"),
            "SoLuong" => $request->input("SoLuong"),
            "Nhan" => $request->input("Nhan"),
            "Mota" => $request->input("MoTaSanPham"),
            "TrangThai" => $request->input("TrangThai"),
            "TheLoai" => "bienThe",
            "updated_at" => date("Y/m/d H:i:s")
        ]);

        if ($request->file("images")) {
            foreach ($request->file("images") as $row) {
                if ($row->isValid()) {
                    $images = $row->store("uploads/SanPham", "public");
                    DB::table("hinh_anh_san_pham")->insert([
                        "DuongDan" => $images,
                        "ID_SanPham" => $sanPham->id,
                        "created_at" => date("Y/m/d H:i:s")
                    ]);
                }
            }
        }

        DB::commit();

        return redirect()->route("SanPham.index")->with("success", "Cập Nhật Thông Tin Sản Phẩm Thành Công!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bienThe = DB::table("bien_the_san_pham")->find($id);

        if (!$bienThe) {
            return redirect()->route("SanPham.index")->with("error", "Biến Thể Sản Phẩm Không Tồn Tại!");
        }

        DB::table("bien_the_san_pham")->where("id", $id)->delete();

        DB::table("hinh_anh_san_pham")->where("ID_SanPham", $id)->delete();

        DB::commit();

        return redirect()->route("SanPham.index")->with("success", "Xóa Biến Thể Thành Công!");
    }
}
