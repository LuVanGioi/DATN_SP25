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
        Schema::create('san_pham_don_hang', function (Blueprint $table) {
            $table->id();
            $table->string('MaDonHang');
            $table->string("Id_SanPham");
            $table->string("KichCo");
            $table->string("MauSac");
            $table->string("GiaTien");
            $table->string("SoLuong");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham_don_hang');
    }
};
