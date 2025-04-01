<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhLuanBaiVietTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('binh_luan_bai_viet', function (Blueprint $table) {
            $table->id(); // Tự động tạo khóa chính
            $table->unsignedBigInteger('id_baiviet'); // ID bài viết
            $table->unsignedBigInteger('id_users'); // ID người dùng
            $table->text('noi_dung'); // Nội dung bình luận
            $table->timestamp('ngay_binh_luan')->nullable(); // Ngày bình luận
            $table->boolean('duyet')->default(0); // Trạng thái duyệt (0: chưa duyệt, 1: đã duyệt)
            $table->timestamps(); // Tự động tạo created_at và updated_at

            // Khóa ngoại
            $table->foreign('id_baiviet')->references('id')->on('bai_viet')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luan_bai_viet');
    }
}