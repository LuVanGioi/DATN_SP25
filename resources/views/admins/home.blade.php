@extends("admins.themes")

@section("titleHead")
<title>Thống Kê - ADMIN</title>
@endsection


@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="page-title">
            <h4>Doanh Thu Hệ Thống</h4>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Doanh Thu Đơn Hàng
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card o-hidden small-widget">
                            <div class="card-body border-b-primary border-2">
                                <span class="f-light f-w-500 f-14">Tổng Đơn Hàng</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ number_format($tongDonHang) }}</h2>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card o-hidden small-widget">
                            <div class="card-body border-b-warning border-2">
                                <span class="f-light f-w-500 f-14">Chờ Giao</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ number_format($tongDonHangChoGiao) }}</h2>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card o-hidden small-widget">
                            <div class="card-body border-b-info border-2">
                                <span class="f-light f-w-500 f-14">Đang Giao</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ number_format($tongDonHangDangGiao) }}</h2>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"> </li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card o-hidden small-widget">
                            <div class="card-body border-b-success border-2">
                                <span class="f-light f-w-500 f-14">Đã Giao</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ number_format($tongDonHangDaGiao) }}</h2>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"> </li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"> </li>
                                    <li class="bubble"></li>
                                    <li class="bubble"> </li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"> </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card o-hidden small-widget">
                            <div class="card-body border-b-dark border-2">
                                <span class="f-light f-w-500 f-14">Thất Bại</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ number_format($tongDonHangThatBai) }}</h2>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"> </li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card o-hidden small-widget">
                            <div class="card-body border-b-secondary border-2">
                                <span class="f-light f-w-500 f-14">Hoàn Hàng</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ number_format($tongDonHangHoanHang) }}</h2>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"> </li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="page-title">
            <h4>Hệ Thống</h4>
        </div>
        <div class="row">
        <div class="col-xl-2 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-success border-2">
                        <span class="f-light f-w-500 f-14">Môn Thể Thao</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{ number_format($monTheThao) }}</h2>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"> </li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"> </li>
                            <li class="bubble"></li>
                            <li class="bubble"> </li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"> </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-primary border-2">
                        <span class="f-light f-w-500 f-14">Danh Mục</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{ number_format($danhMuc) }}</h2>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-warning border-2">
                        <span class="f-light f-w-500 f-14">Sản Phẩm</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{ number_format($sanPham) }}</h2>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-info border-2">
                        <span class="f-light f-w-500 f-14">Khách Hàng</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{ number_format($khachHang) }}</h2>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"> </li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-secondary border-2">
                        <span class="f-light f-w-500 f-14">Mã Giảm Giá</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{ number_format($maGiamGia) }}</h2>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"> </li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-dark border-2">
                        <span class="f-light f-w-500 f-14">Bài Viết</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{ number_format($baiViet) }}</h2>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"> </li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("js")
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("myChart").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: <?= json_encode($months); ?>,
                datasets: [
                    {
                        label: "Tổng Nhận",
                        data: <?= json_encode($daGiao); ?>,
                        backgroundColor: "#006666",
                        borderColor: "rgb(13, 161, 161)",
                        borderWidth: 1
                    },
                    {
                        label: "Tổng Hoàn",
                        data: <?= json_encode($hoanHang); ?>,
                        backgroundColor: "rgb(213, 19, 19)",
                        borderColor: "rgb(187, 0, 0)",
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

@endsection