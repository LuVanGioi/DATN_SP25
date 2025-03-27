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
        Schema::create('don_hang', function (Blueprint $table) {
            $table->id();
            $table->string('MaDonHang')->unique();
            $table->string('ID_User');
            $table->enum('TrangThai', ['choxacnhan', 'daxacnhan', 'danggiao', 'dagiao', 'huydon', 'thatbai', 'hoanhang'])->default('choxacnhan');
            $table->string('PhuongThucThanhToan');
            $table->text('DiaChiNhan');
            $table->string('TongTien');
            $table->string('GiamGia');
            $table->string('MaGiamGia')->nullable();
            $table->text('GhiChu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hang');
    }
};
