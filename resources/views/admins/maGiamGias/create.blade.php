@extends("admins.themes")

@section("titleHead")
    <title>Danh Sách Mã Giảm Giá - ADMIN</title>
@endsection

@section("main")
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-left">Thêm Mã Giảm Giá</h2>
            <form action="{{ route('maGiamGias.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Tên Mã</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                
                <div class="mb-3">
                    <label for="value" class="form-label">Giá Trị (%)</label>
                    <input type="number" class="form-control" id="value" name="value" required>
                </div>

                <div class="mb-3">
                    <label for="min_value" class="form-label">Giá Trị Tối Thiểu (VNĐ)</label>
                    <input type="number" class="form-control" id="min_value" name="min_value" required>
                </div>

                <div class="mb-3">
                    <label for="max_value" class="form-label">Giá Trị Tối Đa (VNĐ)</label>
                    <input type="number" class="form-control" id="max_value" name="max_value" required>
                </div>

                <div class="mb-3">
                    <label for="condition" class="form-label">Điều Kiện</label>
                    <input type="text" class="form-control" id="condition" name="condition" required>
                </div>

                <div class="mb-3">
                    <label for="start_date" class="form-label">Ngày Bắt Đầu</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>

                <div class="mb-3">
                    <label for="end_date" class="form-label">Ngày Kết Thúc</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Trạng Thái</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="Hoạt động">Hoạt động</option>
                        <option value="Ngừng hoạt động">Ngừng hoạt động</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Thêm Mã Giảm Giá</button>
                <a href="{{ route('maGiamGias.index') }}" class="btn btn-secondary">Quay Lại</a>
            </form>
        </div>
    </div>
</div>
@endsection