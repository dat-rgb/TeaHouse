<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cua_hangs', function (Blueprint $table) {
            $table->id('ma_cua_hang');
            $table->string('ten_cua_hang', 255);
            $table->string('dia_chi', 255)->nullable();
            $table->string('so_dien_thoai', 20)->nullable();
            $table->string('email')->nullable();
            $table->integer('trang_thai')->default(1);
            $table->string('logo')->nullable();
            $table->integer('chi_nhanh')->default(1); //0 cửa hàng chính, 1 chi nhánh

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cua_hangs');
    }
};
