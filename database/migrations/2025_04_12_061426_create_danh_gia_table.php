<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('danh_gia', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->unsignedBigInteger('id_san_pham'); // ID sản phẩm
            $table->unsignedBigInteger('id_users'); // ID người dùng
            $table->text('noi_dung'); // Nội dung đánh giá
            $table->timestamp('ngay_danh_gia')->nullable(); // Ngày đánh giá
            $table->timestamps(); // Tự động tạo created_at và updated_at

            // Khóa ngoại
            $table->foreign('id_san_pham')->references('id')->on('san_pham')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gia');
    }
};