<?php

namespace App\Repositories;

use App\Models\Orders;
use App\Services\ProductStockManager;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
    public static function all_orders()
    {
        $orders = Orders::where('user_id', Auth::user()->id)->get();

        return $orders;
    }

    public static function create_order($product_id, $user_id, $quantity)
    {
        ProductStockManager::remove_product_from_stock();

        $orders = Orders::create([
            'product_id' => $product_id,
            'user_id' => $user_id,
            'quantity' => $quantity
        ]);

        return $orders;
    }

    public static function delete_order($id)
    {
        $order = Orders::findOrFail($id);

        $order->delete();
    }
}
