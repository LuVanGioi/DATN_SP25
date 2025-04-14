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
        Schema::create('lich_su_giao_dich_vi', function (Blueprint $table) {
            $table->id();
            $table->string('ID_User');
            $table->string(column: 'MaGiaoDich');
            $table->string('TieuDe');
            $table->string('SoTien');
            $table->string('TheLoai');
            $table->string('TrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_su_giao_dich_vi');
    }
};
