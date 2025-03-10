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
        Schema::create('noi_dung_gui_mail', function (Blueprint $table) {
            $table->id();
            $table->string("Loai");
            $table->string("TieuDe")->nullable();
            $table->text("NoiDung")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noi_dung_gui_mail');
    }
};
