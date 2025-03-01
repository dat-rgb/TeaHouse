<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{

    public function index()
    {
        $products = SanPham::where('trang_thai', 1)->paginate(6);
        return view('SanPham.index', compact('products'));
    }

}
