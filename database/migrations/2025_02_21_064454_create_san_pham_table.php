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
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('HinhAnh', 255)->nullable();
            $table->string("TenSanPham");
            $table->string("ID_DanhMuc")->unique();
            $table->string("ID_ChatLieu")->unique();
            $table->string("ID_ThuongHieu")->unique();
            $table->text("Mota")->nullable();
            $table->enum("TrangThai", ["an", "hien"])->default("hien");
            $table->string("Xoa")->default(0);
            $table->string("deleted_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham');
    }
};
