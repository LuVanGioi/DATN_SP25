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
        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_User')->constrained('users')->onDelete('cascade');
            $table->string('HoTen');
            $table->string('SoDienThoai', 15);
            $table->text('DiaChi');
            $table->string('Xa');
            $table->string('Huyen');
            $table->string('Tinh');
            $table->boolean('MacDinh')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location');
    }
};
