@extends("clients.themes")

@section("title")
<title>{{ $thongTinSanPham->TenSanPham }} - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section">
    <div class="container">

        @if(session("error"))
        <div class="alert alert-danger mb-2">{{ session("error") }}</div>
        @endif

        @if(session("success"))
        <div class="alert alert-success mb-2">{{ session("success") }}</div>
        @endif

        @error("id_product")
        <div class="alert alert-danger mb-2">{{ $message }}</div>
        @enderror

        <div class="row product-single mt-2">
            <div class="col-md-6">
                <div class="badges">
                    <div class="{{ $thongTinSanPham->Nhan }}">{{ $thongTinSanPham->Nhan }}</div>
                </div>

                <div class="owl-carousel img-carousel">
                    @if ($thongTinSanPham->TheLoai == "bienThe")
                    @foreach ($khoAnhBienThe as $khoAnh)
                    <div class="item">
                        <a class="btn btn-theme btn-theme-transparent btn-zoom"
                            href="{{ Storage::url($khoAnh->DuongDan) }}" data-gal="prettyPhoto"><i
                                class="fa fa-plus"></i></a>
                        <a href="{{ Storage::url($khoAnh->DuongDan) }}" data-gal="prettyPhoto"><img
                                class="img-responsive" src="{{ Storage::url($khoAnh->DuongDan) }}" alt="{{ $thongTinSanPham->TenSanPham }}"></a>
                    </div>
                    @endforeach
                    @else
                    @foreach ($khoAnhSanPham as $khoAnh)
                    <div class="item">
                        <a class="btn btn-theme btn-theme-transparent btn-zoom"
                            href="{{ Storage::url($khoAnh->DuongDan) }}" data-gal="prettyPhoto"><i
                                class="fa fa-plus"></i></a>
                        <a href="{{ Storage::url($khoAnh->DuongDan) }}" data-gal="prettyPhoto"><img
                                class="img-responsive" src="{{ Storage::url($khoAnh->DuongDan) }}" alt="{{ $thongTinSanPham->TenSanPham }}"></a>
                    </div>
                    @endforeach
                    @endif
                </div>

                <div class="row product-thumbnails" style="margin-top: -5px; padding-top: 0px;">
                    @if ($thongTinSanPham->TheLoai == "bienThe")
                    @foreach ($khoAnhBienThe as $index => $khoAnh1)
                    <div class="col-xs-2 col-sm-2 col-md-3">
                        <a href="#" onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [<?= $index + 1 ?>, 300]);">
                            <img src="{{ Storage::url($khoAnh1->DuongDan) }}" alt="{{ $thongTinSanPham->TenSanPham }}"></a>
                    </div>
                    @endforeach
                    @else
                    @foreach ($khoAnhSanPham as $index => $khoAnh1)
                    <div class="col-xs-2 col-sm-2 col-md-3">
                        <a href="#" onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [<?= $index + 1 ?>, 300]);">
                            <img src="{{ Storage::url($khoAnh1->DuongDan) }}" alt="{{ $thongTinSanPham->TenSanPham }}"></a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="product-title">{{ $thongTinSanPham->TenSanPham }}</h2>
                <div class="product-rating clearfix">
                    <div class="rating">
                        <span class="fas fa-star text-warning"></span>
                        <span class="fas fa-star text-warning"></span>
                        <span class="fas fa-star text-warning"></span>
                        <span class="fas fa-star text-warning"></span>
                        <span class="fas fa-star text-warning"></span>
                    </div>
                    <a class="reviews">16 reviews</a>
                </div>
                <div class="product-availability">Danh Mục: <strong>{{ $danhMuc->TenDanhMucSanPham }}</strong></div>
                <div class="product-availability">Thương Hiệu: <strong>{{ $thuongHieu->TenThuongHieu }}</strong></div>
                <div class="product-availability">Chất Liệu: <strong>{{ $thongTinSanPham->ChatLieu }}</strong></div>
                @if ($soLuongBienTheSanPham >= 1)
                <div class="product-availability">Sản Phẩm Có Sẵn: <strong id="soLuongSanPham">{{ number_format($tongSoLuongBienThe->soLuongSanPhamBienTheAll) }}</strong></div>
                @else
                <div class="product-availability">Sản Phẩm Có Sẵn: <strong>{{ number_format($thongTinSanPham->SoLuong) }}</strong></div>
                @endif
                <hr class="page-divider small">

                <div class="product-price">
                    @if ($thongTinSanPham->TheLoai == "bienThe")
                    <span id="GiaTienSP">{{ number_format(DB::table("bien_the_san_pham")->where("ID_SanPham", $thongTinSanPham->id)->where("Xoa", 0)->min("Gia")) }}</span>
                    @else
                    <span id="GiaTienSP">{{ number_format($thongTinSanPham->GiaSanPham) }}</span>
                    @endif
                    đ
                    @if ($thongTinSanPham->TheLoai == "thuong")
                    @if ($thongTinSanPham->GiaKhuyenMai)
                    - <del style="color:rgb(115, 115, 115)"><small>{{ number_format($thongTinSanPham->GiaKhuyenMai) }} đ</small></del>
                    @endif
                    @endif
                </div>
                <hr class="page-divider">

                <form class="row variable" submit-ajax="true" action="{{ route("gio-hang.store") }}" method="POST" time_load="0" swal_success="" type="POST">
                    <input type="hidden" name="id_product" value="{{ $thongTinSanPham->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="action" id="actionField" value="">

                    @if ($soLuongBienTheSanPham >= 1)
                    <div class="col-sm-6">
                        <div class="form-group selectpicker-wrapper">
                            <label for="exampleSelect1">Kích Cỡ</label>
                            <select name="size" id="size-select" class="form-select" onchange="chonKickCo()">
                                <option value="">Chọn Kích Cỡ</option>
                                @foreach ($bienTheSanPham as $kichCo)
                                <option value="{{ $kichCo->KichCo }}">{{ $kichCo->KichCo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group selectpicker-wrapper">
                            <label for="exampleSelect2">Màu Sắc</label>
                            <select name="color" id="color-select" class="form-select" onchange="changeCarouselImage(this)">
                                <option value="" data-index="0">Chọn Màu Sắc</option>
                            </select>
                        </div>
                    </div>
                    @endif

                    <div class="col-md-12">
                        <hr class="page-divider small">
                        <div class="buttons mb-3">
                            <div class="quantity">
                                <button type="button" class="btn" onclick="minusAmount()"><i class="fa fa-minus"></i></button>
                                <input class="form-control qty" style="width: 50px; text-align: center" type="number" step="1" min="1" name="quantity" id="quantity"
                                    value="{{ (old("quantity") ?? "1") }}" title="Số Lượng" onkeyup="checkQuantity()">
                                <button type="button" class="btn" onclick="plusAmount()"><i class="fa fa-plus"></i></button>
                                @error("quantity")
                                <p class="text-danger d-block">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="buttons mt-3" style="margin-top: 10px;">
                            <button class="btn btn-theme btn-cart" type="submit" data-action="add_to_cart">
                                <i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ
                            </button>
                            <button class="btn btn-theme btn-cart" type="submit" data-action="buy_now">
                                <i class="fa fa-shopping-cart"></i> Mua Ngay
                            </button>
                        </div>
                    </div>
                </form>
                <hr class="page-divider small">

                <ul class="social-icons list-inline">
                    <li><a href="#" class="facebook"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#" class="pinterest"><i class="fab fa-pinterest"></i></a></li>
                </ul>

            </div>
        </div>

    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="tabs-wrapper content-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#item-description" data-toggle="tab">Thông Tin Sản Phẩm</a></li>
                <li><a href="#reviews" data-toggle="tab">Đánh Giá (0)</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="item-description">
                    <p>{!! $thongTinSanPham->Mota !!}</p>
                </div>
                <div class="tab-pane fade" id="reviews">
                    <div class="comments">

                        <div class="media comment">
                            <a href="#" class="pull-left comment-avatar">
                                <img alt="" src="" class="media-object">
                            </a>
                            <div class="media-body">
                                <p class="comment-meta">
                                    <span class="comment-author">
                                        <a>MạnhDev</a>
                                        <span class="comment-date"> 4 Ngày Trước <i class="fa fa-flag"></i></span>
                                    </span>
                                </p>
                                <p class="comment-text">Xin Chào</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section md-padding">
    <div class="container">
        <div class="row blocks shop-info-banners">
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-credit-card"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Thanh toán</h4>
                            Thanh toán qua các cổng online và COD 1 cách nhanh chóng.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-headset"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Hỗ trợ</h4>
                            Đội ngũ hỗ trợ 24/7. Sẵn sàng giúp bạn tư vấn và giải đáp thắc mắc.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-rotate-left"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Hoàn trả</h4>
                            Có hỗ trợ đổi trả hàng, bạn nhận lại 100% giá trị đơn hàng.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <h2 class="section-title" style="font-size: 25px;padding: 20px 0px;"><span>Sản Phẩm Liên Quan</span></h2>
        <div class="featured-products-carousel">
            <div class="owl-carousel" id="featured-products-carousel">
                @foreach ($danhSachSanPham as $i => $sanPhamKhac)
                @php
                $luotMua = DB::table("san_pham_don_hang")->where("Id_SanPham", $sanPhamKhac->id)->count();
                @endphp
                @if ($sanPhamKhac->DuongDan !== $thongTinSanPham->DuongDan && $i++ <= 10)
                    <div class="thumbnail product-item">
                    <div class="media">
                        <a class="media-link" href="{{ route("san-pham.show", xoadau($sanPhamKhac->TenSanPham)) }}">
                            <img src="{{ Storage::url($sanPhamKhac->HinhAnh) }}" alt="">
                        </a>
                        @if ($sanPhamKhac->Nhan)
                        <span class="ribbons {{ $sanPhamKhac->Nhan }}">{{ nhan($sanPhamKhac->Nhan) }}</span>
                        @endif
                        <div class="title-time">
                            {{ date("d.m") }}
                        </div>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title">
                            <a href="{{ route("san-pham.show", xoadau($sanPhamKhac->TenSanPham)) }}">{{ $sanPhamKhac->TenSanPham }}</a>
                        </h4>
                        <div class="price">
                            <ins>{{ number_format($sanPhamKhac->GiaSanPham) }}đ</ins>
                            <span>Đã bán {{ soGon($luotMua) }}</span>
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

<section class="page-section">
    <div class="container">
        <h2 class="section-title"><span>THƯƠNG HIỆU</span></h2>
        <div class="partners-carousel">
            <div class="owl-carousel" id="partners">
                @foreach ($allThuongHieu as $danhSachThuongHieu)
                <div>
                    <a href="/thuong-hieu/{{ xoadau($danhSachThuongHieu->TenThuongHieu) }}">
                        <img src="{{ Storage::url($danhSachThuongHieu->HinhAnh) }}" alt="" height="90px">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@section("js")
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

    function minusAmount() {
        var quantityInput = document.getElementById("quantity");
        var quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantityInput.value = quantity - 1;
        }
    }

    function plusAmount() {
        var quantityInput = document.getElementById("quantity");
        if (quantityInput.value <= 0) {
            AlertDATN("error", "Số Lượng Tối Thiểu Là 1");
            quantityInput.value = "";
        } else if (!quantityInput.value) {
            quantityInput.value = 1;
        } else {
            var quantity = parseInt(quantityInput.value);
            quantityInput.value = quantity + 1;
        }
    }

    function checkQuantity() {
        var quantityInput = document.getElementById("quantity");
        if (!quantityInput.value) {
            quantityInput.value = 1;
        } else if (quantityInput.value <= 0) {
            AlertDATN("error", "Số Lượng Tối Thiểu Là 1");
            quantityInput.value = "";
        }
    }

    function changeCarouselImage(select) {
        var selectedOption = select.options[select.selectedIndex];
        var index = selectedOption.getAttribute("data-index");
        var amount = selectedOption.getAttribute("data-amount");
        var price = selectedOption.getAttribute("data-price");

        if (amount) {
            document.getElementById("soLuongSanPham").innerHTML = amount;
        }
        document.getElementById("GiaTienSP").innerHTML = price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    var danhSachMauSac = <?= json_encode($bienTheSanPham2); ?>;

    function chonKickCo() {
        var size = document.getElementById("size-select").value;
        var colorSelect = document.getElementById("color-select");

        colorSelect.innerHTML = "";

        var defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.textContent = "Chọn Màu Sắc";
        defaultOption.setAttribute("data-index", "0");
        colorSelect.appendChild(defaultOption);

        danhSachMauSac.forEach(function(mauSac, index) {
            if (mauSac.KichCo === size) {
                var option = document.createElement("option");
                option.value = mauSac.ID_MauSac;
                option.textContent = mauSac.TenMauSac;
                option.setAttribute("data-index", index + 1);
                option.setAttribute("data-amount", mauSac.SoLuong);
                option.setAttribute("data-price", mauSac.Gia);
                if (mauSac.SoLuong <= 0) {
                    option.disabled = true;
                }
                colorSelect.appendChild(option);
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const track = document.querySelector('.carousel-track');
        const items = document.querySelectorAll('.carousel-item');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');

        let currentIndex = 0;
        const itemWidth = items[0].getBoundingClientRect().width;
        const totalItems = items.length;
        const visibleItems = Math.floor(track.parentElement.clientWidth / itemWidth);

        function updateCarousel() {
            track.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
        }

        nextBtn.addEventListener('click', () => {
            if (currentIndex < totalItems - visibleItems) {
                currentIndex++;
                updateCarousel();
            }
        });

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        });

        let isDragging = false;
        let startPos = 0;
        let currentTranslate = 0;
        let prevTranslate = 0;

        track.addEventListener('mousedown', (e) => {
            isDragging = true;
            startPos = e.clientX;
            currentTranslate = prevTranslate;
            track.style.transition = 'none';
        });

        track.addEventListener('mousemove', (e) => {
            if (isDragging) {
                const currentPosition = e.clientX;
                const diff = currentPosition - startPos;
                track.style.transform = `translateX(${currentTranslate + diff}px)`;
            }
        });

        track.addEventListener('mouseup', (e) => {
            if (isDragging) {
                isDragging = false;
                const movedBy = e.clientX - startPos;
                track.style.transition = 'transform 0.5s ease-in-out';

                if (movedBy < -50 && currentIndex < totalItems - visibleItems) {
                    currentIndex++;
                } else if (movedBy > 50 && currentIndex > 0) {
                    currentIndex--;
                }

                prevTranslate = -currentIndex * itemWidth;
                updateCarousel();
            }
        });

        track.addEventListener('mouseleave', () => {
            if (isDragging) {
                isDragging = false;
                track.style.transition = 'transform 0.5s ease-in-out';
                prevTranslate = -currentIndex * itemWidth;
                updateCarousel();
            }
        });

        track.addEventListener('touchstart', (e) => {
            isDragging = true;
            startPos = e.touches[0].clientX;
            currentTranslate = prevTranslate;
            track.style.transition = 'none';
        });

        track.addEventListener('touchmove', (e) => {
            if (isDragging) {
                const currentPosition = e.touches[0].clientX;
                const diff = currentPosition - startPos;
                track.style.transform = `translateX(${currentTranslate + diff}px)`;
            }
        });

        track.addEventListener('touchend', (e) => {
            if (isDragging) {
                isDragging = false;
                const movedBy = e.changedTouches[0].clientX - startPos;
                track.style.transition = 'transform 0.5s ease-in-out';

                if (movedBy < -50 && currentIndex < totalItems - visibleItems) {
                    currentIndex++;
                } else if (movedBy > 50 && currentIndex > 0) {
                    currentIndex--;
                }

                prevTranslate = -currentIndex * itemWidth;
                updateCarousel();
            }
        });

        window.addEventListener('resize', () => {
            const newItemWidth = items[0].getBoundingClientRect().width;
            if (newItemWidth !== itemWidth) {
                updateCarousel();
            }
        });
    });
</script>
@endsection