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
            $table->string('name'); 
            $table->integer('value'); 
            $table->integer('min_value'); 
            $table->integer('max_value'); 
            $table->string('condition'); 
            $table->date('start_date'); 
            $table->date('end_date'); 
            $table->string('status'); 
            $table->integer('quantity')->default(0); 
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maGiamGia');
    }
}