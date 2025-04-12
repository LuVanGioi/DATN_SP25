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
                                        <h2 class="f-w-600">56</h2>
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
                                        <h2 class="f-w-600">20</h2>
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
                                        <h2 class="f-w-600">5</h2>
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
                                <span class="f-light f-w-500 f-14">Hoàn Thành</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">31</h2>
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
                                        <h2 class="f-w-600">0</h2>
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
                                        <h2 class="f-w-600">0</h2>
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
                    <div class="card-body border-b-primary border-2">
                        <span class="f-light f-w-500 f-14">Danh Mục</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">143</h2>
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
                                <h2 class="f-w-600">1.454</h2>
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
                        <span class="f-light f-w-500 f-14">Thành Viên</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">1.843</h2>
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
                    <div class="card-body border-b-success border-2">
                        <span class="f-light f-w-500 f-14">Đơn Hàng</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">1.245</h2>
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
                    <div class="card-body border-b-secondary border-2">
                        <span class="f-light f-w-500 f-14">Mã Giảm Giá</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">3</h2>
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
                                <h2 class="f-w-600">0</h2>
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


        <div class="page-title">
            <h4>Hỗ Trợ & Báo Lỗi</h4>
        </div>

        <div class="row">
            <div class="col-xl-6 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-primary border-2">
                        <span class="f-light f-w-500 f-14">Báo Cáo Tháng {{ date("m") }}</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">4</h2>
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

            <div class="col-xl-6 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-warning border-2">
                        <span class="f-light f-w-500 f-14">Báo Cáo Ngày {{ date("d") }}</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">1</h2>
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

            <div class="col-xl-4 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-info border-2">
                        <span class="f-light f-w-500 f-14">Chưa Giải Quyết</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">1</h2>
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

            <div class="col-xl-4 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-success border-2">
                        <span class="f-light f-w-500 f-14">Đã Giải Quyết</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">3</h2>
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

            <div class="col-xl-4 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-secondary border-2">
                        <span class="f-light f-w-500 f-14">Không Hỗ Trợ</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">0</h2>
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

        <div class="page-title">
            <h4>Khác</h4>
        </div>

        <div class="row">
            <div class="col-xl-4 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-primary border-2">
                        <span class="f-light f-w-500 f-14">Đánh Giá</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">155</h2>
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

            <div class="col-xl-4 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-warning border-2">
                        <span class="f-light f-w-500 f-14">Lượt Xem Bài Viết</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">1.543.245.753</h2>
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

            <div class="col-xl-4 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-info border-2">
                        <span class="f-light f-w-500 f-14">Banner</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">4</h2>
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

            <div class="col-xl-4 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-success border-2">
                        <span class="f-light f-w-500 f-14">Mail Khách Hàng</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">5.325.782</h2>
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

            <div class="col-xl-4 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-secondary border-2">
                        <span class="f-light f-w-500 f-14">Thành Viên Bị Cấm</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">0</h2>
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

            <div class="col-xl-4 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body border-b-dark border-2">
                        <span class="f-light f-w-500 f-14">Sử Dụng Mã Giảm Giá</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">5</h2>
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
                        data: <?= json_encode($revenues); ?>,
                        backgroundColor: "#006666",
                        borderColor: "rgb(13, 161, 161)",
                        borderWidth: 1
                    },
                    {
                        label: "Chờ Nhận",
                        data: <?= json_encode($choNhan); ?>,
                        backgroundColor: "rgb(255, 169, 21)",
                        borderColor: "rgb(213, 137, 6)",
                        borderWidth: 1
                    },
                    {
                        label: "Tổng Hoàn",
                        data: <?= json_encode($revenues); ?>,
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