@extends("clients.themes")

@section("title")
<title>Hoàn Hàng #{{ $id }}- {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
@if ($donHang->TrangThai == "hoanhang")
<script>
    location.href = "/lich-su-don-hang"
</script>
@endif
<section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h1>HOÀN HÀNG / TRẢ HÀNG</h1>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <form submit-ajax="true" action="{{route('api.client')}}" method="POST" time_load="1500" swal_success="" type="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="type" value="comfirm_refund_order">
            <input type="hidden" name="trading" value="{{ $id }}">
            <div class="row mt-3">
                <div class="col-md-5 product-refund">
                    <h4 class="block-title mb-1"><span>Sản Phẩm Cần Hủy</span></h4>
                    <div><small>Vui Lòng Chọn Sản Phẩm Cần Hủy</small></div>
                    @foreach ($sanPhamMua as $item)
                    <label for="input-{{ $item->Id_SanPham }}" style="width: 100%">
                        <input type="checkbox" class="d-none" name="product[]" id="input-{{ $item->Id_SanPham }}" value="{{ $item->Id_SanPham }}">
                        <div class="card card-body" id="products-{{ $item->Id_SanPham }}">
                            <div class="media" style="display: flex; align-items: center; gap: 15px; width: 100%; padding: 10px 5px">
                                <img class="align-self-center img-fluid img-60" width="100" height="100"
                                    src="{{ Storage::url($item->HinhAnh)}}" alt="#"
                                    style="object-fit: cover; border-radius: 5px;">
                                <div class="media-body ms-3"
                                    style="display: flex; flex-direction: column; align-items: flex-start; width: 100%; color: black;">
                                    <div class="product-name" style="margin-bottom: 5px; color: black;">
                                        <h6 style="margin: 0; font-size: 16px; font-weight: bold; color: black;">
                                            {{ $item->TenSanPham }}
                                        </h6>
                                    </div>
                                    <div class="text" style="font-size: 13px; margin-bottom: 5px; color: #888;">
                                        {{ $item->KichCo }} - {{ $item->MauSac }}
                                    </div>
                                    <div class="price d-flex"
                                        style="font-size: 14px; margin-bottom: 5px; color: black;">
                                        <div class="text" style="color: black;">Giá : </div>
                                        {{ number_format($item->GiaTien, 0, ',', '.') }}đ
                                    </div>
                                    <div class="avaiabilty" style="font-size: 14px; color: black;">
                                        <div class="text" style="color: black;">Số Lượng : {{ $item->SoLuongMua }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                    @endforeach
                </div>

                <div class="col-md-7">
                    <h4 class="block-title mb-1"><span>Thông Tin Hoàn Hàng</span></h4>
                    <div class="form-group mt-4">
                        <label for="reason" style="font-size: 14px">Lý Do Hoàn Hàng <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="reason" rows="3" placeholder="Vui lòng nhập lý do hoàn hàng"></textarea>
                    </div>

                    <div class="form-group d-flex">
                        <div id="list-images" class="list-images"></div>
                        <label for="images" class="upload-image-refund">
                            <input type="file" id="images" multiple>
                            <i class="fas fa-image"></i>
                            <div><span id="amount-image">0</span>/6</div>
                        </label>
                    </div>

                    <div class="mt-2">
                        <div class="d-flex justify-between">
                            <a href="{{ route('lich-su-don-hang.index') }}" class="btn btn-danger">
                                <i class="fas fa-arrow-left"></i> Quay Lại
                            </a>
                            <button type="submit" class="btn btn-primary" data-action="huydon" onclick="return confirm('Bạn có chắc chắn muốn hoàn trả đơn hàng này?')">
                                <i class="fas fa-times"></i> Xác Nhận Hoàn Hàng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section("js")
<script>
    let filesArray = [];

    document.addEventListener('DOMContentLoaded', function() {
        const inputImages = document.getElementById('images');
        const listImages = document.getElementById('list-images');
        const amountImage = document.getElementById('amount-image');

        inputImages.addEventListener('change', function(event) {
            const newFiles = Array.from(event.target.files);

            if (filesArray.length + newFiles.length > 6) {
                AlertDATN('error', 'Chỉ Được Chọn Tối Đa 6 Hình Ảnh');
                return;
            }

            filesArray = filesArray.concat(newFiles);
            renderImages();
            updateAmount();
            inputImages.value = '';
        });

        function renderImages() {
            listImages.innerHTML = '';
            filesArray.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const item = document.createElement('div');
                    item.className = 'item-image';
                    item.innerHTML = `
                    <span class="del-image" data-index="${index}"><i class="fas fa-times"></i></span>
                    <img src="${e.target.result}" alt="">
                `;
                    listImages.appendChild(item);
                };
                reader.readAsDataURL(file);
            });
        }

        function updateAmount() {
            amountImage.textContent = filesArray.length;
        }

        listImages.addEventListener('click', function(event) {
            if (event.target.closest('.del-image')) {
                const index = event.target.closest('.del-image').dataset.index;
                filesArray.splice(index, 1);
                renderImages();
                updateAmount();
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="product[]"]');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("click", function(e) {
                const card = document.getElementById(`products-${this.value}`);

                if (this.checked) {
                    card.classList.add("active");
                } else {
                    card.classList.remove("active");
                }
            });
        });
    });
</script>

@endsection