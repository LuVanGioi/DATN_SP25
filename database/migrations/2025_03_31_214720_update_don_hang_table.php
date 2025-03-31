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
        Schema::table('don_hang', function (Blueprint $table) {
            $table->enum('TrangThai', [
                'choxacnhan', 'daxacnhan', 'danggiao', 
                'dagiao', 'huydon', 'thatbai', 'hoanhang', 
                'chuathanhtoan', 'dathanhtoan', 'huythanhtoan'
            ])->default('choxacnhan')->change();
            $table->string('orderCode')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('don_hang', function (Blueprint $table) {
            $table->enum('TrangThai', [
                'choxacnhan', 'daxacnhan', 'danggiao', 
                'dagiao', 'huydon', 'thatbai', 'hoanhang'
            ])->default('choxacnhan')->change();

            $table->dropColumn('orderCode');
        });
    }
};
