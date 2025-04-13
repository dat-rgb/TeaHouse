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
            $table->unsignedBigInteger('ma_size'); 
            $table->float('dinh_luong'); // Định lượng nguyên liệu trong sản phẩm (g/ml)
            $table->string('don_vi', 10)->nullable();
            $table->timestamps();

            // Định nghĩa khóa chính tổng hợp
            $table->primary(['ma_san_pham', 'ma_nguyen_lieu', 'ma_size']);

            // Khóa ngoại
            $table->foreign('ma_san_pham')->references('ma_san_pham')->on('san_phams')->onDelete('cascade');
            $table->foreign('ma_nguyen_lieu')->references('ma_nguyen_lieu')->on('nguyen_lieus')->onDelete('cascade');
            $table->foreign('ma_size')->references('ma_size')->on('sizes')->onDelete('cascade'); // Thêm khóa ngoại cho bảng size
        });
    }

    public function down()
    {
        Schema::dropIfExists('thanh_phan_san_pham');
    }
};

