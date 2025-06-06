@extends("admins.themes")

@section("titleHead")
<title>Chỉnh Sửa Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        @if (session('success'))
        <div class="alert alert-success fade show" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger fade show" role="alert">
            <p>{{ session('error') }}</p>
        </div>
        @endif

        <form action="{{ route("SanPham.update", $sanPham->id) }}" class="form theme-form" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input type="hidden" value="TheLoai" value="bienThe">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>CHỈNH SỬA THÔNG TIN SẢN PHẨM <b class="VietHoa">{{ $sanPham->TenSanPham }}</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="ID_DichVuSanPham">Dịch Vụ</label>
                                        <select name="ID_DichVuSanPham" id="selectDichVu" class="form-control">
                                            @foreach ($dichVu as $dv)
                                            <option value="{{ $dv->id }}" {{ ($sanPham->ID_DichVuSanPham == $dv->id ? "selected" : "") }}>{{ $dv->TenDichVuSanPham }}</option>
                                            @endforeach
                                        </select>
                                        @error("ID_DichVuSanPham")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Danh Mục</label>
                                        <select name="DanhMuc" class="form-control" id="selectDanhMuc" required>
                                            <option value="{{ DB::table("danh_muc_san_pham")->find($sanPham->ID_DanhMuc)->id }}" selected>{{ DB::table("danh_muc_san_pham")->find($sanPham->ID_DanhMuc)->TenDanhMucSanPham }}</option>
                                        </select>
                                        @error("DanhMuc")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Thương Hiệu</label>
                                        <select name="ThuongHieu" class="form-control" required>
                                            @foreach ($danhSachThuongHieu as $ThuongHieu)
                                            <option value="{{ $ThuongHieu->id }}" {{ ($sanPham->ID_ThuongHieu == $ThuongHieu->id ? "selected" : "") }}>{{ $ThuongHieu->TenThuongHieu }}</option>
                                            @endforeach
                                        </select>
                                        @error("ThuongHieu")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tên Sản Phẩm</label>
                                        <input class="form-control" type="text" name="TenSanPham" placeholder="Tên Sản Phẩm" value="{{ $sanPham->TenSanPham }}" required>
                                    </div>
                                    @error("TenSanPham")
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Chất Liệu</label>
                                        <input class="form-control" type="text" name="ChatLieu" placeholder="Chất Liệu Sản Phẩm" value="{{ $sanPham->ChatLieu }}" required>
                                        @error("ChatLieu")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col" id="formInputMoneyGoc" style="display: <?= $sanPham->TheLoai == 'bienThe' ? 'none' : 'block'; ?>">
                                    <div class="mb-3">
                                        <label>Giá Gốc</label>
                                        <input class="form-control" type="number" name="GiaKhuyenMai" placeholder="Giá Khuyến Mãi" value="{{ $sanPham->GiaKhuyenMai }}">
                                    </div>
                                </div>

                                <div class="col" id="formInputMoney" style="display: <?= $sanPham->TheLoai == 'bienThe' ? 'none' : 'block'; ?>">
                                    <div class="mb-3">
                                        <label>Giá Bán</label>
                                        <input class="form-control" type="number" name="GiaSanPham" id="Gia" placeholder="Giá Bán Sản Phẩm" value="{{ $sanPham->GiaSanPham }}" <?= $sanPham->TheLoai == 'thuong' ? 'required' : ''; ?>>
                                        @error("GiaSanPham")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col" id="formAmountPr" style="display: <?= $sanPham->TheLoai == 'bienThe' ? 'none' : 'block'; ?>">
                                    <div class="mb-3">
                                        <label>Số Lượng</label>
                                        <input class="form-control @error(" SoLuong") is-invalid border-danger @enderror" type="number" onkeyup="CapNhacGiaNhap()" name="SoLuong" value="{{ $sanPham->SoLuong }}" id="SoLuong" placeholder="Số Lượng Sản Phẩm" min="1" <?= $sanPham->TheLoai == 'thuong' ? 'required' : ''; ?>>
                                        @error("SoLuong")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Nhãn</label>
                                        <select name="Nhan" class="form-control">
                                            <option value="" {{ $sanPham->Nhan == NULL ? "selected" : "" }}>Không Có</option>
                                            <option value="hot" {{ $sanPham->Nhan == "hot" ? "selected" : "" }}>HOT</option>
                                            <option value="featured" {{ $sanPham->Nhan == "featured" ? "selected" : "" }}>Nổi Bật</option>
                                            <option value="clearance" {{ $sanPham->Nhan == "clearance" ? "selected" : "" }}>Xả</option>
                                            <option value="limited" {{ $sanPham->Nhan == "limited" ? "selected" : "" }}>Giới Hạn</option>
                                            <option value="discount" {{ $sanPham->Nhan == "discount" ? "selected" : "" }}>Ưu Đãi Đặc Biệt</option>
                                        </select>
                                        @error("Nhan")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Trạng Thái</label>
                                        <select class="form-control" name="TrangThai" required>
                                            <option value="hien" {{ $sanPham->TrangThai == "hien" ? "selected" : "" }}>Hiện</option>
                                            <option value="an" {{ $sanPham->TrangThai == "an" ? "selected" : "" }}>Ẩn</option>
                                        </select>
                                        @error("TrangThai")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Mô Tả</label>
                                        <textarea name="MoTaSanPham" class="note-DATN">{{ $sanPham->Mota }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <a href="{{ route("SanPham.index") }}" class="btn btn-dark">Quay Lại</a>
                                </div>
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-primary me-3" type="submit">Cập Nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Hình Đại Diện</h5>
                        </div>
                        <div class="card-body">
                            <label for="">Hình Ảnh</label>
                            <input type="file" class="d-none" id="image" name="hinhAnh">
                            <div class="dropzone-wrapper">
                                <div class="dz-message dropzone-secondary">
                                    <label for="image">
                                        <i class="icon-cloud-up"></i>
                                        <h6 class="mt-3 mb-3">Kéo & Thả ảnh vào đây hoặc Nhấn để chọn ảnh đại diện sản phẩm</h6>
                                        <img id="imagePreview" src="{{ Storage::url($sanPham->HinhAnh) }}" alt="{{ $sanPham->TenSanPham }}" class="img-fluid" />
                                    </label>
                                </div>
                            </div>
                            @error("hinhAnh")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div>
                                <label for="" class="mt-3">Bộ Sưu Tập</label>
                                <input type="file" class="d-none" id="khoAnh" name="images[]" multiple>
                                <div class="dropzone-wrapper">
                                    <div class="dz-message">
                                        <label for="khoAnh">
                                            <i class="icon-cloud-up"></i>
                                            <h6 class="mt-3 mb-3">Kéo & Thả ảnh vào đây hoặc Nhấn để chọn nhiều ảnh sản phẩm</h6>
                                        </label>
                                        <div class="image-preview" id="imagesPreview">
                                        </div>
                                        <div class="image-preview">
                                            @foreach ($danhSachHinhAnh as $hinhAnh)
                                            @if ($hinhAnh)
                                            <div class="image-container">
                                                <img src="{{ Storage::url($hinhAnh->DuongDan) }}">
                                                <a class="delete-btn" href="{{ route("HinhAnhSanPham.destroy", $hinhAnh->id) }}"><i class="fal fa-times"></i></a>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="card" id="formBienThe">
            <div class="card-header">
                <h5>BIẾN THỂ SẢN PHẨM</h5>
            </div>
            <div class="card-body">
                <div class="text-end">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBienThe">Thêm Màu Sắc</button>
                </div>
                <div class="table-responsive dt-responsive">
                    <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <div class="row dt-row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered nowrap dataTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Kích Cỡ</th>
                                            <th>Màu Sắc</th>
                                            <th>Giá</th>
                                            <th>Số Lượng</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhSachBienThe as $index => $bienTheSanPham)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td><b>Size {{ $bienTheSanPham->KichCo }}</b></td>
                                            <td>
                                                @foreach ($thongTinMauSac as $mauSac)
                                                @if ($mauSac->id == $bienTheSanPham->ID_MauSac)
                                                <b>{{ $mauSac->TenMauSac }}</b>
                                                @endif
                                                @endforeach
                                            </td>
                                            <td>{{ number_format($bienTheSanPham->Gia, 0, ',', '.') }}đ</td>
                                            <td>{{ number_format($bienTheSanPham->SoLuong, 0, ',', '.') }}</td>
                                            <td>
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalEdit_{{ $bienTheSanPham->id }}">Sửa Biển Thể</button>
                                                <form action="{{ route("BienTheSanPham.destroy", $bienTheSanPham->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modalEdit_{{ $bienTheSanPham->id }}" tabindex="-1" aria-labelledby="modalEdit_{{ $bienTheSanPham->id }}Title" aria-modal="true" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEdit_{{ $bienTheSanPham->id }}Title">Chỉnh Sửa Biến Thể</h5>
                                                        <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Kích Cỡ: </strong> {{ $bienTheSanPham->KichCo }}</p>
                                                        <p><strong>Màu Sắc: </strong> @foreach ($thongTinMauSac as $mauSac)
                                                            @if ($mauSac->id == $bienTheSanPham->ID_MauSac)
                                                            {{ $mauSac->TenMauSac }}
                                                            @endif
                                                            @endforeach
                                                        </p>

                                                        <form action="{{ route("BienTheSanPham.update", $bienTheSanPham->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method("PUT")

                                                            <div class="form-group">
                                                                <label for="">Giá Tiền</label>
                                                                <input type="number" class="form-control" name="Gia" placeholder="Nhập Giá Tiền" value="{{ $bienTheSanPham->Gia }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Số Lượng</label>
                                                                <input type="number" class="form-control" name="SoLuong" placeholder="Nhập Số Lượng" value="{{ $bienTheSanPham->SoLuong }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Trạng Thái</label>
                                                                <select name="Xoa" class="form-control">
                                                                    <option value="0" {{ $bienTheSanPham->Xoa == "0" ? "selected" : "" }}>Hiển Thị</option>
                                                                    <option value="1" {{ $bienTheSanPham->Xoa == "1" ? "selected" : "" }}>Ẩn</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <button class="btn btn-primary w-100" type="submit">Lưu Thay Đổi</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-dark w-100" type="button" data-bs-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal bd-example-modal-xl fade" id="modalAddBienThe" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="{{ route("BienTheSanPham.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="ID_SanPham" value="{{ $sanPham->id }}">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Biển Thể Sản Phẩm</h5>
                    <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Kích Cỡ</label>
                                <select class="form-control mb-3" id="chonKichCo" name="KichCo" onchange="chonBienThe()">
                                    <option value="">-- Chọn Kích Cỡ --</option>
                                    @foreach ($thongTinKichCo as $KichCo)
                                    <option value="{{ $KichCo->TenKichCo }}">Size {{ $KichCo->TenKichCo }}</option>
                                    @endforeach
                                </select>
                                @error("KichCo")
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col" style="display: none" id="formBienTheSelect">
                            <div class="mb-3">
                                <label>Màu Sắc</label>
                                <select id="chonMauSac" class="form-control mb-3" name="MauSac" onchange="chonMauSacc()">
                                    <option value="">-- Chọn Màu Sắc --</option>
                                    @foreach ($thongTinMauSac as $MauSac)
                                    <option value="{{ $MauSac->id }}">{{ $MauSac->TenMauSac }}</option>
                                    @endforeach
                                </select>
                                @error("MauSac")
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3" style="display: none;" id="formGiaTienAmount">
                        <div class="col">
                            <div class="row">
                                <div id="danhSachBienThe"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button>
                    <button class="btn btn-primary" type="submit">Thêm Ngay</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section("js")
