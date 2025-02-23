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
        Schema::create('bai_viet', function (Blueprint $table) {
            $table->id();
            $table->string('hinh_anh')->nullable();
            $table->string('tieu_de');
            $table->foreignId('danh_muc_id')->constrained('danh_muc_bai_viet');
            $table->string('tac_gia');
            $table->text('noi_dung');
            $table->timestamp('ngay_dang')->useCurrent();
            $table->string('Xoa')->default(0);
            $table->string('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bai_viet');

        Schema::table('bai_viet', function (Blueprint $table) {
            $table->dropColumn('hinh_anh');
            $table->dropColumn('tieu_de');
            $table->dropForeign(['danh_muc_id']);
            $table->dropColumn('danh_muc_id');
            $table->dropColumn('tac_gia');
            $table->dropColumn('noi_dung');
            $table->dropColumn('ngay_dang');
        });
    }
};
