<?php
namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TaiKhoan;

class AuthController extends Controller {
    // Hiển thị form đăng nhập
    public function showLoginForm() {
        return view('auth.login');
    }
    // Hiển thị form đăng ký
    public function showRegisterForm() {
        return view('auth.register');
    }
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
}
