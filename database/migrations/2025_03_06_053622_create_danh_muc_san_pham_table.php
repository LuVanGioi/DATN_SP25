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
        Schema::create('danh_muc_san_pham', function (Blueprint $table) {
            $table->id();
            $table->string("TenDanhMucSanPham");
            $table->boolean("Xoa")->default(0); // Chỉnh sửa loại dữ liệu thành boolean
            $table->softDeletes(); // Thêm support cho soft deletes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_muc_san_pham');
    }
};