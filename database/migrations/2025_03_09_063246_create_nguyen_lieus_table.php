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
        Schema::create('nguyen_lieus', function (Blueprint $table) {
            $table->id('ma_nguyen_lieu');
            $table->string('ten_nguyen_lieu', 255);
            $table->unsignedBigInteger('ma_nha_cung_cap');
            $table->integer('loai_nguyen_lieu')->default(0); // 0: chế biến, 1: tiêu dùng
            $table->string('don_vi', 10);
            $table->boolean('trang_thai')->default(1);
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('ma_nha_cung_cap')->references('ma_nha_cung_cap')->on('nha_cung_caps')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguyen_lieus');
    }
};
