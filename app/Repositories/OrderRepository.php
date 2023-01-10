<?php

namespace App\Repositories;

use App\Models\Orders;

class OrderRepository
{

    public static function create_order($product_id, $user_id, $quantity)
    {
        $orders = Orders::create([
            'product_id' => $product_id,
            'user_id' => $user_id,
            'quantity' => $quantity
        ]);

        return $orders;
    }
}
