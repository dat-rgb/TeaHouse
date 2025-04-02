<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\Topping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class SanPhamController extends Controller
{
    //Trang product list
    public function index()
    {
        $products = SanPham::where('trang_thai', 1)->paginate(8);
        return view('SanPham.index', compact('products'));
    }
    //Product Detail
    public function show($slug)
    {
        // Lấy thông tin sản phẩm
        $sanPham = DB::table('san_phams')
            ->join('danh_muc_san_phams', 'san_phams.ma_danh_muc', '=', 'danh_muc_san_phams.ma_danh_muc')
            ->where('san_phams.slug', $slug)
            ->select('san_phams.*', 'danh_muc_san_phams.ten_danh_muc')
            ->first();

        if (!$sanPham) {
            return redirect()->route('home.404');
        }

        // Kiểm tra có hiển thị topping không
        $hienThiTopping = !Str::contains(Str::lower($sanPham->ten_danh_muc ?? ''), 'cà phê');

        // Lấy danh sách size của sản phẩm
        $sizes = DB::table('thanh_phan_san_phams')
            ->join('sizes', 'thanh_phan_san_phams.ma_size', '=', 'sizes.ma_size')
            ->where('thanh_phan_san_phams.ma_san_pham', $sanPham->ma_san_pham)
            ->select('sizes.ma_size', 'sizes.ten_size', 'sizes.gia_size')
            ->distinct()
            ->get();

        // Lấy danh sách topping
        $toppings = DB::table('toppings')
            ->where('trang_thai', 1)
            ->select('ma_topping', 'ten_topping', 'gia_topping')
            ->get();

        return view('SanPham.productDetail', compact('sanPham', 'sizes', 'toppings', 'hienThiTopping'));
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
