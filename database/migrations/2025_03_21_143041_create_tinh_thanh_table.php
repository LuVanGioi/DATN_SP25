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
        Schema::create('tinh_thanh', function (Blueprint $table) {
            $table->id();
            $table->string("TenThanhPho")->nullable();
            $table->string("MaTinh")->nullable();
            $table->string("IdTinh")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tinh_thanh');
    }
};
