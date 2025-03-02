<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanVienSeeder extends Seeder
{
    public function run()
    {
        $nhanViens = [
            // 3 nhân viên bán hàng (chức vụ = 1)
            ['ma_tai_khoan' => 2, 'ma_chuc_vu' => 2, 'ho_ten_nhan_vien' => 'Nguyễn Văn A', 'gioi_tinh' => 1, 'so_dien_thoai' => '0912345671', 'email' => 'a@gmail.com', 'dia_chi' => 'Hà Nội', 'ca_lam' => 'Sáng'],
            ['ma_tai_khoan' => 3, 'ma_chuc_vu' => 2, 'ho_ten_nhan_vien' => 'Trần Thị B', 'gioi_tinh' => 0, 'so_dien_thoai' => '0912345672', 'email' => 'b@gmail.com', 'dia_chi' => 'Hà Nội', 'ca_lam' => 'Chiều'],
            ['ma_tai_khoan' => 4, 'ma_chuc_vu' => 3, 'ho_ten_nhan_vien' => 'Phạm Văn C', 'gioi_tinh' => 1, 'so_dien_thoai' => '0912345673', 'email' => 'c@gmail.com', 'dia_chi' => 'HCM', 'ca_lam' => 'Tối'],

            // 2 nhân viên kho (chức vụ = 2)
            ['ma_tai_khoan' => 5, 'ma_chuc_vu' => 3, 'ho_ten_nhan_vien' => 'Lê Văn D', 'gioi_tinh' => 1, 'so_dien_thoai' => '0912345674', 'email' => 'd@gmail.com', 'dia_chi' => 'Đà Nẵng', 'ca_lam' => 'Sáng'],
            ['ma_tai_khoan' => 6, 'ma_chuc_vu' => 3, 'ho_ten_nhan_vien' => 'Nguyễn Thị E', 'gioi_tinh' => 0, 'so_dien_thoai' => '0912345675', 'email' => 'e@gmail.com', 'dia_chi' => 'Đà Nẵng', 'ca_lam' => 'Chiều'],

            // 4 nhân viên phục vụ (chức vụ = 0)
            ['ma_tai_khoan' => 7, 'ma_chuc_vu' => 1, 'ho_ten_nhan_vien' => 'Hoàng Văn F', 'gioi_tinh' => 1, 'so_dien_thoai' => '0912345676', 'email' => 'f@gmail.com', 'dia_chi' => 'HCM', 'ca_lam' => 'Sáng'],
            ['ma_tai_khoan' => 8, 'ma_chuc_vu' => 1, 'ho_ten_nhan_vien' => 'Vũ Thị G', 'gioi_tinh' => 0, 'so_dien_thoai' => '0912345677', 'email' => 'g@gmail.com', 'dia_chi' => 'HCM', 'ca_lam' => 'Chiều'],
            ['ma_tai_khoan' => 9, 'ma_chuc_vu' => 1, 'ho_ten_nhan_vien' => 'Đỗ Văn H', 'gioi_tinh' => 1, 'so_dien_thoai' => '0912345678', 'email' => 'h@gmail.com', 'dia_chi' => 'Hà Nội', 'ca_lam' => 'Tối'],
            ['ma_tai_khoan' => 10, 'ma_chuc_vu' => 1, 'ho_ten_nhan_vien' => 'Lý Thị I', 'gioi_tinh' => 0, 'so_dien_thoai' => '0912345679', 'email' => 'i@gmail.com', 'dia_chi' => 'Hà Nội', 'ca_lam' => 'Sáng'],
        ];

        DB::table('nhan_vien')->insert($nhanViens);
    }
}
