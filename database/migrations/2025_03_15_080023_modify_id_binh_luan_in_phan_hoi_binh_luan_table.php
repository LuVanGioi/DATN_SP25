<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyIdBinhLuanInPhanHoiBinhLuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phan_hoi_binh_luan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_binh_luan')->nullable()->change(); // Thay đổi thành nullable
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phan_hoi_binh_luan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_binh_luan')->nullable(false)->change(); // Khôi phục lại không nullable
        });
    }
}