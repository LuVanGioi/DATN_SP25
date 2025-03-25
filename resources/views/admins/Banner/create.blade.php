@extends("admins.themes")

@section("titleHead")
    <title>Thêm Banner - ADMIN</title>
@endsection

@section("main")
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>THÔNG TIN Banner</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Banner.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="TenBanner">Link Đường Dẫn (Nếu Có)</label>
                                    <input class="form-control @error("TenBanner") is-invalid border-danger @enderror"
                                        type="text" name="TenBanner" id="TenBanner" placeholder="Link Đường Dẫn Chuyển Hướng"
                                        value="{{ old("TenBanner")}}">
                                    @error("TenBanner")
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="HinhAnh" class="form-label">Hình Ảnh</label>
                                    <input class="form-control @error('HinhAnh') is-invalid border-danger @enderror"
                                        type="file" name="HinhAnh[]" id="HinhAnh" multiple accept="image/*">

                                    @error('HinhAnh')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="TrangThai" class="form-label">Trạng thái</label>
                                            <select id="TrangThai" name="TrangThai" class="form-control" required>
                                                <option value="hien">Hiện</option>
                                                <option value="an">Ẩn</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <a href="{{route('Banner.index')}}" class="btn btn-sm btn-light">Quay Lại</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="text-end">
                                            <button class="btn btn-primary me-3" type="submit">Thêm Ngay</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection