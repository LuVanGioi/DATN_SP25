<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\MaGiamGia; // Import model MaGiamGia
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        // Lấy dữ liệu từ cơ sở dữ liệu
        $coupons = MaGiamGia::all()->toArray(); // Chuyển đổi thành mảng

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

    public function store(Request $request)
    {
        // Xử lý lưu mã giảm giá
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|integer',
            'min_value' => 'required|integer',
            'max_value' => 'required|integer',
            'condition' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        MaGiamGia::create($validatedData);

        return redirect()->route('coupons.index')->with('success', 'Mã giảm giá đã được thêm.');
    }

    public function edit($id)
{
    // Log::info("Editing coupon with ID: {$id}");
    $coupon = MaGiamGia::findOrFail($id); // Sử dụng findOrFail để lấy mã giảm giá
    return view('admins.coupons.edit', compact('coupon'));
}

    public function update(Request $request, $id)
    {
        // Xử lý cập nhật mã giảm giá
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|integer',
            'min_value' => 'required|integer',
            'max_value' => 'required|integer',
            'condition' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        $coupon = MaGiamGia::findOrFail($id);
        $coupon->update($validatedData);

        return redirect()->route('coupons.index')->with('success', 'Mã giảm giá đã được cập nhật.');
    }

    public function destroy($id)
    {
        $coupon = MaGiamGia::findOrFail($id);
        $coupon->delete();

        return redirect()->route('coupons.index')->with('success', 'Mã giảm giá đã được xóa.');
    }

    public function show($id)
    {
        $coupon = MaGiamGia::findOrFail($id);
        return view('admins.coupons.show', compact('coupon'));
    }
}