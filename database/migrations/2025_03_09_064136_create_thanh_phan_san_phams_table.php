<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('thanh_phan_san_phams', function (Blueprint $table) {
            $table->unsignedBigInteger('ma_san_pham');
            $table->unsignedBigInteger('ma_nguyen_lieu');
            $table->float('khoi_luong'); // Khối lượng nguyên liệu trong sản phẩm
            $table->string('don_vi', 10); // Đơn vị tính (g, ml, kg, l,...)
            $table->timestamps();

            // Định nghĩa khóa chính tổng hợp
            $table->primary(['ma_san_pham', 'ma_nguyen_lieu']);

            // Khóa ngoại
            $table->foreign('ma_san_pham')->references('ma_san_pham')->on('san_phams')->onDelete('cascade');
            $table->foreign('ma_nguyen_lieu')->references('ma_nguyen_lieu')->on('nguyen_lieus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('thanh_phan_san_pham');
    }
};

