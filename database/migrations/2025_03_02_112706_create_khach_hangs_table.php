<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->id('ma_khach_hang');
            $table->unsignedBigInteger('ma_tai_khoan');
            $table->string('ho_ten_khach_hang', 255);
            $table->date('ngay_sinh')->nullable();
            $table->integer('gioi_tinh')->nullable();
            $table->string('dia_chi', 255)->nullable();
            $table->integer('diem_thanh_vien')->nullable()->default(0);
            $table->enum('hang_thanh_vien', ['Vàng', 'Bạc', 'Đồng'])->nullable()->default('Đồng');
            $table->timestamps();

            $table->foreign('ma_tai_khoan')->references('ma_tai_khoan')->on('tai_khoan')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('khach_hang');
    }
};

