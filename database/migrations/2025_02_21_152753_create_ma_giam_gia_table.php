<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaGiamGiaTable extends Migration
{
    public function up()
    {
        Schema::create('maGiamGia', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên mã
            $table->integer('value'); // Giá trị
            $table->integer('min_value'); // Giá trị tối thiểu
            $table->integer('max_value'); // Giá trị tối đa
            $table->string('condition'); // Điều kiện
            $table->date('start_date'); // Ngày bắt đầu
            $table->date('end_date'); // Ngày kết thúc
            $table->string('status'); // Trạng thái
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maGiamGia');
    }
}