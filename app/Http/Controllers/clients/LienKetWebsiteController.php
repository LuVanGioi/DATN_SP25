<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LienKetWebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($code)
    {
        $lienKetWebsiteClientView = DB::table("lien_ket_ket_website")->where("Xoa", 0)->where("DuongDan", $code)->first();
        
        if (!$lienKetWebsiteClientView) {
            abort(404, "Không tìm thấy liên kết!");
        }

        return view("clients.LienKet.lienKet", compact("lienKetWebsiteClientView"));
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
        //
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
        //
    }
}
