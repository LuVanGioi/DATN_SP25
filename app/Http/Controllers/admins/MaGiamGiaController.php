<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\MaGiamGiaRequest;
use App\Models\MaGiamGia;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class MaGiamGiaController extends Controller
{
    public function index(Request $request)
    {
        $maGiamGias = MaGiamGia::all();
        return view('admins.maGiamGias.index', compact('maGiamGias'));
    }

    public function create()
    {
        return view('admins.maGiamGias.create');
    }

    public function store(MaGiamGiaRequest $request)
    {
        $validatedData = $request->validated();
        MaGiamGia::create($validatedData);
        return redirect()->route('maGiamGias.index')->with('success', 'Mã giảm giá đã được thêm.');
    }

    public function edit($id)
    {
        $maGiamGia = MaGiamGia::findOrFail($id);
        return view('admins.maGiamGias.edit', compact('maGiamGia'));
    }

    public function update(MaGiamGiaRequest $request, $id)
    {
        $maGiamGia = MaGiamGia::findOrFail($id);
        $maGiamGia->update($request->validated());
        return redirect()->route('maGiamGias.index')->with('success', 'Mã giảm giá đã được cập nhật.');
    }

    public function destroy($id)
    {
        $maGiamGia = MaGiamGia::findOrFail($id);
        $maGiamGia->delete();
        return redirect()->route('maGiamGias.index')->with('success', 'Mã giảm giá đã được xóa.');
    }

    public function show($id)
    {
        $maGiamGia = MaGiamGia::findOrFail($id);
        return view('admins.maGiamGias.show', compact('maGiamGia'));
    }
}
