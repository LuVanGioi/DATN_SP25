<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->string("DuongDan")->unique();
            $table->string('HinhAnh')->nullable();
            $table->string("TenSanPham", 255)->unique();
            $table->string("ID_DanhMuc");
            $table->string("ID_ThuongHieu");
            $table->string("ChatLieu");
            $table->integer("GiaSanPham");
            $table->integer("GiaKhuyenMai")->nullable();
            $table->string("Nhan")->nullable();
            $table->text("Mota")->nullable();
            $table->enum("TrangThai", ["an", "hien"])->default("hien");
            $table->enum("TheLoai", ["thuong", "bienThe"])->default("thuong");
            $table->string("Xoa")->default(0);
            $table->string("deleted_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham');
    }
};
