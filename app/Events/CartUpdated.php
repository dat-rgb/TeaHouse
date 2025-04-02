<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CartUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $cartCount;

    // Khởi tạo sự kiện với số lượng giỏ hàng
    public function __construct($cartCount)
    {
        $this->cartCount = $cartCount;
    }

    // Phát sóng trên channel
    public function broadcastOn()
    {
        return new Channel('cart-channel');
    }

    // Dữ liệu gửi đi khi phát sóng
    public function broadcastWith()
    {
        return [
            'cartCount' => $this->cartCount,
        ];
    }
}
