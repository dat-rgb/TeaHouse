<div id="notification-modal" class="hidden fixed top-5 right-5 z-50">
    <div id="notification-box-container">
        <!-- Các thông báo -->
    </div>
</div>

<style>
   #notification-modal {
        position: fixed;
        top: 20px;
        left: 10px;
        z-index: 9999;
    }

    #notification-box-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .notification-modal {
        display: flex;
        align-items: center;
        background-color: #d1e7dd;
        color: #0f5132;
        padding: 12px 18px;
        border-radius: 6px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        border-left: 5px solid #198754;
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.3s ease-in-out;
        max-width: 300px;
    }
    
    .notification-modal.show {
        opacity: 1;
        transform: translateX(0);
    }

    .notification-modal.error {
        background-color: #f8d7da;
        color: #842029;
        border-left-color: #dc3545;
    }

    .icon {
        margin-right: 10px;
        font-size: 18px;
    }

    .message {
        flex-grow: 1;
    }

    .close-btn {
        margin-left: auto;
        cursor: pointer;
        font-size: 18px;
        background: none;
        border: none;
        color: inherit;
    }
</style>

<script>
    // Hàm hiển thị thông báo
    function showNotification(message, type = "success") {
        // Tạo một phần tử thông báo mới
        const notificationBox = document.createElement("div");
        notificationBox.classList.add("notification-modal", type);
        
        const icon = document.createElement("span");
        icon.classList.add("icon");
        icon.innerHTML = type === "success" ? "✅" : "❌";

        const msg = document.createElement("span");
        msg.classList.add("message");
        msg.textContent = message;

        notificationBox.appendChild(icon);
        notificationBox.appendChild(msg);

        // Thêm thông báo vào container
        const container = document.getElementById("notification-box-container");
        container.appendChild(notificationBox);

        // Hiển thị thông báo
        setTimeout(() => {
            notificationBox.classList.add("show");
        }, 10);

        // Tự động đóng thông báo sau 3 giây
        setTimeout(() => closeNotification(notificationBox), 3000);
    }

    // Hàm đóng thông báo
    function closeNotification(notificationBox) {
        notificationBox.classList.remove("show");

        // Xóa thông báo khỏi DOM sau khi kết thúc animation
        setTimeout(() => {
            notificationBox.remove();
        }, 300);
    }
</script>
