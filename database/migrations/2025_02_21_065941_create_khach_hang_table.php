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
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->id();
            $table->string('HoTen'); 
            $table->string('HinhAnh')->nullable();
            $table->string('Email')->unique();
            $table->string('SoDienThoai',10)->nullable()->unique(); 
            $table->string('MatKhau'); 
            $table->date('NgaySinh')->nullable();
            $table->enum('GioiTinh', ['nam', 'nu', 'khac'])->nullable();
            $table->enum('VaiTro', ['admin','khach'])->default('khach');
            $table->enum('TrangThai', ['0', '1'])->default('0'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_hang');
    }
};
