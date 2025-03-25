<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::where('ID_User', Auth::id())->get();
        return view('clients.ThanhToan.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.ThanhToan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'HoTen' => 'required|string|max:255',
            'SoDienThoai' => 'required|string|max:15',
            'DiaChi' => 'required|string',
            'Xa' => 'required|string|max:255',
            'Huyen' => 'required|string|max:255',
            'Tinh' => 'required|string|max:255',
            'MacDinh' => 'nullable|boolean',
        ]);

        if ($request->has('MacDinh') && $request->MacDinh) {
            Location::where('ID_User', Auth::id())->update(['MacDinh' => 0]);
        }
        ;

        $location = new Location();
        $location->ID_User = Auth::id();
        $location->HoTen = $validated['HoTen'];
        $location->SoDienThoai = $validated['SoDienThoai'];
        $location->DiaChi = $validated['DiaChi'];
        $location->Xa = $validated['Xa'];
        $location->Huyen = $validated['Huyen'];
        $location->Tinh = $validated['Tinh'];
        $location->MacDinh = $request->has('MacDinh') ? 1 : 0;
        $location->save();

        return redirect()->route('locations.index')->with('success', 'Địa chỉ giao hàng đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $location = Location::where('ID_User', Auth::id())->findOrFail($id);
        return view('clients.ThanhToan.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $location = Location::where('ID_User', Auth::id())->findOrFail($id);
        return view('clients.ThanhToan.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'HoTen' => 'required|string|max:255',
            'SoDienThoai' => 'required|string|max:15',
            'DiaChi' => 'required|string',
            'Xa' => 'required|string|max:255',
            'Huyen' => 'required|string|max:255',
            'Tinh' => 'required|string|max:255',
            'MacDinh' => 'nullable|boolean',
        ]);

        $location = Location::where('ID_User', Auth::id())->findOrFail($id);

        if ($request->has('MacDinh') && $request->MacDinh) {
            Location::where('ID_User', Auth::id())->update(['MacDinh' => 0]);
        }
        ;

        $location->HoTen = $validated['HoTen'];
        $location->SoDienThoai = $validated['SoDienThoai'];
        $location->DiaChi = $validated['DiaChi'];
        $location->Xa = $validated['Xa'];
        $location->Huyen = $validated['Huyen'];
        $location->Tinh = $validated['Tinh'];
        $location->MacDinh = $request->has('MacDinh') ? 1 : 0;
        $location->save();

        return redirect()->route('locations.index')->with('success', 'Địa chỉ giao hàng đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::where('ID_User', Auth::id())->findOrFail($id);
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Địa chỉ giao hàng đã được xóa thành công!');
    }
}
