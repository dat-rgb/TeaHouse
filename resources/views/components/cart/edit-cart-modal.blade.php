<form method="POST" action="">
  @csrf
  <input type="hidden" name="rowId" value="{{ $rowId }}">

  <div class="modal-header">
    <h5 class="modal-title">{{ $item['name'] }}</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
  </div>

  <div class="modal-body">
    <!-- Size chọn -->
    <div class="mb-3">
      <label>Size</label>
      @foreach ($sizes as $size)
        <div class="form-check">
          <input class="form-check-input"
                 type="radio"
                 name="size_id"
                 value="{{ $size->ma_size }}"
                 {{ isset($item['options']['size_id']) && $item['options']['size_id'] == $size->ma_size ? 'checked' : '' }}>
          <label class="form-check-label">
            {{ $size->ten_size }} (+{{ number_format($size->gia_size) }}đ)
          </label>
        </div>
      @endforeach
    </div>

    <!-- Toppings -->
    <div class="mb-3">
      <label>Topping</label>
      @php
        $selectedToppings = array_column($item['options']['toppings'] ?? [], 'id');
      @endphp
      @foreach ($toppings as $tp)
        <div class="form-check">
          <input class="form-check-input"
                 type="checkbox"
                 name="toppings[]"
                 value="{{ $tp->ma_topping }}"
                 {{ in_array($tp->ma_topping, $selectedToppings) ? 'checked' : '' }}>
          <label class="form-check-label">
            {{ $tp->ten_topping }} (+{{ number_format($tp->gia_topping) }}đ)
          </label>
        </div>
      @endforeach
    </div>

    <!-- Số lượng -->
    <div class="mb-3">
      <label>Số lượng</label>
      <input type="number"
             class="form-control"
             name="so_luong"
             value="{{ $item['qty'] }}"
             min="1">
    </div>
  </div>

  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
  </div>
</form>
