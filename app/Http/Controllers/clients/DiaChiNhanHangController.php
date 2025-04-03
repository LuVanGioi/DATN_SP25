<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaChiNhanHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $diaChiNhanHangs = Location::where('ID_User', $user->id)
            ->orderBy('MacDinh', 'desc')
            ->get();
        return view('clients.ThongTinTaiKhoan.DiaChiNhanHang', compact('diaChiNhanHangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'HoTen' => 'required|string|max:255',
            'SoDienThoai' => 'required|string|max:15',
            'DiaChi' => 'required|string|max:255',
            'Xa' => 'required|string|max:255',
            'Huyen' => 'required|string|max:255',
            'Tinh' => 'required|string|max:255',
            'MacDinh' => 'required|boolean',
        ]);

        if ($request->MacDinh) {
            Location::where('ID_User', Auth::id())->update(['MacDinh' => false]);
        }

        Location::create([
            'ID_User' => Auth::id(),
            'HoTen' => $request->HoTen,
            'SoDienThoai' => $request->SoDienThoai,
            'DiaChi' => $request->DiaChi,
            'Xa' => $request->Xa,
            'Huyen' => $request->Huyen,
            'Tinh' => $request->Tinh,
            'MacDinh' => $request->MacDinh,
        ]);

        return redirect()->route('dia-chi-nhan-hang.index')
            ->with('success', 'Thêm địa chỉ mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diaChiNhanHangs = Location::where('ID_User', Auth::id())
            ->findOrFail($id);
        if ($diaChiNhanHangs->MacDinh) {
            $otherAddress = Location::where('ID_User', Auth::id())
                ->where('id', '!=', $id)
                ->first();

            if ($otherAddress) {
                $otherAddress->update(['MacDinh' => true]);
            }
        }

        $diaChiNhanHangs->delete();

        return redirect()->route('dia-chi-nhan-hang.index')
            ->with('success', 'Xóa địa chỉ thành công');
    }

    public function setDefault($id)
    {
        $user = Auth::user();

        Location::where('ID_User', $user->id)->update(['MacDinh' => false]);

        $address = Location::where('ID_User', $user->id)->findOrFail($id);
        $address->update(['MacDinh' => true]);

        return redirect()->route('dia-chi-nhan-hang.index')->with('success', 'Địa chỉ mặc định đã được cập nhật.');
    }
}
