import './bootstrap';
window.Echo.channel('cart-channel')
    .listen('CartUpdated', (event) => {
        // Cập nhật số lượng giỏ hàng sau khi sự kiện CartUpdated được phát
        document.getElementById('cart-count').innerText = event.cartCount;
    });