<script>
    function theLoaiSP(e) {
        let formAmountPr = document.getElementById("formAmountPr");
        let inputSoLuong = document.getElementById("SoLuong");
        let formSPThuong = document.getElementById("formSPThuong");

        if (e.value == "thuong") {
            document.getElementById("formBienThe").style.display = "none";
            formAmountPr.style.display = "block";
            inputSoLuong.setAttribute("required", "required");
            formSPThuong.style.display = "block";
            document.getElementById("chonKichCo").removeAttribute("required");
            document.getElementById("formInputMoney").style.display = "block";
            document.getElementById("formInputMoneyGoc").style.display = "block";
            document.getElementById("Gia").setAttribute("required", "required");
        } else {
            document.getElementById("formBienThe").style.display = "block";
            formAmountPr.style.display = "none";
            inputSoLuong.removeAttribute("required");
            formSPThuong.style.display = "none";
            document.getElementById("chonKichCo").setAttribute("required", "required");
            document.getElementById("Gia").removeAttribute("required");
            document.getElementById("formInputMoney").style.display = "none";
            document.getElementById("formInputMoneyGoc").style.display = "none";
        }
    }


    function chonBienThe() {
        document.getElementById("formBienTheSelect").style.display = "block";
    }

    function capNhatGiaTienChoCacDongKhac(gia) {
        document.querySelectorAll('.bienTheRow .GiaBienThe').forEach((el, idx) => {
            if (idx !== 0) el.value = gia;
        });
    }

    function capNhatSoLuongChoCacDongKhac(soLuong) {
        document.querySelectorAll('.bienTheRow .SoLuongBienThe').forEach((el, idx) => {
            if (idx !== 0) el.value = soLuong;
        });
    }

    function chonMauSacc() {
        var form = document.getElementById("danhSachBienThe");
        document.getElementById("formGiaTienAmount").style.display = "block";
        var KichCo = document.getElementById("chonKichCo").value;
        var MauSac = document.getElementById("chonMauSac").value;

        setTimeout(() => {
            document.getElementById("chonMauSac").selectedIndex = 0;
        }, 500);

        let soThuTuBienThe = document.querySelectorAll('#danhSachBienThe .row').length;

        let giaTienTruoc = "";
        let soLuongTruoc = "";
        if (soThuTuBienThe > 0) {
            giaTienTruoc = document.querySelector(`#danhSachBienThe .bienThe:last-child .GiaBienThe`).value;
            soLuongTruoc = document.querySelector(`#danhSachBienThe .bienThe:last-child .SoLuongBienThe`).value;
        }

        <?php
        $isFirst = true;
        foreach ($thongTinMauSac as $MauSacCon):
        ?>
            var checkForm = document.getElementById('itemNhapAllMauSac_<?= $MauSacCon->id ?>_' + KichCo);
            if (!checkForm) {
                form.insertAdjacentHTML('beforeend', `
    <div class="col" id="itemNhapAllMauSac_<?= $MauSacCon->id ?>_${KichCo}">
        <div class="row bienThe bienTheRow">
            <div class="col">
                <small class="label-control">Kích Cỡ</small>
                <div class="colorProducts">Size ${KichCo}</div>
            </div>
            <div class="col">
                <small class="label-control">Màu Sắc</small>
                <div class="colorProducts1"><?= $MauSacCon->TenMauSac ?></div>
            </div>
            <input type="hidden" name="ThongTinBienThe[]" value="${KichCo}|<?= $MauSacCon->id ?>">
            <div class="col">
                <small class="label-control">Giá Tiền (<span class="text-danger">*</span>)</small>
                <input type="text"
                    class="form-control form-control-sm GiaBienThe"
                    name="GiaBienThe[]"
                    value="${giaTienTruoc}"
                    required
                    <?= $isFirst ? 'oninput="capNhatGiaTienChoCacDongKhac(this.value)"' : '' ?>>
            </div>
            <div class="col">
                <small class="label-control">Số Lượng (<span class="text-danger">*</span>)</small>
                <input type="text"
                    class="form-control form-control-sm SoLuongBienThe"
                    name="SoLuongBienThe[]"
                    value="${soLuongTruoc}"
                    required
                    <?= $isFirst ? 'oninput="capNhatSoLuongChoCacDongKhac(this.value)"' : '' ?>>
            </div>
            <div class="col pt-2">
                <span class="badge bg-danger mt-4 w-100"
                    onclick="xoaBienTheKichCo('itemNhapAllMauSac_<?= $MauSacCon->id ?>_${KichCo}')">
                    <i class="fas fa-trash"></i></span>
            </div>
        </div>
    </div>
    `);
                <?php $isFirst = false; ?>
            }
        <?php endforeach; ?>
    }

    function viewFormBienThe() {
        var theLoaiSanPham = document.getElementById("theLoaiSanPham").value;

        if (theLoaiSanPham == "bienThe") {
            document.getElementById("formBienThe").style.display = "block";
        } else {
            document.getElementById("formBienThe").style.display = "none";
        }
    }

    function viewFormInputBienThe(id, value) {
        var button = document.getElementById(id + "NutBam");

        if (button.innerHTML == value) {
            button.classList.add("view");
            button.innerHTML = ' ' + value;
            document.getElementById(id).classList.add("view");
        } else {
            button.classList.remove("view");
            button.innerHTML = value;
            document.getElementById(id).classList.remove("view");
        }
    }

    function xoaGiaTriBienThe(id) {
        var item = document.getElementById(id);
        if (item) {
            item.remove();
        }
    }

    function xoaBienTheKichCo(id) {
        var item = document.getElementById(id).remove();
        if (item) {
            item.remove();
        }
    }

    const imagePreview = document.getElementById('imagePreview');

    document.getElementById('image').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        }
    });

    const imagesPreview = document.getElementById('imagesPreview');
    const fileInput = document.getElementById('khoAnh');

    fileInput.addEventListener('change', function() {
        imagesPreview.innerHTML = '';
        const files = Array.from(this.files);
        const dataTransfer = new DataTransfer();

        files.forEach((file, index) => {
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const container = document.createElement('div');
                    container.classList.add('image-container');

                    const img = document.createElement('img');
                    img.src = e.target.result;

                    const deleteBtn = document.createElement('button');
                    deleteBtn.innerHTML = '<i class="fal fa-times"></i>';
                    deleteBtn.classList.add('delete-btn');
                    deleteBtn.onclick = () => {
                        container.remove();
                        removeFile(index);
                    };

                    container.appendChild(img);
                    container.appendChild(deleteBtn);
                    imagesPreview.appendChild(container);
                };

                reader.readAsDataURL(file);
                dataTransfer.items.add(file);
            }
        });

        fileInput.files = dataTransfer.files;

        function removeFile(index) {
            const newDataTransfer = new DataTransfer();
            const currentFiles = Array.from(fileInput.files);

            currentFiles.forEach((file, i) => {
                if (i !== index) {
                    newDataTransfer.items.add(file);
                }
            });

            fileInput.files = newDataTransfer.files;
        }
    });

    const allDanhMuc = @json($danhSachDanhMuc);

    const selectDichVu = document.getElementById('selectDichVu');
    const selectDanhMuc = document.getElementById('selectDanhMuc');

    function updateDanhMucOptions(dichVuId) {
        selectDanhMuc.innerHTML = '';

        const filtered = allDanhMuc.filter(dm => dm.ID_DichVuSanPham == dichVuId);

        filtered.forEach(dm => {
            const option = document.createElement('option');
            option.value = dm.id;
            option.textContent = dm.TenDanhMucSanPham;
            selectDanhMuc.appendChild(option);
        });
    }

    selectDichVu.addEventListener('change', function() {
        updateDanhMucOptions(this.value);
    });
</script>
@endsection