<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('san_pham_sizes', function (Blueprint $table) {
            $table->unsignedBigInteger('ma_san_pham');
            $table->unsignedBigInteger('ma_size');
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('ma_san_pham')->references('ma_san_pham')->on('san_phams')->onDelete('cascade');
            $table->foreign('ma_size')->references('ma_size')->on('sizes')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham_sizes');
    }
};
