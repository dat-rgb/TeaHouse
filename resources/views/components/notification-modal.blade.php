<div id="notification-modal" class="hidden fixed top-5 right-5 z-50">
    <div id="notification-box" class="notification-modal hidden">
        <span id="notification-icon" class="icon"></span>
        <span id="notification-message" class="message"></span>
        <button class="close-btn" onclick="closeNotification()">&times;</button>
    </div>
</div>

<style>
   #notification-modal {
        position: fixed;
        top: 20px;
        right: 10px;
        z-index: 9999;
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
    function showNotification(message, type = "success") {
        const modal = document.getElementById("notification-box");
        const icon = document.getElementById("notification-icon");
        const msg = document.getElementById("notification-message");

        icon.innerHTML = type === "success" ? "✅" : "❌";
        msg.textContent = message;
        modal.classList.add("show", type);

        setTimeout(() => closeNotification(), 3000);
    }

    function closeNotification() {
        const modal = document.getElementById("notification-box");
        modal.classList.remove("show", "success", "error");
    }
</script>
