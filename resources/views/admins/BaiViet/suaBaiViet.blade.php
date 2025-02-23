@extends("admins.themes")

@section("titleHead")
    <title>Sửa Bài Viết - ADMIN</title>
@endsection

@section("main")
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>SỬA BÀI VIẾT</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('BaiViet.update', $baiViet->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label>Hình Ảnh</label>
                                    <div>
                                        <img class="img-fluid" src="{{ asset('storage/' . $baiViet->hinh_anh) }}"
                                            alt="Hình ảnh bài viết">
                                    </div>
                                    <input class="form-control mt-2" type="file" name="hinh_anh" id="hinh_anh">
                                    @error("hinh_anh")
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="danh_muc_id">Danh Mục</label>
                                    <select class="form-control" name="danh_muc_id" id="danh_muc_id" required>
                                        <option value="">Chọn danh mục</option>
                                        @foreach($danhMuc as $dm)
                                            <option value="{{ $dm->id }}" {{ $baiViet->danh_muc_id == $dm->id ? 'selected' : '' }}>{{ $dm->TenDanhMucBaiViet }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tieu_de">Tiêu Đề</label>
                                    <input class="form-control @error("tieu_de") is-invalid border-danger @enderror"
                                        type="text" name="tieu_de" id="tieu_de" value="{{ $baiViet->tieu_de }}" required>
                                    @error("tieu_de")
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tac_gia">Tác Giả</label>
                                    <input class="form-control @error("tac_gia") is-invalid border-danger @enderror"
                                        type="text" name="tac_gia" id="tac_gia" value="{{ $baiViet->tac_gia }}" required>
                                    @error("tac_gia")
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="noi_dung">Nội Dung</label>
                                    <textarea name="noi_dung" id="noi_dung"
                                        class="note-DATN">{{ $baiViet->noi_dung }}</textarea>
                                    @error("noi_dung")
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <a href="{{ route('BaiViet.index') }}" class="btn btn-sm btn-dark">Quay Lại</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="text-end">
                                            <button class="btn btn-primary me-3" type="submit">Cập Nhật</button>
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