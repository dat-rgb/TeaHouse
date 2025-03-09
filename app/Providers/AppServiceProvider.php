<?php

namespace App\Providers;

use App\Http\ViewComposers\DanhMucComposer;
use App\Http\ViewComposers\GioHangComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view::composer(['Layout.app', 'sanpham.index', 'SanPham.subLayout'], DanhMucComposer::class);
        View::composer(['Layout.app'], GioHangComposer::class);
    }
}
