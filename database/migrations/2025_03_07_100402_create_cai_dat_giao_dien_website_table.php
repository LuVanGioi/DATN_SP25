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
        Schema::create('cai_dat_giao_dien_website', function (Blueprint $table) {
            $table->id();
            $table->string("Loai");
            $table->text("GiaTri")->nullable();
            $table->string("TrangThai")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cai_dat_giao_dien_website');
    }
};
