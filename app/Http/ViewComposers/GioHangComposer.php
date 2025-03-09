<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class GioHangComposer
{
    public function compose(View $view)
    {
        $maTaiKhoan = session('ma_tai_khoan', 1);
        $gioHang = session("cart_$maTaiKhoan", []);
        $soLuong = array_sum(array_column($gioHang, 'so_luong'));

        $view->with('soLuongGioHang', $soLuong);
    }
}
