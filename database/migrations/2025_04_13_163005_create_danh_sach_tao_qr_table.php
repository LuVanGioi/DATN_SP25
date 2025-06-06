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
        Schema::create('danh_sach_tao_qr', function (Blueprint $table) {
            $table->id();
            $table->string('ID_User');
            $table->string('SoTienNap');
            $table->string('ThoiGianNap');
            $table->string('TrangThai');
            $table->string('ThoiGianKetThuc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_sach_tao_qr');
    }
};
