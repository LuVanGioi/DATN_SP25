<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;

class ChiTietHuyDonController extends Controller
{
    public function index(string $id) {

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thực hiện chức năng này');
        }
        
        $userId = Auth::user()->id;
        
        $donHang = DB::table('don_hang')
            ->where('MaDonHang', $id)
            ->where('ID_User', $userId)
            ->first();
            
        if (!$donHang) {
            return redirect()->route('DonHang.index')
                ->with('error', 'Không tìm thấy đơn hàng hoặc bạn không có quyền truy cập đơn hàng này');
        }
        
    
        if ($donHang->TrangThai !== 'choxacnhan') {
            return redirect()->route('DonHang.index')
                ->with('error', 'Đơn hàng này không thể hủy vì đã được xử lý hoặc đang trong quá trình vận chuyển');
        }
    
        $donHangHuy = DB::table('san_pham_don_hang')
            ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
            ->where('san_pham_don_hang.MaDonHang', $id)
            ->select('san_pham.*', 'san_pham_don_hang.*')
            ->get();
    
        return view("clients.HuyDonHang.HuyDon", compact('donHangHuy', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */ 
    public function edit(string $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thực hiện chức năng này');
        }
        
        $userId = Auth::user()->id;
        
        $donHang = DB::table('don_hang')
            ->where('MaDonHang', $id)
            ->where('ID_User', $userId)
            ->first();
            
        if (!$donHang) {
            return redirect()->route('DonHang.index')
                ->with('error', 'Không tìm thấy đơn hàng hoặc bạn không có quyền truy cập đơn hàng này');
        }
        
    
        if ($donHang->TrangThai !== 'choxacnhan') {
            return redirect()->route('DonHang.index')
                ->with('error', 'Đơn hàng này không thể hủy vì đã được xử lý hoặc đang trong quá trình vận chuyển');
        }
    
        $donHangHuy = DB::table('san_pham_don_hang')
            ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
            ->where('san_pham_don_hang.MaDonHang', $id)
            ->select('san_pham.*', 'san_pham_don_hang.*')
            ->get();
    
        return view("clients.HuyDonHang.HuyDon", compact('donHangHuy', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Vui lòng đăng nhập để thực hiện chức năng này');
        }
        
        $userId = Auth::user()->id;
        
            Log::info('Order cancellation request', [
                'user_id' => $userId,
                'order_id' => $id,
                'request_data' => $request->all()
            ]);
            
            $request->validate([
                'ly_do_huy' => 'required|string|min:10',
            ], [
                'ly_do_huy.required' => 'Vui lòng nhập lý do hủy đơn hàng',
                'ly_do_huy.min' => 'Lý do hủy đơn phải có ít nhất 10 ký tự'
            ]);

            $donHang = DB::table('don_hang')
                ->where('MaDonHang', $id)
                ->where('ID_User', $userId)
                ->first();
                
            if (!$donHang) {
                Log::warning('Order not found or unauthorized access', [
                    'user_id' => $userId,
                    'order_id' => $id
                ]);
                return redirect()->route('DonHang.index')
                    ->with('error', 'Không tìm thấy đơn hàng hoặc bạn không có quyền truy cập đơn hàng này');
            }
       
            if ($donHang->TrangThai !== 'choxacnhan') {
                Log::warning('Invalid order status for cancellation', [
                    'user_id' => $userId,
                    'order_id' => $id,
                    'status' => $donHang->TrangThai
                ]);
                return redirect()->route('DonHang.index')
                    ->with('error', 'Đơn hàng này không thể hủy vì đã được xử lý hoặc đang trong quá trình vận chuyển');
            }

            DB::beginTransaction();
            
         
            $updateOrder = DB::table('don_hang')
                ->where('MaDonHang', $id)
                ->update([
                    'TrangThai' => 'dahuy',
                    'LyDoHuy' => $request->ly_do_huy
                ]);

            if (!$updateOrder) {
                Log::error('Failed to update order status', [
                    'user_id' => $userId,
                    'order_id' => $id
                ]);
                throw new \Exception('Không thể cập nhật trạng thái đơn hàng');
            }

            
            $sanPhamDonHang = DB::table('san_pham_don_hang')
                ->where('MaDonHang', $id)
                ->get();

            foreach ($sanPhamDonHang as $item) {
                $updateProduct = DB::table('san_pham')
                    ->where('id', $item->Id_SanPham)
                    ->increment('SoLuong', $item->SoLuong);
                
                if (!$updateProduct) {
                    Log::error('Failed to update product quantity', [
                        'user_id' => $userId,
                        'order_id' => $id,
                        'product_id' => $item->Id_SanPham
                    ]);
                    throw new \Exception('Không thể cập nhật số lượng sản phẩm');
                }
            }

            DB::commit();
            Log::info('Order cancelled successfully', [
                'user_id' => $userId,
                'order_id' => $id
            ]);
            return redirect()->route('DonHang.index')
                ->with('success', 'Hủy đơn hàng thành công');
                
        
    }
}