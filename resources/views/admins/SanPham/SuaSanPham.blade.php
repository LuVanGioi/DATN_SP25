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
                                        <label>Chất Liệu</label>
                                        <select name="ChatLieu" class="form-control" required>
                                            @foreach ($danhSachChatLieu as $ChatLieu)
                                            <option value="{{ $ChatLieu->id }}" {{ ($sanPham->ID_ChatLieu == $ChatLieu->id ? "selected" : "") }}>{{ $ChatLieu->TenChatLieu }}</option>
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
                                        <img id="imagePreview" src="#" alt="Preview hình ảnh" class="img-fluid" style="display:none;" />
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
                                        <div class="image-container">
                                            <img src="{{ Storage::url($hinhAnh->DuongDan) }}">
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card" id="formBienThe" {{ $sanPham->TheLoai == "thuong" ? 'style="display: none"' : '' }}>
                        <div class="card-header">
                            <h5>BIẾN THỂ SẢN PHẨM</h5>
                        </div>
                        <div class="card-body">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 view formViewBienThe">
                                            @foreach ($thongTinKichCo as $KichCo)
                                            <?php $randomId2 = rand(10000, 99999); ?>
                                            <div class="row" id="itemKichCo_{{ $KichCo->id.$randomId2 }}">
                                                <div class="col">
                                                    <small for="" class="label-control">Kích Cỡ</small>
                                                    <div class="colorProducts">{{ $KichCo->TenKichCo }}</div>
                                                    <button class="btn btn-danger btn-xs w-100" onclick="xoaBienTheKichCo('itemKichCo_{{ $KichCo->id.$randomId2 }}')"><i class="fal fa-trash"></i></button>
                                                </div>
                                                <input type="hidden" name="KichCo[]" value="{{ $KichCo->TenKichCo }}">

                                                @foreach ($danhSachBienThe as $bienThe)
                                                @if ($bienThe->KichCo == $KichCo->TenKichCo)
                                                @foreach ($thongTinMauSac as $MauSacCon)
                                                @if ($MauSacCon->id == $bienThe->ID_MauSac)
                                                <?php $randomId = rand(1000, 9999); ?>
                                                <input type="hidden" name="MauSac[]" value="{{ $MauSacCon->id }}">
                                                <div id="itemBienThe_{{ $MauSacCon->id.$randomId }}" class="col">
                                                    <div class="col">
                                                        <small for="" class="label-control">Màu Sắc</small>
                                                        <div class="colorProducts1">{{ $MauSacCon->TenMauSac }}</div>
                                                    </div>

                                                    <div class="col">
                                                        <small for="" class="label-control">Giá Tiền</small>
                                                        <input type="text" class="form-control form-control-sm GiaBienThe" name="GiaBienThe[]" placeholder="Nhập Giá Tiền" value="{{ $bienThe->Gia }}">
                                                    </div>

                                                    <div class="col">
                                                        <small for="" class="label-control">Số Lượng</small>
                                                        <input type="text" class="form-control form-control-sm SoLuongBienThe" name="SoLuongBienThe[]" placeholder="Nhập Số Lượng" value="{{ $bienThe->SoLuong }}">
                                                    </div>

                                                    <div class="col">
                                                        <br>
                                                        <button class="btn btn-danger btn-xs w-100" onclick="xoaGiaTriBienThe('itemBienThe_{{ $MauSacCon->id.$randomId }}')"><i class="fal fa-trash"></i></button>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
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
            </div>
        </form>
    </div>
</div>
@endsection


@section("js")
<script>
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