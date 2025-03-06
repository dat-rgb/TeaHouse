<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\TaiKhoan;
use App\Models\KhachHang;

class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $socialUser = Socialite::driver('google')->stateless()->user();

            DB::beginTransaction();

            $taiKhoan = TaiKhoan::where('email', $socialUser->getEmail())->first();

            if (!$taiKhoan) {
                $taiKhoan = TaiKhoan::firstOrCreate([
                    'email' => $socialUser->getEmail(),
                    'provider' => 'google',
                    'provider_id' => $socialUser->getId(),
                    'loai_tai_khoan' => 3,
                    'trang_thai' => 1,
                ]);

                KhachHang::create([
                    'ma_tai_khoan' => $taiKhoan->ma_tai_khoan,
                    'ho_ten_khach_hang' => $socialUser->getName(),
                ]);
            }

            DB::commit();

            Auth::login($taiKhoan);
            return redirect()->route('home.index')->with('success', 'Đăng nhập thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('login')->with('error', 'Lỗi xác thực Google!');
        }
    }
}
