<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('danh_gia', function (Blueprint $table) {
            $table->integer('rating')->default(0)->after('noi_dung'); // Thêm cột rating
        });
    }

    public function down(): void
    {
        Schema::table('danh_gia', function (Blueprint $table) {
            $table->dropColumn('rating'); // Xóa cột rating nếu rollback
        });
    }
};