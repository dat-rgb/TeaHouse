<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\Topping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    public function index()
    {
        $products = SanPham::where('trang_thai', 1)->paginate(8);
        return view('SanPham.index', compact('products'));
    }
    public function show($id)
    {
        // Lấy thông tin sản phẩm
        $sanPham = DB::table('san_phams')->where('ma_san_pham', $id)->first();

        // Lấy danh sách size của sản phẩm
        $sizes = DB::table('san_pham_sizes')
            ->join('sizes', 'san_pham_sizes.ma_size', '=', 'sizes.ma_size')
            ->where('san_pham_sizes.ma_san_pham', $id)
            ->select('sizes.ten_size', 'san_pham_sizes.ma_size', 'sizes.gia_size') // Đảm bảo 'gia_them' có trong select
            ->get();

        // Lấy danh sách topping
        $toppings = DB::table('toppings')
            ->where('trang_thai', 1)
            ->select('ten_topping', 'gia_topping')
            ->get();

        return view('SanPham.productDetail', compact('sanPham', 'sizes', 'toppings'));
    }
    public function filter(Request $request)
    {
        $categoryId = $request->category_id;

        if ($categoryId == "all") {
            $products = SanPham::where('trang_thai', 1)->paginate(6);
        } else {
            $products = SanPham::where('trang_thai', 1)
                                ->where('ma_danh_muc', $categoryId)
                                ->paginate(6);
        }

        return view('SanPham.productList', compact('products'))->render();
    }
}
