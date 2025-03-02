<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DanhMucSanPhamSeeder::class,
            SanPhamSeeder::class,
            ToppingSeeder::class, 
            SizeSeeder::class,
            SanPhamSizeSeeder::class,
            ChucVuSeeder::class,
            TaiKhoanSeeder::class,
            NhanVienSeeder::class,
            KhachHangSeeder::class,
        ]);
    }
}
