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
        Schema::create('toppings', function (Blueprint $table) {
            $table->id('ma_topping');
            $table->string('ten_topping', 100)->unique();
            $table->float('gia_topping')->default(0);
            $table->string('anh_dai_dien',255)->nullable();
            $table->integer('trang_thai')->default(1);
            $table->text('mo_ta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toppings');
    }
};
