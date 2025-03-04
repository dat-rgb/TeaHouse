<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index()
    {
        $products = SanPham::where('trang_thai', 1)->paginate(8);
        return view('SanPham.index', compact('products'));
    }
    public function productDetail(){
        return view('SanPham.productDetail');
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
