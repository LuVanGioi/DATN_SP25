<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhanHoiBinhLuanTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phan_hoi_binh_luan', function (Blueprint $table) {
            $table->id(); // Tự động tạo khóa chính
            $table->unsignedBigInteger('id_binh_luan'); // ID của bình luận được phản hồi
            $table->unsignedBigInteger('id_users'); // ID người dùng phản hồi
            $table->text('noi_dung'); // Nội dung phản hồi
            $table->boolean('duyet')->default(0); // Trạng thái duyệt (0: chưa duyệt, 1: đã duyệt)
            $table->timestamp('ngay_phan_hoi')->nullable(); // Ngày phản hồi
            $table->timestamps(); // Tự động tạo created_at và updated_at

            // Khóa ngoại
            $table->foreign('id_binh_luan')->references('id')->on('binh_luan_bai_viet')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phan_hoi_binh_luan');
    }
}