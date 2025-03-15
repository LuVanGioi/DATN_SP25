<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToIdBinhLuanInPhanHoiBinhLuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phan_hoi_binh_luan', function (Blueprint $table) {
            $table->foreign('id_binh_luan')->references('id')->on('phan_hoi_binh_luan')->onDelete('cascade');
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
            $table->dropForeign(['id_binh_luan']);
        });
    }
}