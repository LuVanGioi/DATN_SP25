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
        Schema::table('danh_sach_tao_qr', function (Blueprint $table) {
            $table->string('orderCode')->nullable()->after('id');
            $table->string('paymentLinkId')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('danh_sach_tao_qr', function (Blueprint $table) {
            $table->dropColumn('orderCode')->change();
            $table->dropColumn('paymentLinkId')->change();
        });
    }
};
