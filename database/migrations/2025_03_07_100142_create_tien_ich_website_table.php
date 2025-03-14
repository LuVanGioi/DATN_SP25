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
        Schema::create('tien_ich_website', function (Blueprint $table) {
            $table->id();
            $table->string("Loai");
            $table->string("TrangThai")->nullable();
            $table->string("SoDienThoai")->nullable();
            $table->string("DuongDan")->nullable();
            $table->string("MaJava")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tien_ich_website');
    }
};
