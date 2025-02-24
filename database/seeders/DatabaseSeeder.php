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
            ToppingSeeder::class, // Đảm bảo toppings được tạo trước
            SizeSeeder::class,
            SanPhamSizeSeeder::class,
            SanPhamToppingSeeder::class, // Sau đó mới gán topping cho sản phẩm
        ]);
    }
}
