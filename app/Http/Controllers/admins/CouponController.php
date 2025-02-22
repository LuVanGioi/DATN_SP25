<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request; // Đảm bảo bạn đã import lớp Request
use Illuminate\Pagination\LengthAwarePaginator;
class CouponController extends Controller
{
    public function index(Request $request)
{
    $coupons = [
        ['id' => 1, 'name' => 'Giảm 10%', 'value' => 10, 'min_value' => 100, 'max_value' => 500, 'condition' => 'Mua hàng từ 100k', 'start_date' => '2025-02-01', 'end_date' => '2025-02-28', 'status' => 'Hoạt động'],
        ['id' => 2, 'name' => 'Giảm 20%', 'value' => 20, 'min_value' => 200, 'max_value' => 1000, 'condition' => 'Mua hàng từ 200k', 'start_date' => '2025-03-01', 'end_date' => '2025-03-31', 'status' => 'Ngừng hoạt động'],
        ['id' => 3, 'name' => 'Giảm 10%', 'value' => 10, 'min_value' => 100, 'max_value' => 500, 'condition' => 'Mua hàng từ 100k', 'start_date' => '2025-02-01', 'end_date' => '2025-02-28', 'status' => 'Hoạt động'],
        ['id' => 4, 'name' => 'Giảm 20%', 'value' => 20, 'min_value' => 200, 'max_value' => 1000, 'condition' => 'Mua hàng từ 200k', 'start_date' => '2025-03-01', 'end_date' => '2025-03-31', 'status' => 'Ngừng hoạt động'],
        ['id' => 5, 'name' => 'Giảm 10%', 'value' => 10, 'min_value' => 100, 'max_value' => 500, 'condition' => 'Mua hàng từ 100k', 'start_date' => '2025-02-01', 'end_date' => '2025-02-28', 'status' => 'Hoạt động'],
        ['id' => 6, 'name' => 'Giảm 20%', 'value' => 20, 'min_value' => 200, 'max_value' => 1000, 'condition' => 'Mua hàng từ 200k', 'start_date' => '2025-03-01', 'end_date' => '2025-03-31', 'status' => 'Ngừng hoạt động'],
        ['id' => 7, 'name' => 'Giảm 10%', 'value' => 10, 'min_value' => 100, 'max_value' => 500, 'condition' => 'Mua hàng từ 100k', 'start_date' => '2025-02-01', 'end_date' => '2025-02-28', 'status' => 'Hoạt động'],
        ['id' => 8, 'name' => 'Giảm 20%', 'value' => 20, 'min_value' => 200, 'max_value' => 1000, 'condition' => 'Mua hàng từ 200k', 'start_date' => '2025-03-01', 'end_date' => '2025-03-31', 'status' => 'Ngừng hoạt động'],
        ['id' => 9, 'name' => 'Giảm 10%', 'value' => 10, 'min_value' => 100, 'max_value' => 500, 'condition' => 'Mua hàng từ 100k', 'start_date' => '2025-02-01', 'end_date' => '2025-02-28', 'status' => 'Hoạt động'],
        ['id' => 10, 'name' => 'Giảm 20%', 'value' => 20, 'min_value' => 200, 'max_value' => 1000, 'condition' => 'Mua hàng từ 200k', 'start_date' => '2025-03-01', 'end_date' => '2025-03-31', 'status' => 'Ngừng hoạt động'],
        ['id' => 11, 'name' => 'Giảm 10%', 'value' => 10, 'min_value' => 100, 'max_value' => 500, 'condition' => 'Mua hàng từ 100k', 'start_date' => '2025-02-01', 'end_date' => '2025-02-28', 'status' => 'Hoạt động'],
        ['id' => 12, 'name' => 'Giảm 20%', 'value' => 20, 'min_value' => 200, 'max_value' => 1000, 'condition' => 'Mua hàng từ 200k', 'start_date' => '2025-03-01', 'end_date' => '2025-03-31', 'status' => 'Ngừng hoạt động'],
        // Thêm dữ liệu cứng khác nếu cần
    ];

    // Lấy số trang từ query string, mặc định là 1
    $currentPage = $request->get('page', 1);
    $perPage = 8; // Số lượng mã giảm giá mỗi trang

    // Tạo một paginator
    $currentItems = array_slice($coupons, ($currentPage - 1) * $perPage, $perPage);
    $couponsPaginator = new LengthAwarePaginator($currentItems, count($coupons), $perPage, $currentPage, [
        'path' => $request->url(),
        'query' => $request->query()
    ]);

    return view('admins.coupons.index', compact('couponsPaginator'));
}

public function create()
{
    return view('admins.coupons.create');
}

public function edit($id)
{
    return view('admins.coupons.edit', compact('id'));
}

public function show($id)
{
    return view('admins.coupons.show', compact('id'));
}
}