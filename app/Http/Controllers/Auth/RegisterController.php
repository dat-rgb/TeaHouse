<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TaiKhoan;
use App\Models\KhachHang;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;

class RegisterController extends Controller
{
    public function showRegisterForm() {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'ho_ten_khach_hang' => 'required|string|max:255',
            'ngay_sinh' => [
                'nullable',
                'date',
                function ($attribute, $value, $fail) {
                    if ($value && Carbon::parse($value)->age < 12) {
                        $fail('Bạn phải từ 12 tuổi trở lên để đăng ký.');
                    }
                }
            ],
            'email' => 'nullable|email|unique:tai_khoan,email',
            'so_dien_thoai' => 'nullable|unique:tai_khoan,so_dien_thoai',
            'mat_khau' => [
                'required',
                'min:6',
                'max:24',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,24}$/'
            ],
        ], [
            'mat_khau.regex' => 'Mật khẩu phải chứa ít nhất 1 chữ hoa, 1 chữ thường, 1 số và 1 ký tự đặc biệt.'
        ]);

        if (!$request->email && !$request->so_dien_thoai) {
            return redirect()->back()->withInput()->with([
                'message' => 'Vui lòng nhập ít nhất email hoặc số điện thoại.',
                'type' => 'error'
            ]);
        }

        try {
            DB::beginTransaction();

            $user = TaiKhoan::create([
                'email' => $request->email,
                'so_dien_thoai' => $request->so_dien_thoai,
                'mat_khau' => Hash::make($request->mat_khau),
                'loai_tai_khoan' => 3,
                'trang_thai' => 1,
            ]);

            if (!$user) {
                throw new \Exception("Không thể tạo tài khoản.");
            }

            $khachHang = KhachHang::create([
                'ma_tai_khoan' => $user->ma_tai_khoan,
                'ho_ten_khach_hang' => $request->ho_ten_khach_hang,
                'ngay_sinh' => $request->ngay_sinh,
            ]);

            if (!$khachHang) {
                throw new \Exception("Không thể tạo hồ sơ khách hàng.");
            }

            DB::commit();

            Auth::login($user);

            return redirect()->route('home.index')->with('success', 'Đăng ký tài khoản thành công');
        } catch (\Exception $e) {
            DB::rollBack();

            // Optionally: ghi log lại nếu debug production
            // Log::error("Lỗi đăng ký: " . $e->getMessage());

            return redirect()->back()->withInput()->with([
                'message' => 'Đăng ký thất bại: ' . $e->getMessage(),
                'type' => 'error'
            ]);
        }
    }
}
 