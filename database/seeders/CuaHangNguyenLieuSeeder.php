<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CuaHangNguyenLieuSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        // Chỉ seed dữ liệu cho cửa hàng có mã = 1
        $cua_hang_nguyen_lieus = [
            //1
            [
                'ma_cua_hang' => 1, 
                'ma_nguyen_lieu' => 1, //Cà phê rang ARABICA gói 1kg
                'dinh_luong_ton'=> 20000, // định lượng tồn (cộng dồn định lượng hoặc trừ từ phiếu nhập/xuất)
                'so_luong_ton' => 20, 
                'dinh_luong_ton_min' => 0,
                'dinh_luong_ton_max' => 0,
                'so_luong_ton_min' => 0,
                'so_luong_ton_max' => 0,
                'don_vi' => 'Gói 100g', 
            ],
            //2
            [
                'ma_cua_hang' => 1, 
                'ma_nguyen_lieu' => 2, // Tên nguyên liệu ứng với mã
                'dinh_luong_ton'=> 20000, // định lượng tồn (cộng dồn định lượng hoặc trừ từ phiếu nhập/xuất)
                'so_luong_ton' => 20, 
                'dinh_luong_ton_min' => 0,
                'dinh_luong_ton_max' => 0,
                'so_luong_ton_min' => 0,
                'so_luong_ton_max' => 0,
                'don_vi' => 'Gói', 
            ],
            //3
            [
                'ma_cua_hang' => 1, 
                'ma_nguyen_lieu' => 3, // Sữa tươi tiệt trùng 100% không đường 1L
                'dinh_luong_ton'=> 24000, // định lượng tồn (cộng dồn định lượng hoặc trừ từ phiếu nhập/xuất)
                'so_luong_ton' => 2, 
                'dinh_luong_ton_min' => 0,
                'dinh_luong_ton_max' => 0,
                'so_luong_ton_min' => 0,
                'so_luong_ton_max' => 0,
                'don_vi' => 'Thùng (12 hộp 1L)', 
            ],
            //4
            [
                'ma_cua_hang' => 1, 
                'ma_nguyen_lieu' => 4, // Tên nguyên liệu ứng với mã
                'dinh_luong_ton'=> 24000, // định lượng tồn (cộng dồn định lượng hoặc trừ từ phiếu nhập/xuất)
                'so_luong_ton' => 2, 
                'dinh_luong_ton_min' => 0,
                'dinh_luong_ton_max' => 0,
                'so_luong_ton_min' => 0,
                'so_luong_ton_max' => 0,
                'don_vi' => 'Thùng (12 hộp 1L)', 
            ],
            //5
            [
                'ma_cua_hang' => 1, 
                'ma_nguyen_lieu' => 5, // Tên nguyên liệu ứng với mã
                'dinh_luong_ton'=> 24000, // định lượng tồn (cộng dồn định lượng hoặc trừ từ phiếu nhập/xuất)
                'so_luong_ton' => 2, 
                'dinh_luong_ton_min' => 0,
                'dinh_luong_ton_max' => 0,
                'so_luong_ton_min' => 0,
                'so_luong_ton_max' => 0,
                'don_vi' => 'Thùng (12 hộp 1L)', 
            ],
            //6
            [
                'ma_cua_hang' => 1, 
                'ma_nguyen_lieu' => 6, // Tên nguyên liệu ứng với mã
                'dinh_luong_ton'=> 6000, // định lượng tồn (cộng dồn định lượng hoặc trừ từ phiếu nhập/xuất)
                'so_luong_ton' => 3, 
                'dinh_luong_ton_min' => 0,
                'dinh_luong_ton_max' => 0,
                'so_luong_ton_min' => 0,
                'so_luong_ton_max' => 0,
                'don_vi' => 'Can 6kg', 
            ],
            //7
            [
                'ma_cua_hang' => 1, 
                'ma_nguyen_lieu' => 7, // BỘT BÉO B ONE 1KG
                'dinh_luong_ton'=> 11000, // định lượng tồn (cộng dồn định lượng hoặc trừ từ phiếu nhập/xuất)
                'so_luong_ton' => 11, 
                'dinh_luong_ton_min' => 0,
                'dinh_luong_ton_max' => 0,
                'so_luong_ton_min' => 0,
                'so_luong_ton_max' => 0,
                'don_vi' => 'Bịch 1kg', 
            ],
            //8
            [
                'ma_cua_hang' => 1, 
                'ma_nguyen_lieu' => 8, // KEM TƯƠI TOPPING BASE RICH'S - HỘP CAO 907G
                'dinh_luong_ton'=> 18140, // định lượng tồn (cộng dồn định lượng hoặc trừ từ phiếu nhập/xuất)
                'so_luong_ton' => 20, 
                'dinh_luong_ton_min' => 0,
                'dinh_luong_ton_max' => 0,
                'so_luong_ton_min' => 0,
                'so_luong_ton_max' => 0,
                'don_vi' => 'Hộp 907g', 
            ],
            //9
            [
                'ma_cua_hang' => 1, 
                'ma_nguyen_lieu' => 9, // Tên nguyên liệu ứng với mã
                'dinh_luong_ton'=> 35000, // định lượng tồn (cộng dồn định lượng hoặc trừ từ phiếu nhập/xuất)
                'so_luong_ton' => 9, 
                'dinh_luong_ton_min' => 0,
                'dinh_luong_ton_max' => 0,
                'so_luong_ton_min' => 0,
                'so_luong_ton_max' => 0,
                'don_vi' => 'Bịch 500g', 
            ],
            //10
            [
                'ma_cua_hang' => 1, 
                'ma_nguyen_lieu' => 10, // Tên nguyên liệu ứng với mã
                'dinh_luong_ton'=> 15360, // định lượng tồn (cộng dồn định lượng hoặc trừ từ phiếu nhập/xuất)
                'so_luong_ton' => 32, 
                'dinh_luong_ton_min' => 0,
                'dinh_luong_ton_max' => 0,
                'so_luong_ton_min' => 0,
                'so_luong_ton_max' => 0,
                'don_vi' => 'kg', 
            ],
            //11
            [
                'ma_cua_hang' => 1, 
                'ma_nguyen_lieu' => 11, // Tên nguyên liệu ứng với mã
                'dinh_luong_ton'=> 17480, // định lượng tồn (cộng dồn định lượng hoặc trừ từ phiếu nhập/xuất)
                'so_luong_ton' => 76, 
                'dinh_luong_ton_min' => 0,
                'dinh_luong_ton_max' => 0,
                'so_luong_ton_min' => 0,
                'so_luong_ton_max' => 0,
                'don_vi' => 'Hộp 230g', 
            ],
            //12
            [
                'ma_cua_hang' => 1, 
                'ma_nguyen_lieu' => 12, // Tên nguyên liệu ứng với mã
                'dinh_luong_ton'=> 15750, // định lượng tồn (cộng dồn định lượng hoặc trừ từ phiếu nhập/xuất)
                'so_luong_ton' => 7, 
                'dinh_luong_ton_min' => 0,
                'dinh_luong_ton_max' => 0,
                'so_luong_ton_min' => 0,
                'so_luong_ton_max' => 0,
                'don_vi' => 'Chai 2,25Kg', 
            ],
            //13
            [
                'ma_cua_hang' => 1, 
                'ma_nguyen_lieu' => 13, // Tên nguyên liệu ứng với mã
                'dinh_luong_ton'=> 143000, // định lượng tồn (cộng dồn định lượng hoặc trừ từ phiếu nhập/xuất)
                'so_luong_ton' => 11, 
                'dinh_luong_ton_min' => 0,
                'dinh_luong_ton_max' => 0,
                'so_luong_ton_min' => 0,
                'so_luong_ton_max' => 0,
                'don_vi' => 'Chai 1,3kg', 
            ],
        ];

        DB::table('cua_hang_nguyen_lieus')->insert($cua_hang_nguyen_lieus);
    }
}
