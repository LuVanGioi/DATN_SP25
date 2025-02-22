<?php

namespace App\Http\Controllers\admins;
use App\Http\Controllers\Controller;
use App\Models\MaGiamGia; 
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class MaGiamGiaController extends Controller
{
    public function index(Request $request)
    {
        $maGiamGias = MaGiamGia::all()->toArray(); 
        $currentPage = $request->get('page', 1);
        $perPage = 8; 
        $currentItems = array_slice($maGiamGias, ($currentPage - 1) * $perPage, $perPage);
        $maGiamGiasPaginator = new LengthAwarePaginator($currentItems, count($maGiamGias), $perPage, $currentPage, [
            'path' => $request->url(),
            'query' => $request->query()
        ]);

        return view('admins.maGiamGias.index', compact('maGiamGiasPaginator'));
    }

    public function create()
    {
        return view('admins.maGiamGias.create');
    }

    public function store(Request $request)
    {
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

        return redirect()->route('maGiamGias.index')->with('success', 'Mã giảm giá đã được thêm.');
    }

    public function edit($id)
    {
        $maGiamGia = MaGiamGia::findOrFail($id); 
        return view('admins.maGiamGias.edit', compact('maGiamGia'));
    }

    public function update(Request $request, $id)
    {
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

        $maGiamGia = MaGiamGia::findOrFail($id);
        $maGiamGia->update($validatedData);

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