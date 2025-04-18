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
        Schema::table('lich_su_giao_dich_vi', function (Blueprint $table) {
            $table->string('banking')->nullable()->after('TrangThai');
            $table->string('numberBank')->nullable()->after('TrangThai');
            $table->string('namebank')->nullable()->after('TrangThai');
            $table->text('LiDoThatBai')->nullable()->after('banking');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lich_su_giao_dich_vi', function (Blueprint $table) {
            $table->dropColumn('banking')->change();
            $table->dropColumn('numberBank')->change();
            $table->dropColumn('namebank')->change();
            $table->dropColumn('LiDoThatBai')->change();
        });
    }
};
