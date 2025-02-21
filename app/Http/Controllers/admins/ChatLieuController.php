<?php

namespace App\Http\Controllers\admins;

use Laravel\Prompts\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\ChatLieuRequest;

class ChatLieuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhSach = DB::table("chat_lieu")->where("Xoa", 0)->orderByDesc("id")->get();
        return view("admins.ChatLieu.DanhSach", compact("danhSach"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admins.ChatLieu.TaoChatLieu");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChatLieuRequest $request)
    {
        DB::beginTransaction();
        
        DB::table("chat_lieu")->insert([
            "TenChatLieu" => $request->input("TenChatLieu"),
            "created_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("ChatLieu.index")->with("success", "Thêm Thành Công");
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
        $thongTin = DB::table("chat_lieu")->find($id);

        if(!$thongTin) {
            return redirect()->route("ChatLieu.index")->with("error", "Chất Liệu Không Tồn Tại");
        }

        return view("admins.ChatLieu.SuaChatLieu", compact("thongTin"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChatLieuRequest $request, string $id)
    {
        $thongTin = DB::table("chat_lieu")->find($id);

        if(!$thongTin) {
            return redirect()->route("ChatLieu.index")->with("error", "Chất Liệu Không Tồn Tại");
        }
        
        DB::table(table: "chat_lieu")->where("id", $id)->update([
            "TenChatLieu" => $request->input("TenChatLieu"),
            "updated_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("ChatLieu.index")->with("success", "Cập Nhật Chất Liệu Thành Công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thongTin = DB::table("chat_lieu")->find($id);

        if(!$thongTin) {
            return redirect()->route("ChatLieu.index")->with("error", "Chất Liệu Không Tồn Tại");
        }

        DB::table("chat_lieu")->where("id", $id)->update([
            "Xoa" => 1,
            "deleted_at" => date("Y-m-d H:i:s")
        ]);

        DB::commit();

        return redirect()->route("ChatLieu.index")->with("success", "Xóa Chất Liệu Thành Công");
    }
}
