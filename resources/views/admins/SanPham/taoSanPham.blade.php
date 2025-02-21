@extends("admins.themes")

@section("titleHead")
<title>Thêm Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <form action="" class="form theme-form" method="POST">
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
                                        <label>Danh Mục</label>
                                        <select name="" class="form-control">
                                            @foreach ($danhSachChatLieu as $ChatLieu)
                                            <option value="{{ $ChatLieu->id }}">{{ $ChatLieu->TenChatLieu }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Chất Liệu</label>
                                        <select name="" class="form-control">
                                            @foreach ($danhSachChatLieu as $ChatLieu)
                                            <option value="{{ $ChatLieu->id }}">{{ $ChatLieu->TenChatLieu }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Thương Hiệu</label>
                                        <select name="" class="form-control">
                                            @foreach ($danhSachThuongHieu as $ThuongHieu)
                                            <option value="{{ $ThuongHieu->id }}">{{ $ThuongHieu->TenThuongHieu }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tên Sản Phẩm</label>
                                        <input class="form-control" type="text" placeholder="Tên Sản Phẩm" required>
                                    </div>
                                </div>

                                <div class="col" id="formInputMoney">
                                    <div class="mb-3">
                                        <label>Giá Sản Phẩm</label>
                                        <input class="form-control" type="number" placeholder="Giá Bán Sản Phẩm" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Mô Tả</label>
                                        <textarea name="note" class="note-DATN"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Thể Loại</label>
                                        <select name="" id="theLoaiSanPham" class="form-control" onchange="viewFormBienThe()">
                                            <option value="thuong">Sản Phẩm Thường</option>
                                            <option value="bienThe">Sản Phẩm Biến Thể</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="text-end">
                                        <a class="btn btn-primary me-3" type="submit">Thêm Ngay</a>
                                        <button class="btn btn-secondary" type="reset">Đặt Lại</button>
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
                            <form action="/upload" class="dropzone" id="image-upload" enctype="multipart/form-data">
                                <div class="dz-message"></div>
                            </form>

                            <form class="dropzone" action="" enctype="multipart/form-data">
                                <label for="">Hình Ảnh</label>
                                <input type="file" class="d-none" id="images" name="hinhAnh">
                                <div class="dropzone-wrapper">
                                    <div class="dz-message dropzone-secondary">
                                        <label for="hinhAnh">
                                            <i class="icon-cloud-up"></i>
                                            <h6 class="mt-3 mb-3">Kéo & Thả ảnh vào đây hoặc Nhấn để chọn ảnh đại diện sản phẩm</h6>
                                        </label>
                                    </div>
                                </div>

                                <label for="" class="mt-3">Bộ Sưu Tập</label>
                                <input type="file" class="d-none" id="khoAnh" name="images[]" multiple>
                                <div class="dropzone-wrapper">
                                    <div class="dz-message">
                                        <label for="khoAnh">
                                            <i class="icon-cloud-up"></i>
                                            <h6 class="mt-3 mb-3">Kéo & Thả ảnh vào đây hoặc Nhấn để chọn nhiều ảnh sản phẩm</h6>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card" id="formBienThe" style="display: none">
                        <div class="card-header">
                            <h5>BIẾN THỂ SẢN PHẨM</h5>
                        </div>
                        <div class="card-body">
                            <ul class="danhSachBienTheNutBam">
                                @foreach ($danhSachBienThe as $BienTheNutBam)
                                <li class="nutBienThe" onclick="viewFormInputBienThe('textM{{ $BienTheNutBam->id }}', '{{ $BienTheNutBam->TenBienThe }}')" id="textM{{ $BienTheNutBam->id }}NutBam">{{ $BienTheNutBam->TenBienThe }}</li>
                                @endforeach
                            </ul>

                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($danhSachBienThe as $BienTheNutBam1)
                                        <div class="col-md-6 formViewBienThe" id="textM{{ $BienTheNutBam1->id }}">
                                            @foreach ($danhSachGiaTriBienThe as $GiaTriBienThe)
                                            @if ($GiaTriBienThe->ID_BienThe == $BienTheNutBam1->id)
                                            <div class="row">
                                                <div class="col">
                                                    <small for="" class="label-control">{{ $BienTheNutBam1->TenBienThe }}</small>
                                                    <div class="colorProducts">{{ $GiaTriBienThe->TenGiaTri }}</div>
                                                </div>

                                                <div class="col">
                                                    <small for="" class="label-control">Giá Tiền</small>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Nhập Giá Tiền">
                                                </div>

                                                <div class="col">
                                                    <small for="" class="label-control">Số Lượng</small>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Nhập Số Lượng">
                                                </div>

                                                <div class="col">
                                                    <br>
                                                    <button class="btn btn-danger btn-xs w-100"><i class="fal fa-trash"></i></button>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        @endforeach
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
    function viewFormBienThe() {
        var theLoaiSanPham = document.getElementById("theLoaiSanPham").value;

        if (theLoaiSanPham == "bienThe") {
            document.getElementById("formBienThe").style.display = "block";
            document.getElementById("formInputMoney").style.display = "none";
        } else {
            document.getElementById("formBienThe").style.display = "none";
            document.getElementById("formInputMoney").style.display = "block";
        }
    }

    function viewFormInputBienThe(id, value) {
        var button = document.getElementById(id + "NutBam");

        if (button.innerHTML == value) {
            button.classList.add("view");
            button.innerHTML = ' ' + value;
            document.getElementById(id).classList.add("view");
        } else {
            button.classList.remove("view"); //tắt
            button.innerHTML = value;
            document.getElementById(id).classList.remove("view");
        }
    }
</script>
@endsection