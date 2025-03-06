<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->id('ma_nhan_vien');
            $table->unsignedBigInteger('ma_chuc_vu');
            $table->unsignedBigInteger('ma_tai_khoan');
            $table->string('ho_ten_nhan_vien', 255);
            $table->date('ngay_sinh')->nullable();
            $table->integer('gioi_tinh')->nullable();
            $table->string('dia_chi', 255)->nullable();
            $table->string('ca_lam', 50)->nullable();
            $table->timestamps();

            $table->foreign('ma_tai_khoan')->references('ma_tai_khoan')->on('tai_khoan')->onDelete('cascade');
            $table->foreign('ma_chuc_vu')->references('ma_chuc_vu')->on('chuc_vu')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('nhan_vien');
    }
};

