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
        Schema::create('vnpay_settings', function (Blueprint $table) {
            $table->id();
            $table->string('vnp_tmn_code');
            $table->string('vnp_hash_secret');
            $table->string('vnp_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vnpay_settings');
    }
};
