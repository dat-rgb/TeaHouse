<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index(){
        $viewData = [
        ];
        return view('SanPham.index');
    }
}
