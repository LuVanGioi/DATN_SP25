@extends("clients.themes")

@section("title")
<title>Đánh giá - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section">
    <div class="wrap container">
        <div class="row">
            <!-- Nội dung chính -->
            <div class="col-lg-9 col-md-9 col-sm-8">
                <div class="information-title">Đánh Giá và Nhận Xét Của Bạn</div>
                <div class="details-wrap">
                    <div class="details-box orders">
                        <!-- Nội dung đánh giá -->
                        <table class="table">
                            <tbody>
                                @php
                                $sanPhamDaHienThi = [];
                                @endphp
                                @foreach ($sanPhams as $sanPham)
                                @if (!in_array($sanPham->id, $sanPhamDaHienThi))
                                @php
                                $sanPhamDaHienThi[] = $sanPham->id;
                                $daDanhGia = $danhGias->contains('id_san_pham', $sanPham->id);
                                if(!$daDanhGia):
                                @endphp
                                <tr>
                                    <td class="ratings">
                                        <p> Đánh Giá Sản Phẩm -</p>
                                        <h4 class="caption-title">{{ $sanPham->TenSanPham }}</h4>
                                        <div class="rating" id="rating-{{ $sanPham->id }}">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fa fa-star star" data-value="{{ $i }}"></i>
                                                @endfor
                                        </div>
                                    </td>
                                    <td class="reviews">
                                        <form submit-ajax="true" action="{{ route('luu-danh-gia', ['id' => $sanPham->id]) }}" method="POST" time_load="0" swal_success="" type="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="rating" id="rating-value-{{ $sanPham->id }}">
                                            <input type="hidden" name="product_id" value="{{ $sanPham->id }}">
                                            <input type="hidden" name="trading" value="{{ $donHang->MaDonHang }}">
                                            <textarea name="noi_dung" class="form-control" rows="3" placeholder="Nhập đánh giá của bạn" {{ $daDanhGia ? 'disabled' : '' }}></textarea>
                                            <button type="submit" class="btn btn-theme mt-2" {{ $daDanhGia ? 'disabled' : '' }}>
                                                {{ $daDanhGia ? 'Đã Đánh Giá' : 'Gửi Đánh Giá' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                endif;
                                @endphp
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="reviews-list mt-4">
                        <h3>Đánh Giá Của Bạn Về Sản Phẩm Của Chúng Tôi</h3>
                        @foreach ($danhGias as $danhGia)
                        <div class="review-item">
                            <p style="display: flex; align-items: center; gap: 10px;">
                                <strong>{{ $danhGia->user_name }}</strong> - {{ date('d/m/Y H:i', strtotime($danhGia->ngay_danh_gia)) }}
                            </p>
                            <p style="display: flex; align-items: center; gap: 10px;">
                                <span>Sản phẩm: <strong>{{ $danhGia->TenSanPham }}</strong></span>
                            <div class="ratinggg" id="ratinggg-{{ $danhGia->id_san_pham }}">
                                @for ($i = 1; $i <= $danhGia->rating; $i++)
                                    <i class="fa fa-star" style="color: #f39c12"></i>
                                    @endfor

                            </div>
                            </p>
                            <p>{{ $danhGia->noi_dung }}</p>
                            @if ($danhGia->tra_loi)
                            <p class="shop-reply-title" style="cursor: pointer;">
                                Phản hồi của Shop <span class="toggle-icon">></span>
                            </p>
                            <div class="admin-reply-container" style="display: none;">
                                <p class="admin-reply"><strong>Wanderweave:</strong> {{ $danhGia->tra_loi }}</p>
                            </div>
                            @endif
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-4">
                <div class="widget account-details">
                    <h2 class="widget-title">Đánh Giá và Nhận Xét</h2>
                    <ul>
                        <li><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                        <li><a href="/vi"> Ví Của Tôi </a></li>
                        <li><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
                        <li><a href="/dia-chi-nhan-hang">Địa Chỉ Nhận Hàng</a></li>
                        <li><a href="/lich-su-don-hang">Lịch Sử Đơn Hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .rating .star {
        font-size: 24px;
        color: #ccc;
        cursor: pointer;
    }

    .rating .star.selected {
        color: #f39c12;
    }

    .ratinggg .star {
        font-size: 24px;
        color: #ccc;
        cursor: pointer;
    }

    .ratinggg .star.selected {
        color: #f39c12;
    }

    .rating .fa-star,
    .rating .fa-star,
    .ratinggg .fa-star {
        font-size: 24px;
        color: #ccc;
        cursor: pointer;
    }

    .rating .fa-star.selected,
    .ratinggg .fa-star.selected {
        color: #f39c12;
    }
</style>
<style>
    .review-item p {
        margin: 0;
    }

    .review-item p .btn-edit {
        font-size: 14px;
        color: #007bff;
        text-decoration: none;
        margin-left: 10px;
    }

    .review-item p .btn-edit:hover {
        text-decoration: underline;
    }

    .admin-reply strong {
        color: #28a745;
        font-size: 18px;
        font-weight: bold;

    }

    .shop-reply-title {
        font-weight: bold;
        font-size: 16px;
        color: #333;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        cursor: pointer;
    }

    .shop-reply-title .toggle-icon {
        font-size: 16px;
        color: #8a8e92;
        transition: transform 0.3s ease;
    }

    .admin-reply-container {
        margin-left: 20px;
        padding: 10px;
        border-left: 2px solid #ddd;
        display: none;
        background-color: #f9f9f9;
        border-radius: 5px;
    }

    .ratinggg {
        display: flex;
        align-items: center;
        gap: 2px;
    }

    .ratinggg.fa-star {
        font-size: 14px;
        float: right;
    }

    .ratinggg .fa-star {
        font-size: 14px;
        color: #ccc;
    }

    .ratinggg .fa-star.selected {
        color: #f39c12;
    }
</style>
@endsection

@section("js")
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ratings = document.querySelectorAll('.rating');

        ratings.forEach(rating => {
            const stars = rating.querySelectorAll('.star');
            const productId = rating.getAttribute('id').split('-')[1];
            const hiddenInput = document.getElementById('rating-value-' + productId);

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const ratingValue = parseInt(this.getAttribute('data-value'));

                    stars.forEach(s => {
                        if (parseInt(s.getAttribute('data-value')) <= ratingValue) {
                            s.classList.add('selected');
                        } else {
                            s.classList.remove('selected');
                        }
                    });

                    hiddenInput.value = ratingValue;
                });
            });
        });
    });
</script>
@endsection