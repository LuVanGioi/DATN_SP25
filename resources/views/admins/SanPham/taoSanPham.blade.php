@extends("admins.themes")

@section("titleHead")
<title>Thêm Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <form action="{{ route("SanPham.store") }}" class="form theme-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>THÊM SẢN PHẨM</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="ID_DichVuSanPham">Dịch Vụ</label>
                                        <select name="ID_DichVuSanPham" class="form-control">
                                            @foreach ($dichVu as $dv)
                                            <option value="{{ $dv->id }}">{{ $dv->TenDichVuSanPham }}</option>
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
                                        <select name="DanhMuc" class="form-control @error(" DanhMuc") is-invalid border-danger @enderror" required>
                                            @foreach ($danhSachDanhMuc as $DanhMuc)
                                            <option value="{{ $DanhMuc->id }}">{{ $DanhMuc->TenDanhMucSanPham }}</option>
                                            @endforeach
                                        </select>
                                        @error("DanhMuc")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Thương Hiệu</label>
                                        <select name="ThuongHieu" class="form-control @error(" ThuongHieu") is-invalid border-danger @enderror" required>
                                            @foreach ($danhSachThuongHieu as $ThuongHieu)
                                            <option value="{{ $ThuongHieu->id }}">{{ $ThuongHieu->TenThuongHieu }}</option>
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
                                        <label>Thể Loại</label>
                                        <select class="form-control mb-3" name="TheLoai" onchange="theLoaiSP(this)">
                                            <option value="thuong">Thường</option>
                                            <option value="bienThe">Biến Thể</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tên Sản Phẩm</label>
                                        <input class="form-control @error(" TenSanPham") is-invalid border-danger @enderror" type="text" name="TenSanPham" placeholder="Tên Sản Phẩm" value="{{ old("TenSanPham") }}" required>
                                        @error("TenSanPham")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Chất Liệu</label>
                                        <input class="form-control @error(" ChatLieu") is-invalid border-danger @enderror" type="text" name="ChatLieu" placeholder="Chất Liệu Sản Phẩm" value="{{ old("ChatLieu") }}" required>
                                        @error("ChatLieu")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col" id="formInputMoneyGoc">
                                    <div class="mb-3">
                                        <label>Giá Gốc</label>
                                        <input class="form-control @error(" GiaKhuyenMai") is-invalid border-danger @enderror" type="number" name="GiaKhuyenMai" id="GiaKhuyenMai" value="{{ old("GiaKhuyenMai") }}" placeholder="Giá Gốc Của Sản Phẩm (Nếu Có)" min="1">
                                        @error("GiaKhuyenMai")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col" id="formInputMoney">
                                    <div class="mb-3">
                                        <label>Giá Bán</label>
                                        <input class="form-control @error(" GiaSanPham") is-invalid border-danger @enderror" type="number" onkeyup="CapNhacGiaNhap()" name="GiaSanPham" value="{{ old("GiaSanPham") }}" id="Gia" placeholder="Giá Bán Sản Phẩm" min="1" required>
                                        @error("GiaSanPham")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col" id="formAmountPr">
                                    <div class="mb-3">
                                        <label>Số Lượng</label>
                                        <input class="form-control @error(" SoLuong") is-invalid border-danger @enderror" type="number" onkeyup="CapNhacGiaNhap()" name="SoLuong" value="{{ old("SoLuong") }}" id="SoLuong" placeholder="Số Lượng Sản Phẩm" min="1" required="required">
                                        @error("SoLuong")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Nhãn</label>
                                        <select name="Nhan" class="form-control">
                                            <option value="">Không Có</option>
                                            <option value="hot">HOT</option>
                                            <option value="sale">Giảm Giá</option>
                                            <option value="new">Hàng Mới</option>
                                            <option value="featured">Nổi Bật</option>
                                            <option value="clearance">Xả</option>
                                            <option value="limited">Giới Hạn</option>
                                            <option value="discount">Ưu Đãi Đặc Biệt</option>
                                        </select>
                                        @error("Nhan")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Mô Tả</label>
                                        <textarea name="MoTaSanPham" class="note-DATN">{{ old("MoTaSanPham") }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div id="formTheLoaiSanPham" style="display: none;">
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
                                        </div>
                                    </div>

                                    <div class="col" style="display: none" id="formBienThe">
                                        <div class="mb-3">
                                            <label>Màu Sắc</label>
                                            <select id="chonMauSac" class="form-control mb-3" name="MauSac" onchange="chonMauSacc()">
                                                <option value="">-- Chọn Màu Sắc --</option>
                                                @foreach ($thongTinMauSac as $MauSac)
                                                <option value="{{ $MauSac->id }}">{{ $MauSac->TenMauSac }}</option>
                                                @endforeach
                                            </select>
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
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route("SanPham.index") }}" class="btn btn-dark">Quay Lại</a>
                                </div>
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-primary me-3" type="submit">Thêm Ngay</button>
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
                            <input type="file" class="d-none" id="image" name="hinhAnh" required>
                            <div class="dropzone-wrapper">
                                <div class="dz-message dropzone-secondary">
                                    <label for="image">
                                        <i class="icon-cloud-up"></i>
                                        <h6 class="mt-3 mb-3">Kéo & Thả ảnh vào đây hoặc Nhấn để chọn ảnh đại diện sản phẩm</h6>
                                        <img id="imagePreview" src="#" alt="Preview hình ảnh" class="img-fluid" style="display:none;" />
                                    </label>
                                </div>
                            </div>

                            <div id="formSPThuong">
                                <label for="" class="mt-3">Bộ Sưu Tập</label>
                                <input type="file" class="d-none" id="khoAnh" name="images[]" multiple>
                                <div class="dropzone-wrapper">
                                    <div class="dz-message">
                                        <label for="khoAnh">
                                            <i class="icon-cloud-up"></i>
                                            <h6 class="mt-3 mb-3">Kéo & Thả ảnh vào đây hoặc Nhấn để chọn nhiều ảnh sản phẩm</h6>
                                        </label>
                                        <div class="image-preview" id="imagesPreview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
            document.getElementById("formTheLoaiSanPham").style.display = "none";
            formAmountPr.style.display = "block";
            inputSoLuong.setAttribute("required", "required");
            formSPThuong.style.display = "block";
            document.getElementById("chonKichCo").removeAttribute("required");
            document.getElementById("formInputMoney").style.display = "block";
            document.getElementById("formInputMoneyGoc").style.display = "block";
            document.getElementById("Gia").setAttribute("required", "required");
        } else {
            document.getElementById("formTheLoaiSanPham").style.display = "block";
            formAmountPr.style.display = "none";
            inputSoLuong.removeAttribute("required");
            formSPThuong.style.display = "none";
            document.getElementById("chonKichCo").setAttribute("required", "required");
            document.getElementById("Gia").removeAttribute("required");
            document.getElementById("formInputMoney").style.display = "none";
            document.getElementById("formInputMoneyGoc").style.display = "none";
        }
    }

    function chonMauSacc() {
        var form = document.getElementById("danhSachBienThe");
        document.getElementById("formGiaTienAmount").style.display = "block";
        var KichCo = document.getElementById("chonKichCo").value;
        var MauSac = document.getElementById("chonMauSac").value;
        var Gia = document.getElementById("Gia").value;

        setTimeout(() => {
            document.getElementById("chonMauSac").selectedIndex = 0;
        }, 500);

        let soThuTuBienThe = document.querySelectorAll('#danhSachBienThe .row').length;

        <?php foreach ($thongTinMauSac as $MauSacCon): ?>
            var checkForm = document.getElementById('itemNhapAllMauSac_{{ $MauSacCon->id }}_' + KichCo);
            if (!checkForm) {
                if (MauSac == "{{ $MauSacCon->id }}") {
                    form.insertAdjacentHTML('beforeend', `
<div class="col" id="itemNhapAllMauSac_{{ $MauSacCon->id }}_${KichCo}">
    <div class="row bienThe">
        <div class="col">
            <small class="label-control">Kích Cỡ</small>
            <div class="colorProducts">Size ${KichCo}</div>
        </div>
        <div class="col">
            <small class="label-control">Màu Sắc</small>
            <div class="colorProducts1">{{ $MauSacCon->TenMauSac }}</div>
        </div>
        <input type="hidden" name="ThongTinBienThe[]" value="${KichCo}|${MauSac}">
        <div class="col">
            <small class="label-control">Giá Tiền (<span class="text-danger">*</span>)</small>
            <input type="text" class="form-control form-control-sm GiaBienThe" name="GiaBienThe[]" value="${Gia}" required>
        </div>
        <div class="col">
            <small class="label-control">Số Lượng (<span class="text-danger">*</span>)</small>
            <input type="text" class="form-control form-control-sm SoLuongBienThe" name="SoLuongBienThe[]" value="0" required>
        </div>
        <div class="col">
            <small class="label-control">Hình Ảnh (<span class="text-danger">*</span>)</small>
            <input type="file" class="form-control form-control-sm HinhAnh" name="HinhAnh[${soThuTuBienThe}][]" multiple required>
        </div>
        <div class="col pt-2">
            <span class="badge bg-danger mt-4 w-100" onclick="xoaBienTheKichCo('itemNhapAllMauSac_{{ $MauSacCon->id }}_${KichCo}')"><i class="fas fa-trash"></i></span>
        </div>
    </div>
</div>
`);
                }
            }
        <?php endforeach; ?>
    }


    function chonBienThe() {
        document.getElementById("formBienThe").style.display = "block";
    }

    function CapNhacGiaNhap() {
        var Gia = document.getElementById("Gia").value;
        const GiaBienThe = document.getElementsByClassName("GiaBienThe");
        const SoLuongBienThe = document.getElementsByClassName("SoLuongBienThe");

        if (Gia >= 1) {
            const values = Array.from(GiaBienThe).map(input => input.value);
            const values1 = Array.from(SoLuongBienThe).map(input => input.value);
            values.forEach((value, index) => {
                GiaBienThe[index].value = Number(Gia);
            });

            values1.forEach((value, index) => {
                SoLuongBienThe[index].value = "0";
            });
        }
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
        } else {
            imagePreview.src = "";
            imagePreview.style.display = 'none';
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
</script>
@endsection