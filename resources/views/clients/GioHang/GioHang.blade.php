@extends("clients.themes")

@section("title")
<title>Giỏ Hàng - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h1>Giỏ Hàng</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="/">Trang Chủ</a></li>
            <li class="active">Giỏ Hàng</li>
        </ul>
    </div>
</section>

<section class="page-section color">
    <div class="container">

        <div class="row orders">
            <div class="col-md-8">
                <h3 class="block-title"><span>Danh Sách Giỏ Hàng</span></h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá Tiền</th>
                            <th>Tổng Tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($danhSachGioHangClient as $gioHangClient)
                        <tr>
                            <td class="inputSelectCart">
                                <label for="inputCart_{{ $gioHangClient->cart_id }}" class="checkbox-label"></label>
                            </td>
                            <td class="image">
                                <a class="media-link" href="/san-pham/{{ $gioHangClient->DuongDan }}"><i class="fa fa-circle-info"></i>
                                    <img src="{{ Storage::url($gioHangClient->HinhAnh) }}" alt="" style="width: 100px; height: 100px" />
                                </a>
                                <h4><a href="/san-pham/{{ $gioHangClient->DuongDan }}">{{ $gioHangClient->TenSanPham }}</a></h4>
                                {{ $gioHangClient->TenKichCo }} - {{ $gioHangClient->TenMauSac }}
                            </td>
                            <td>
                                <div class="form-quantity">
                                    <span class="btn-minus" data-id="{{ $gioHangClient->cart_id }}"><i class="fas fa-minus"></i></span>
                                    <input type="number" class="quantity-input" data-id="{{ $gioHangClient->cart_id }}" value="{{ $gioHangClient->SoLuong }}" min="1" readonly>
                                    <span class="btn-plus" data-id="{{ $gioHangClient->cart_id }}"><i class="fas fa-plus"></i></span>
                                </div>
                            </td>
                            <td class="quantity money" id="GiaSanPham_{{ $gioHangClient->cart_id }}">{{ number_format($gioHangClient->GiaSanPham) }} đ</td>
                            <td class="total" id="ThanhTien_{{ $gioHangClient->cart_id }}">{{ number_format($gioHangClient->ThanhTien) }}đ</td>
                            <td class="total">
                                <form action="{{ route("gio-hang.destroy", $gioHangClient->cart_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn Chắc Chắn Muốn Xóa Khỏi Giỏ Hàng!')">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-none"><i class="fa fa-close"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @php
            $giamGia = session('giamGia', 0);
            $tongTienSauGiam = $tongTienSanPhamGioHangClient - $giamGia;
            @endphp
            <div class="col-md-4">
                <h3 class="block-title"><span>Thống Kê Giỏ Hàng</span></h3>
                <div class="shopping-cart">
                    <table>
                        <tr>
                            <td style="text-align: start">Số Lượng:</td>
                            <td style="text-align: start; font-weight: bold">{{ number_format($soLuongGioHangClient) }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: start">Tạm Tính:</td>
                            <td style="text-align: start; font-weight: bold">{{ number_format($tongTienSanPhamGioHangClient) }} đ</td>
                        </tr>
                        <!-- <tr>
                            <td style="text-align: start">Giảm Giá:</td>
                            <td style="text-align: start; font-weight: bold">{{ number_format($giamGia) }}</td>
                        </tr> -->
                        <tfoot>
                            <tr>
                                <td>Tổng Tiền:</td>
                                <td>{{ number_format($tongTienSauGiam) }} đ</td>
                            </tr>
                        </tfoot>
                    </table>
                    <form action="{{ route("pay") }}" method="POST">
                        @csrf
                        @foreach ($danhSachGioHangClient as $gioHangClient1)
                        <input type="checkbox" name="selected_products[]" id="inputCart_{{ $gioHangClient1->cart_id }}" class="checkbox-cart-input" value="{{ $gioHangClient1->cart_id }}">
                        @endforeach

                        <!-- <div class="form-group">
                            <input class="form-control" type="text" name="discount" placeholder="Nhập mã giảm giá của bạn" value="{{ old("discount") }}" />
                            @error("discount")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            @if (session('error'))
                            <p class="text-danger">{{ session('error') }}</p>
                            @endif
                            @if (session('success'))
                            <p class="text-success">{{ session('success') }}</p>
                            @endif
                        </div>
                        <button type="submit" name="action" value="acept_voucher" class="btn btn-primary btn-block" @if ($soLuongGioHangClient <=0)
                            disabled
                            @endif>Áp Dụng Mã</button> -->
                        <button type="submit" name="action" value="payment" class="btn btn-success btn-block" id="btnContinue" disabled @if ($soLuongGioHangClient <=0)
                            disabled
                            @endif>Tiếp Tục <i class="fas fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="row blocks shop-info-banners">
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-gift"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Mua 1 Tặng 1</h4>
                            Nhận ưu đãi đặc biệt khi mua sắm tại cửa hàng của chúng tôi.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-comments"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Gọi Miễn Phí</h4>
                            Liên hệ với chúng tôi để được tư vấn miễn phí về sản phẩm.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-trophy"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Hoàn Tiền!</h4>
                            Đảm bảo hoàn tiền nếu bạn không hài lòng với sản phẩm.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <h2 class="section-title" style="font-size: 25px;padding: 20px 0px;"><span>Sản Phẩm Khác</span></h2>
        <div class="featured-products-carousel">
            <div class="owl-carousel" id="featured-products-carousel">
                @foreach ($danhSachSanPham as $i => $sanPhamKhac)
                @if ($i++ <= 10)
                    <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" href="{{ route("san-pham.show", xoadau($sanPhamKhac->TenSanPham)) }}">
                            <img src="{{ Storage::url($sanPhamKhac->HinhAnh) }}" alt="">
                        </a>
                        @if ($sanPhamKhac->Nhan)
                        <span class="ribbons {{ $sanPhamKhac->Nhan }}">{{ nhan($sanPhamKhac->Nhan) }}</span>
                        @endif
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title">
                            <a href="{{ route("san-pham.show", xoadau($sanPhamKhac->TenSanPham)) }}">{{ $sanPhamKhac->TenSanPham }}</a>
                        </h4>
                        <div class="categoris-product">
                            <a href="">Quần áo nam</a>
                            <a href="">Adidas</a>
                            <a href="">{{ $sanPhamKhac->ChatLieu }}</a>
                        </div>
                        <div class="price">
                            <ins>{{ number_format($sanPhamKhac->GiaSanPham) }}đ</ins>
                            @if ($sanPhamKhac->GiaKhuyenMai)
                            <del>{{ number_format($sanPhamKhac->GiaKhuyenMai) }}đ</del>
                            @endif
                        </div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="https://www.facebook.com/sharer/sharer.php?u={{ route("san-pham.show", xoadau($sanPhamKhac->TenSanPham)) }}" target="_blank">
                                <i class="fa fa-share"></i>
                            </a>

                            <a class="btn btn-theme btn-theme-transparent btn-icon-left">
                                <form action="{{ route("gio-hang.store") }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_product" value="{{ $sanPhamKhac->id }}">
                                    <button type="submit" class="btn-none"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                                </form>
                            </a>
                            <a class="btn btn-theme btn-theme-transparent btn-compare"
                                href="{{ route("san-pham.show", xoadau($sanPhamKhac->TenSanPham)) }}">
                                <i class="fa fa-circle-info"></i>
                            </a>
                        </div>
                    </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <hr class="page-divider half">
    <a class="btn btn-theme btn-view-more-block" href="/" style="max-width: 100%;">Xem Thêm</a>
    </div>
</section>
@endsection

@section("js")
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(".btn-plus, .btn-minus").click(function() {
            let id = $(this).data("id");
            let input = $(`.quantity-input[data-id='${id}']`);
            let quantity = parseInt(input.val());

            if ($(this).hasClass("btn-plus")) {
                quantity++;
            } else if ($(this).hasClass("btn-minus") && quantity > 1) {
                quantity--;
            }

            input.val(quantity);

            updateCart(id, quantity);
        });

        $(".quantity-input").change(function() {
            let id = $(this).data("id");
            let quantity = parseInt($(this).val());
            if (quantity < 1) {
                $(this).val(1);
                quantity = 1;
            }
            updateCart(id, quantity);
        });

        function updateCart(id, quantity) {
            $.ajax({
                url: "/gio-hang/" + id,
                type: "PUT",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    quantity: quantity
                },
                success: function(data) {
                    document.getElementById("ThanhTien_" + data.id).innerHTML = data.total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
                    
                    console.log(data);
                },
                error: function(error) {
                    let errorMessage = "Có lỗi xảy ra!";
                    if (error.responseJSON && error.responseJSON.message) {
                        errorMessage = error.responseJSON.message;
                    }
                    alert(errorMessage);
                }
            });
        }
    });


    document.addEventListener("DOMContentLoaded", function() {
        const checkboxes = document.querySelectorAll(".checkbox-cart-input");
        const btnContinue = document.getElementById("btnContinue");

        function checkCheckboxSelected() {
            let isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            btnContinue.disabled = !isChecked;
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", function() {
                const label = document.querySelector(`label[for="${checkbox.id}"]`);
                if (label) {
                    label.classList.toggle("active", checkbox.checked);
                }
                checkCheckboxSelected();
            });

            const label = document.querySelector(`label[for="${checkbox.id}"]`);
            if (label) {
                label.addEventListener("click", function(event) {
                    event.preventDefault();
                    checkbox.checked = !checkbox.checked;
                    label.classList.toggle("active", checkbox.checked);
                    checkCheckboxSelected();
                });
            }
        });

        checkCheckboxSelected();
    });
</script>
@endsection