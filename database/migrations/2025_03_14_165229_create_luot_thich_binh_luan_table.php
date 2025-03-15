<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuotThichBinhLuanTable extends Migration
{
    public function up()
    {
        Schema::create('luot_thich_binh_luan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_binh_luan');
            $table->unsignedBigInteger('id_users');
            $table->timestamp('ngay_thich')->useCurrent();

            $table->foreign('id_binh_luan')->references('id')->on('binh_luan_bai_viet')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('luot_thich_binh_luan');
    }
}