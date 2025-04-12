<?php

namespace App\Http\Controllers\admins;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('don_hang')
            ->selectRaw('MONTH(created_at) as month, SUM(TongTien) as revenue')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $choNhan = "";
        $months = $data->pluck('month')->map(fn($month) => "Tháng $month")->toArray();
        $revenues = $data->pluck('revenue')->toArray();

        return view("admins.home", compact("months", "choNhan", "revenues"));
    }
}
