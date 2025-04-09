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
        Schema::table('san_pham', function (Blueprint $table) {
            $table->string('SoLuong')->nullable()->after('GiaKhuyenMai');
            $table->string('GiaSanPham')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('san_pham', function (Blueprint $table) {
            $table->dropColumn('SoLuong')->change();
            $table->string('GiaSanPham')->nullable(value: false)->change();
            $table->dropColumn('LyDoHuy');
        });
    }
};
