<div class="modal fade" id="editProductModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('cart.update', $id ?? ($item['ma_san_pham'] ?? 0)) }}" method="POST">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Sửa sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p><strong>{{ $item['ten_san_pham'] ?? 'Tên sản phẩm không tồn tại' }}</strong></p>

                    {{-- Size --}}
                    <div class="mb-3">
                        <label class="form-label">Chọn size:</label>
                        @forelse ($sizes as $size)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size_id"
                                    value="{{ $size->ma_size }}"
                                    {{ $item['size_id'] == $size->ma_size ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    {{ $size->ten_size }} (+{{ number_format($size->gia_size, 0, ',', '.') }}đ)
                                </label>
                            </div>
                        @empty
                            <p>Không có size cho sản phẩm này.</p>
                        @endforelse
                    </div>

                    {{-- Topping --}}
                    @if ($hienThiTopping)
                        <div class="mb-3">
                            <label class="form-label">Chọn topping:</label>
                            @foreach ($toppings as $tp)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="toppings[]"
                                        value="{{ $tp->ma_topping }}"
                                        {{ in_array($tp->ma_topping, array_column($item['toppings'], 'id')) ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        {{ $tp->ten_topping }} (+{{ number_format($tp->gia_topping, 0, ',', '.') }}đ)
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- Số lượng --}}
                    <div class="mb-3">
                        <label class="form-label">Số lượng:</label>
                        <input type="number" name="so_luong" class="form-control"
                            value="{{ $item['so_luong'] }}" min="1">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
