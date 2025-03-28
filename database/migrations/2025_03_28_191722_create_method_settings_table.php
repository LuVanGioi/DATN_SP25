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
        Schema::create('method_settings', function (Blueprint $table) {
            $table->id();
            $table->string('NhaCungCap')->unique();
            $table->string('partner_code');
            $table->string('access_key');
            $table->string('secret_key');
            $table->string('api_endpoint');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('method_settings');
    }
};
