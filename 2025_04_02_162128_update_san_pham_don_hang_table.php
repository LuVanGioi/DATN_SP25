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
        Schema::table('san_pham_don_hang', function (Blueprint $table) {
            $table->string('KichCo')->nullable()->change();
            $table->string('MauSac')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('san_pham_don_hang', function (Blueprint $table) {
            $table->string('KichCo')->nullable(false)->change();
            $table->string('MauSac')->nullable(false)->change();
        });
    }
};
