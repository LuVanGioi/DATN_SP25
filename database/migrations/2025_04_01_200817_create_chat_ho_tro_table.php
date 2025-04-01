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
        Schema::create('chat_ho_tro', function (Blueprint $table) {
            $table->id();
            $table->string('ID_Guests');
            $table->string('MaHoTro');
            $table->text('NoiDung')->nullable();
            $table->text('HinhAnh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_ho_tro');
    }
};
