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
            $table->float('so_luong_nhap')->default(0); // Tổng số nhập
            $table->float('so_luong_xuat')->default(0); // Tổng số xuất
            $table->float('so_luong_ton')->default(0); // Số lượng còn lại
            $table->string('don_vi', 10);
            $table->integer('trang_thai')->default(1);
            $table->timestamp('ngay_nhap_cuoi')->nullable(); // Ngày nhập gần nhất
            $table->timestamp('ngay_xuat_cuoi')->nullable(); // Ngày xuất gần nhất
            $table->timestamps();

            // Định nghĩa khóa chính tổng hợp
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

