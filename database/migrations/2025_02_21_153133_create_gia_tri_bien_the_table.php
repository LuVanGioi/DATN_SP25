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
        Schema::create('gia_tri_bien_the', function (Blueprint $table) {
            $table->id();
            $table->string("ID_BienThe");
            $table->string("TenGiaTri", "225");
            $table->string("Xoa")->default(0);
            $table->string("deleted_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gia_tri_bien_the');
    }
};
