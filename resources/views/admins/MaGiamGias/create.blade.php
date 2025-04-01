@extends("admins.themes")

@section("titleHead")
    <title>Danh Sách Mã Giảm Giá - ADMIN</title>
@endsection

@section("main")

<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5>THÊM MÃ GIẢM GIÁ</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('maGiamGias.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name">Mã Code</label>
                                <input class="form-control @error('name') is-invalid border-danger @enderror" type="text" id="name" name="name" placeholder="Nhập mã giảm giá" value="{{ old('name') }}" required>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="quantity">Số Lượng</label>
                                <input class="form-control @error('quantity') is-invalid border-danger @enderror" type="number" id="quantity" name="quantity" placeholder="Nhập số lượng" value="{{ old('quantity') }}" min="1" required>
                                @error('quantity')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="value">Giá Trị (%)</label>
                                <input class="form-control @error('value') is-invalid border-danger @enderror" type="number" id="value" name="value" placeholder="Nhập giá trị (%)" value="{{ old('value') }}" min="1" max="100" required>
                                @error('value')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="max_value">Giá Trị Giảm Giá Tối Đa (VNĐ)</label>
                                <input class="form-control @error('max_value') is-invalid border-danger @enderror" type="text" id="max_value" name="max_value" placeholder="Nhập giá trị giảm giá tối đa" value="{{ old('max_value') }}" required>
                                @error('max_value')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="min_value">Giá Trị Đơn Hàng Tối Thiểu (VNĐ)</label>
                                <input class="form-control @error('min_value') is-invalid border-danger @enderror" type="text" id="min_value" name="min_value" placeholder="Nhập giá trị của đơn hàng tối thiểu" value="{{ old('min_value') }}" required>
                                @error('min_value')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="condition">Tiêu Đề</label>
                                <input class="form-control @error('condition') is-invalid border-danger @enderror" type="text" id="condition" name="condition" placeholder="Nhập tiêu đề" value="{{ old('condition') }}" required>
                                @error('condition')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="start_date">Ngày Bắt Đầu</label>
                                <input class="form-control @error('start_date') is-invalid border-danger @enderror" type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                                @error('start_date')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="end_date">Ngày Kết Thúc</label>
                                <input class="form-control @error('end_date') is-invalid border-danger @enderror" type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                                @error('end_date')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status">Trạng Thái</label>
                                <select class="form-select @error('status') is-invalid border-danger @enderror" id="status" name="status" required>
                                    <option value="on" {{ old('status') == 'on' ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="off" {{ old('status') == 'off' ? 'selected' : '' }}>Ngừng hoạt động</option>
                                </select>
                                @error('status')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary me-3" type="submit">Thêm Ngay</button>
                                <button class="btn btn-secondary" type="reset">Đặt Lại</button>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <a href="{{ route('maGiamGias.index') }}" class="btn btn-sm btn-light">Quay Lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection