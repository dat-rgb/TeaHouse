<!-- Modal -->
<div id="loginPopup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg rounded-4 border-0">
            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title" id="loginModalLabel">Đăng nhập</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 py-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" id="email" name="email" class="form-control rounded-3" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Mật khẩu</label>
                        <div class="input-group">
                            <input type="password" class="form-control password-input" name="mat_khau">
                            <button type="button" class="btn btn-outline-secondary toggle-password">Hiện</button>
                        </div>
                    </div>

                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-primary fw-bold py-2">Đăng nhập</button>

                        <button type="button" class="btn btn-outline-success d-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-qr-code-scan fs-5"></i> Đăng nhập bằng mã QR
                        </button>

                        <div class="text-center text-muted mt-2">Hoặc</div>

                        <a href="{{ route('google.login') }}" class="btn btn-outline-danger fw-bold py-2">
                            <i class="fab fa-google me-2"></i> Đăng nhập với Google
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
