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
        if (!Schema::hasColumn('don_hang', 'orderCode')) { // Kiểm tra nếu cột chưa tồn tại
            Schema::table('don_hang', function (Blueprint $table) {
                $table->text('orderCode')->nullable()->after('id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('don_hang', 'orderCode')) { // Kiểm tra nếu cột tồn tại
            Schema::table('don_hang', function (Blueprint $table) {
                $table->dropColumn('orderCode');
            });
        }
    }
};