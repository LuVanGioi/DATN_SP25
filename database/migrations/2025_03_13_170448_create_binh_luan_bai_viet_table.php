<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('binh_luan_bai_viet', function (Blueprint $table) {
            $table->unsignedInteger('so_luot_thich')->default(0)->after('duyet'); // Thêm cột 'so_luot_thich'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('binh_luan_bai_viet', function (Blueprint $table) {
            $table->dropColumn('so_luot_thich'); // Xóa cột 'so_luot_thich' nếu rollback
        });
    }
};