<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $viewData = [
            "title" => "Trang chủ",    
        ];
        return view('Home.index');
    }
}
