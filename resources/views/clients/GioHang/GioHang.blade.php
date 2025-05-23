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
        @if(session("error"))
        <div class="alert alert-danger mb-2">{{ session("error") }}</div>
        @endif

        @if(session("success"))
        <div class="alert alert-success mb-2">{{ session("success") }}</div>
        @endif
        <div class="row orders mt-3">
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
                                @if ($gioHangClient->soLuongBienThe >= 1)
                                <label for="inputCart_{{ $gioHangClient->cart_id }}" onclick="totalMoney('{{ $gioHangClient->cart_id }}')" class="checkbox-label"></label>
                                @endif
                            </td>
                            <td class="image">
                                <a class="media-link" href="/san-pham/{{ $gioHangClient->DuongDan }}"><i class="fa fa-circle-info"></i>
                                    <img src="{{ Storage::url($gioHangClient->HinhAnh) }}" alt="" style="width: 100px; height: 100px" />
                                </a>
                                <h4><a href="/san-pham/{{ $gioHangClient->DuongDan }}">{{ $gioHangClient->TenSanPham }}</a></h4>
                                @if ($gioHangClient->soLuongBienThe <= 0)
                                    <span class="parameter-product-cart"><b class="text-danger">Sản Phẩm Đã Hết Hàng</b></span>
                                    @else
                                    <span class="parameter-product-cart">{{ $gioHangClient->TenKichCo }} - {{ $gioHangClient->TenMauSac }}</span>
                                    @endif
                            </td>
                            <td class="form-soLuong">
                                <div class="form-quantity">
                                    <span class="btn-minus" data-id="{{ $gioHangClient->cart_id }}"><i class="fas fa-minus"></i></span>
                                    <input type="number" class="quantity-input" data-id="{{ $gioHangClient->cart_id }}" value="{{ $gioHangClient->soLuongGioHang ?? $gioHangClient->SoLuong }}" min="1" readonly>
                                    <span class="btn-plus" data-id="{{ $gioHangClient->cart_id }}"><i class="fas fa-plus"></i></span>
                                </div>
                            </td>
                            <td class="quantity money" id="GiaSanPham_{{ $gioHangClient->cart_id }}">{{ number_format($gioHangClient->GiaSanPhamBienThe) }} đ</td>
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

                        @foreach ($danhSachGioHangThuong as $gioHangThuongClient)
                        <tr>
                            <td class="inputSelectCart">
                                <label for="inputCart_{{ $gioHangThuongClient->cart_id }}" onclick="totalMoney('{{ $gioHangThuongClient->cart_id }}')" class="checkbox-label"></label>
                            </td>
                            <td class="image">
                                <a class="media-link" href="/san-pham/{{ $gioHangThuongClient->DuongDan }}"><i class="fa fa-circle-info"></i>
                                    <img src="{{ Storage::url($gioHangThuongClient->HinhAnh) }}" alt="" style="width: 100px; height: 100px" />
                                </a>
                                <h4><a href="/san-pham/{{ $gioHangThuongClient->DuongDan }}">{{ $gioHangThuongClient->TenSanPham }}</a></h4>
                            </td>
                            <td class="form-soLuong">
                                <div class="form-quantity">
                                    <span class="btn-minus" data-id="{{ $gioHangThuongClient->cart_id }}"><i class="fas fa-minus"></i></span>
                                    <input type="number" class="quantity-input" data-id="{{ $gioHangThuongClient->cart_id }}" value="{{ $gioHangThuongClient->soLuongGioHang ?? $gioHangThuongClient->SoLuong }}" min="1" readonly>
                                    <span class="btn-plus" data-id="{{ $gioHangThuongClient->cart_id }}"><i class="fas fa-plus"></i></span>
                                </div>
                            </td>
                            <td class="quantity money" id="GiaSanPham_{{ $gioHangThuongClient->cart_id }}">{{ number_format($gioHangThuongClient->GiaSanPham) }} đ</td>
                            <td class="total" id="ThanhTien_{{ $gioHangThuongClient->cart_id }}">{{ number_format($gioHangThuongClient->ThanhTien) }}đ</td>
                            <td class="total">
                                <form action="{{ route("gio-hang.destroy", $gioHangThuongClient->cart_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn Chắc Chắn Muốn Xóa Khỏi Giỏ Hàng!')">
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

            <div class="col-md-4">
                <h3 class="block-title"><span>Thống Kê Giỏ Hàng</span></h3>
                <div class="shopping-cart">
                    <table>
                        <tr>
                            <td style="text-align: start">Số Lượng Giỏ Hàng:</td>
                            <td style="text-align: start; font-weight: bold" id="total_amount_cart">{{ number_format($soLuongSPGioHangClient) }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: start">Tính Tổng Giỏ Hàng:</td>
                            <td style="text-align: start; font-weight: bold" id="total_money_cart">{{ number_format($tongTienSanPhamGioHangClient) }} đ</td>
                        </tr>
                        <tr>
                            <td style="text-align: start">Số Sản Phẩm Chọn:</td>
                            <td style="text-align: start; font-weight: bold" id="amount_checkout">0</td>
                        </tr>
                        <tr>
                            <td style="text-align: start">Tổng Tiền Sản Phẩm Chọn:</td>
                            <td style="text-align: start; font-weight: bold" id="total_money">0</td>
                        </tr>
                        <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: center; font-weight: bold; padding: 10px 0px">Tổng Thanh Toán: <span id="total_moneys">0 đ</span></td>
                            </tr>
                        </tfoot>
                    </table>
                    <form action="{{ route("pay") }}" method="POST">
                        @csrf
                        @foreach ($danhSachGioHangClient as $gioHangClient1)
                        <input type="checkbox" name="selected_products[]" id="inputCart_{{ $gioHangClient1->cart_id }}" class="checkbox-cart-input" value="{{ $gioHangClient1->cart_id }}">
                        @endforeach
                        @foreach ($danhSachGioHangThuong as $gioHangThuongClient1)
                        <input type="checkbox" name="selected_products[]" id="inputCart_{{ $gioHangThuongClient1->cart_id }}" class="checkbox-cart-input" value="{{ $gioHangThuongClient1->cart_id }}">
                        @endforeach
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
@endsection

@section("js")
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setInterval(function() {
            fetch(location.href)
                .then(response => response.text())
                .then(data => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(data, "text/html");

                    const newCartCount = doc.querySelector("#cart-count");
                    if (newCartCount) {
                        document.getElementById("cart-count").innerHTML = newCartCount.innerHTML;
                    }

                    const newListHeader = doc.querySelector("#list-product-header");
                    if (newListHeader) {
                        document.getElementById("list-product-header").innerHTML = newListHeader.innerHTML;
                    }
                })
                .catch(error => console.log("Lỗi: ", error));
        }, 2000);
    });

    $(document).ready(function() {
        setInterval(function() {
            $.get(location.href, function(data) {
                var $data = $(data);

                $(".parameter-product-cart").each(function(index) {
                    var newContent = $data.find(".parameter-product-cart").eq(index).html();
                    if (newContent) {
                        $(this).html(newContent);
                    }
                });

                $(".inputSelectCart").each(function(index) {
                    var newContent = $data.find(".inputSelectCart").eq(index);
                    if (newContent) {
                        var isActive = $(this).find(".checkbox-label").hasClass("active");

                        $(this).html(newContent.html());

                        if (isActive) {
                            $(this).find(".checkbox-label").addClass("active");
                        }
                    }
                });
            });
        }, 2000);
    });

    window.addEventListener("load", function() {
        localStorage.removeItem('list_id_cart');
    });

    function totalMoney(id) {
        let selectedCartIds = getSelectedCartIds();

        if (selectedCartIds.includes(id)) {
            selectedCartIds = selectedCartIds.filter(cartId => cartId !== id);
        } else {
            selectedCartIds.push(id);
        }

        localStorage.setItem('list_id_cart', JSON.stringify(selectedCartIds));

        fetch("<?= route('api.client'); ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    type: "total_cart",
                    cart_id_list: selectedCartIds
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    document.getElementById("amount_checkout").innerHTML = data.amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    document.getElementById("total_money").innerHTML = data.total_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    document.getElementById("total_moneys").innerHTML = data.total_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                } else {
                    AlertDATN("error", data.message);
                }
            })
            .catch(error => {
                console.error("Lỗi API:", error);
                AlertDATN("error", "Đã xảy ra lỗi, vui lòng thử lại.");
            });
    }

    function getSelectedCartIds() {
        return JSON.parse(localStorage.getItem('list_id_cart')) || [];
    }


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
            let selectedCartIds = getSelectedCartIds();

            $.ajax({
                url: "/gio-hang/" + id,
                type: "PUT",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    quantity: quantity,
                    cartIdList: selectedCartIds
                },
                success: function(data) {
                    if (data.status == "success") {
                        document.getElementById("ThanhTien_" + data.id).innerHTML = data.total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
                        document.getElementById("total_amount_cart").innerHTML = data.total_cart.soLuongSP.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        document.getElementById("total_money_cart").innerHTML = data.total_cart.tongTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
                        document.getElementById("total_money").innerHTML = data.total_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
                    }
                    
                    if (data.status == "error") {
                        AlertDATN("error", data.message);
                        let input = $(`.quantity-input[data-id='${id}']`);
                        input.val((data.input ?? 1));
                        document.getElementById("ThanhTien_" + data.id).innerHTML = data.total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
                        document.getElementById("total_amount_cart").innerHTML = data.total_cart.soLuongSP.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        document.getElementById("total_money_cart").innerHTML = data.total_cart.tongTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
                        document.getElementById("total_money").innerHTML = data.total_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
                    }
                },
                error: function(error) {
                    let errorMessage = "Có lỗi xảy ra!";
                    if (error.responseJSON && error.responseJSON.message) {
                        errorMessage = error.responseJSON.message;
                    }
                    AlertDATN(errorMessage);
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