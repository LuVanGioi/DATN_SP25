<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dia_chi_nhan_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_User');
            $table->string('HoTen');
            $table->string('SoDienThoai');
            $table->string('DiaChi');
            $table->string('Xa');
            $table->string('Huyen');
            $table->string('Tinh');
            $table->boolean('MacDinh');
            $table->timestamps();

            $table->foreign('ID_User')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_chi_nhan_hangs');
    }
};
