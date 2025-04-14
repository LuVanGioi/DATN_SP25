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
        Schema::table('users', function (Blueprint $table) {
            $table->string('banking')->nullable()->after('birthday');
            $table->string('numberBank')->nullable()->after('birthday');
            $table->string('nameBank')->nullable()->after('birthday');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('banking')->change();
            $table->dropColumn('numberBank')->change();
            $table->dropColumn('nameBank')->change();
        });
    }
};
