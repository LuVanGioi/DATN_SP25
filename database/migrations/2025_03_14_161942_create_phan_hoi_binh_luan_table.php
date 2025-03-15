<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhanHoiBinhLuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phan_hoi_binh_luan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_binh_luan');
            $table->unsignedBigInteger('id_users');
            $table->text('noi_dung');
            $table->timestamp('ngay_phan_hoi')->useCurrent();
            $table->tinyInteger('duyet')->default(0);
            $table->foreign('id_binh_luan')->references('id')->on('binh_luan_bai_viet')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phan_hoi_binh_luan');
    }
}