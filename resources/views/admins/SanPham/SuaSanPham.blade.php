@extends("admins.themes")

@section("titleHead")
<title>Chỉnh Sửa Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <form action="{{ route("SanPham.update", $sanPham->id) }}" class="form theme-form" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
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
                                        <label>Danh Mục</label>
                                        <select name="DanhMuc" class="form-control" required>
                                            @foreach ($danhSachDanhMuc as $DanhMuc)
                                            <option value="{{ $DanhMuc->id }}" {{ ($sanPham->ID_DanhMuc == $DanhMuc->id ? "selected" : "") }}>{{ $DanhMuc->TenDanhMucSanPham }}</option>
                                            @endforeach
                                        </select>
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
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Chất Liệu</label>
                                        <input class="form-control" type="text" name="ChatLieu" placeholder="Chất Liệu Sản Phẩm" value="{{ $sanPham->ID_ChatLieu }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tên Sản Phẩm</label>
                                        <input class="form-control" type="text" name="TenSanPham" placeholder="Tên Sản Phẩm" value="{{ $sanPham->TenSanPham }}" required>
                                    </div>
                                </div>

                                <div class="col" id="formInputMoney">
                                    <div class="mb-3">
                                        <label>Giá Sản Phẩm</label>
                                        <input class="form-control" type="number" name="GiaSanPham" id="Gia" placeholder="Giá Bán Sản Phẩm" value="{{ $sanPham->GiaSanPham }}" required>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Trạng Thái</label>
                                        <select class="form-control" name="TrangThai" required>
                                            <option value="hien" {{ $sanPham->TrangThai == "hien" ? "selected" : "" }}>Hiện</option>
                                            <option value="an" {{ $sanPham->TrangThai == "an" ? "selected" : "" }}>Ẩn</option>
                                        </select>
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
                                    <div class="mb-3">
                                        <label>Thể Loại</label>
                                        <select name="TheLoai" id="theLoaiSanPham" class="form-control" onchange="viewFormBienThe()" required>
                                            <option value="thuong" {{ $sanPham->TheLoai == "thuong" ? "selected" : "" }}>Sản Phẩm Thường</option>
                                            <option value="bienThe" {{ $sanPham->TheLoai == "bienThe" ? "selected" : "" }}>Sản Phẩm Biến Thể</option>
                                        </select>
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
        </form>

        <div class="card" id="formBienThe" style="display: {{ $sanPham->TheLoai == 'bienThe' ? 'block' : 'none' }}">
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
                                            <th>Trạng Thái</th>
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
                                                @if ($bienTheSanPham->Xoa == "1")
                                                <b class="text-danger w-100">Ẩn</b>
                                                @else
                                                <b class="text-success w-100">Hiển Thị</b>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalEdit_{{ $bienTheSanPham->id }}">Sửa Biển Thể</button>
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

                                                        <form action="{{ route("BienTheSanPham.update", $bienTheSanPham->id) }}" method="post">
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
            <form action="{{ route("BienTheSanPham.store") }}" method="POST">
                @csrf
                <input type="hidden" name="ID_SanPham" value="{{ $sanPham->id }}">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Biển Thể Sản Phẩm</h5>
                    <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach($danhSachBienThe1 as $BienTheNutBam1)
                    @if ($BienTheNutBam1->id == 1)
                    @foreach ($KichCoChuaCo as $KichCo)
                    <?php $randomId2 = rand(10000, 99999); ?>
                    <div class="row" id="itemKichCo_{{ $KichCo->id.$randomId2 }}">
                        <div class="col">
                            <small for="" class="label-control">{{ $BienTheNutBam1->TenBienThe }}</small>
                            <div class="colorProducts">{{ $KichCo->TenKichCo }}</div>
                            <button class="btn btn-danger btn-xs w-100" onclick="xoaBienTheKichCo('itemKichCo_{{ $KichCo->id.$randomId2 }}')"><i class="fal fa-trash"></i></button>
                        </div>
                        <input type="hidden" name="KichCo[]" value="{{ $KichCo->TenKichCo }}">

                        @foreach ($thongTinMauSac as $MauSacCon)
                        <?php $randomId = rand(1000, 9999); ?>
                        <div id="itemBienThe_{{ $MauSacCon->id.$randomId }}" class="col">
                            <input type="hidden" name="ThongTinBienThe[]" value="{{ $KichCo->TenKichCo }}|{{ $MauSacCon->id }}">
                            <div class="col">
                                <small for="" class="label-control">Màu Sắc</small>
                                <div class="colorProducts1">{{ $MauSacCon->TenMauSac }}</div>
                            </div>

                            <div class="col">
                                <small for="" class="label-control">Giá Tiền</small>
                                <input type="text" class="form-control form-control-sm GiaBienThe" name="GiaBienThe[]" placeholder="Nhập Giá Tiền" value="{{ $sanPham->GiaSanPham }}">
                            </div>

                            <div class="col">
                                <small for="" class="label-control">Số Lượng</small>
                                <input type="text" class="form-control form-control-sm SoLuongBienThe" name="SoLuongBienThe[]" placeholder="Nhập Số Lượng" value="1">
                            </div>

                            <div class="col">
                                <br>
                                <button class="btn btn-danger btn-xs w-100" onclick="xoaGiaTriBienThe('itemBienThe_{{ $MauSacCon->id.$randomId }}')"><i class="fal fa-trash"></i></button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    @endif
                    @endforeach
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

    document.getElementById('khoAnh').addEventListener('change', function() {
        imagesPreview.innerHTML = '';
        const files = Array.from(this.files);

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
                    deleteBtn.onclick = () => container.remove();

                    container.appendChild(img);
                    container.appendChild(deleteBtn);

                    imagesPreview.appendChild(container);
                }

                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endsection