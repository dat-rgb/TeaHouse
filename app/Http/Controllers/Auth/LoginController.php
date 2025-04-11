<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\TaiKhoan;
use App\Models\KhachHang;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm() {
        return view('auth.login');
    }
    // Hiển thị form đăng ký
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'mat_khau' => 'required',
        ]);

        $user = TaiKhoan::with(['nhanVien', 'khachHang'])
            ->where('email', $request->email)
            ->first();

        if ($user && Hash::check($request->mat_khau, $user->mat_khau)) {
            Auth::login($user);

            // Chuyển hướng dựa vào loại tài khoản
            return redirect()->route($user->loai_tai_khoan == 1 ? 'admin.home.index' : 'home.index')
                ->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors(['error' => 'Sai email hoặc mật khẩu'])->withInput();
    }
    // Xử lý đăng xuất
    public function logout() {
        Auth::logout();
        return redirect()->route('home.index');
    }
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
