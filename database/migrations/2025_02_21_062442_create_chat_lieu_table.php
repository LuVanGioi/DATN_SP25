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
        Schema::create('chat_lieu', function (Blueprint $table) {
            $table->id();
            $table->string("TenChatLieu", "255");
            $table->string("Xoa")->default(false);
            $table->string("deleted_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_lieu');
    }
};
