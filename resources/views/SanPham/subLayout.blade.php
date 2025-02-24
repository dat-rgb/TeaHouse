<!-- layouts/product_sidebar.blade.php -->
<div class="col-lg-3">
    <div class="card p-3">
        <h4 class="fw-bold">Danh Mục</h4>
        <ul class="list-group">
            <li class="list-group-item"><a href="#">Trà Sữa</a></li>
            <li class="list-group-item"><a href="#">Cà Phê</a></li>
            <li class="list-group-item"><a href="#">Sinh Tố</a></li>
            <li class="list-group-item"><a href="#">Nước Ép</a></li>
        </ul>
    </div>

    <div class="card p-3 mt-4">
        <h4 class="fw-bold">Bộ Lọc</h4>
        <form>
            <label class="form-label">Giá từ:</label>
            <input type="number" class="form-control mb-2" placeholder="Tối thiểu">

            <label class="form-label">Giá đến:</label>
            <input type="number" class="form-control mb-2" placeholder="Tối đa">

            <button type="submit" class="btn btn-primary w-100">Lọc</button>
        </form>
    </div>
</div>
