<!-- Modal -->
<div id="loginPopup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg rounded-3">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="loginModalLabel">Đăng nhập</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" id="email" name="email" class="form-control rounded-3" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Mật khẩu</label>
                        <input type="password" class="form-control rounded-3" id="password" name="mat_khau" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Đăng nhập</button>

                    <div class="text-center mt-3">
                        <span class="text-muted">Hoặc</span>
                    </div>

                    <a href="{{ route('google.login') }}" class="btn btn-outline-danger w-100 py-2 mt-2 fw-bold">
                        <i class="fab fa-google"></i> Đăng nhập với Google
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
