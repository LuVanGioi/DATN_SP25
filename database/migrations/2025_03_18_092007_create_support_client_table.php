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
        Schema::create('support_client', function (Blueprint $table) {
            $table->id();
            $table->string("Email")->unique();
            $table->string("HoTen")->nullable();
            $table->string("TieuDe")->nullable();
            $table->string("NoiDung")->nullable();
            $table->string("TrangThai")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_client');
    }
};
