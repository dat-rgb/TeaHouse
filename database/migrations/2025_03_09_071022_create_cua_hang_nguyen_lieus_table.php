<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cua_hang_nguyen_lieus', function (Blueprint $table) {
            $table->unsignedBigInteger('ma_cua_hang');
            $table->unsignedBigInteger('ma_nguyen_lieu');
            $table->float('dinh_luong_ton')->default('0'); //Định lượng tồn (g/ml)
            $table->float('so_luong_ton')->default(0); // Số lượng còn lại
            $table->float('dinh_luong_ton_min')->default(0); // Định lượng tối thiểu trong kho
            $table->float('dinh_luong_ton_max')->nullable(); // Định lượng tối đa trong kho
            $table->float('so_luong_ton_min')->default(0); // Số lượng tối thiểu trong kho
            $table->float('so_luong_ton_max')->nullable(); // Số lượng tối đa trong kho
            $table->string('don_vi', 50);
            $table->integer('trang_thai')->default(1);
            $table->timestamps();
            // Định nghĩa khóas chính tổng hợp
            $table->primary(['ma_cua_hang', 'ma_nguyen_lieu']);
            // Khóa ngoại
            $table->foreign('ma_cua_hang')->references('ma_cua_hang')->on('cua_hangs')->onDelete('cascade');
            $table->foreign('ma_nguyen_lieu')->references('ma_nguyen_lieu')->on('nguyen_lieus')->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('cua_hang_nguyen_lieus');
    }
};

