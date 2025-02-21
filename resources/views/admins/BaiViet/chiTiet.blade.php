@extends("admins.themes")

@section("titleHead")
    <title>Chi Tiết Bài Viết - ADMIN</title>
@endsection

@section("main")
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>THÔNG TIN BÀI VIẾT: <b>{{ $id }}</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMzusCp2hUNtwjDEwynboK6kw2GyJejpeTgg&s" class="img-fluid rounded"
                                            alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tiêu Đề</label>
                                        <input class="form-control" type="text" value="Tiêu Đề Bài Viết" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Danh Mục</label>
                                        <input class="form-control" type="text" value="Danh Mục Bài Viết" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tác Giả</label>
                                        <input class="form-control" type="text" value="Tên Tác Giả" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Ngày Đăng</label>
                                        <input class="form-control" type="text" value="DD/MM/YYYY" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Nội Dung</label>
                                        <textarea class="form-control" name="" id=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <a href="/admin/BaiViet" class="btn btn-sm btn-light">Quay Lại</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>BÀI VIẾT LIÊN QUAN</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <a class="list-group-item list-group-item-action" href="javascript:void(0)">
                                    <img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtCGSaflZFXPpVcwAmxALZBL4pBejUAcTdzA&s" alt=""> Tiêu Đề
                                    1
                                </a>
                                <a class="list-group-item list-group-item-action" href="javascript:void(0)">
                                    <img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbRShMUJbuh41tJZ5w-R7dXzAMKNlvTVZ0Qw&s" alt=""> Tiêu Đề
                                    2
                                </a>
                                <a class="list-group-item list-group-item-action" href="javascript:void(0)">
                                    <img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_TkJs6TBd34pEwiQsX0vILY5e5IMnu3-0vQ&s" alt=""> Tiêu Đề
                                    3
                                </a>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>THẺ TAG</h5>
                        </div>
                        <div class="card-body">
                            <span class="badge bg-primary">Tin tức</span>
                            <span class="badge bg-secondary">Bóng đá</span>
                            <span class="badge bg-success">Công nghệ</span>
                            <span class="badge bg-danger">Thể thao</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection