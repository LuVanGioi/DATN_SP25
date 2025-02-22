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
<<<<<<< HEAD
            $table->string('name'); 
            $table->integer('value'); 
            $table->integer('min_value'); 
            $table->integer('max_value'); 
            $table->string('condition'); 
            $table->date('start_date'); 
            $table->date('end_date'); 
            $table->string('status'); 
            $table->integer('quantity')->default(0)->after('name');
=======
            $table->string('name'); // Tên mã
            $table->integer('value'); // Giá trị
            $table->integer('min_value'); // Giá trị tối thiểu
            $table->integer('max_value'); // Giá trị tối đa
            $table->string('condition'); // Điều kiện
            $table->date('start_date'); // Ngày bắt đầu
            $table->date('end_date'); // Ngày kết thúc
            $table->string('status'); // Trạng thái
            $table->string('Xoa')->default(0);
            $table->string('deleted_at')->nullable();
>>>>>>> ced845091a229786836a2b68dc19c9b2803e6504
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maGiamGia');
    }
}