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
        Schema::create('smtp_mail', function (Blueprint $table) {
            $table->id();
            $table->boolean("smtp_status")->default(0);
            $table->string("smtp_host", 255)->nullable();
            $table->string("smtp_encryption", 10)->nullable();
            $table->unsignedSmallInteger("smtp_port")->nullable();
            $table->string("smtp_email", 255)->nullable();
            $table->string("smtp_password")->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smtp_mail');
    }
};
