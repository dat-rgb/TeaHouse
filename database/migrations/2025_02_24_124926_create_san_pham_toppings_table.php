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
        Schema::create('san_pham_toppings', function (Blueprint $table) {
            $table->unsignedBigInteger('ma_san_pham');
            $table->unsignedBigInteger('ma_topping');
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('ma_san_pham')->references('ma_san_pham')->on('san_phams')->onDelete('cascade');
            $table->foreign('ma_topping')->references('ma_topping')->on('toppings')->onDelete('cascade');

            // Đảm bảo không bị trùng
            $table->primary(['ma_san_pham', 'ma_topping']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham_toppings');
    }
};
