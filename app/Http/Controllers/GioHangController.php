<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GioHangController extends Controller
{
    public function gioHang(){
        $viewData = [
            "title" => "Giỏ hàng",    
        ];
        return view('Home.gioHang');
    }
}
