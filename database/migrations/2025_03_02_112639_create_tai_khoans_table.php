<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('tai_khoan', function (Blueprint $table) {
            $table->id('ma_tai_khoan');
            
            // Đăng nhập bằng số điện thoại
            $table->char('so_dien_thoai', 10)->nullable()->unique();

            // Đăng nhập bằng email (Google, Facebook)
            $table->string('email')->nullable()->unique();

            // Mật khẩu (chỉ dùng khi đăng ký bằng số điện thoại hoặc email)
            $table->string('mat_khau', 255)->nullable();

            // Xác thực qua Google, Facebook
            $table->string('provider')->nullable(); // google, facebook, zalo
            $table->string('provider_id')->nullable()->unique(); // ID từ Google/Facebook

            // Login bằng QR (lưu token hoặc mã đăng nhập)
            $table->string('qr_token')->nullable()->unique();

            // Loại tài khoản
            $table->integer('loai_tai_khoan')->default(0); // 0=Guest, 1=Admin, 2=Nhân viên, 3=Khách hàng

            // Trạng thái tài khoản
            $table->integer('trang_thai')->default(1); // 0=Không hoạt động, 1=Hoạt động

            $table->timestamps();
        });

    }

    public function down() {
        Schema::dropIfExists('tai_khoan');
    }
};

