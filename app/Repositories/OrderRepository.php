<?php

namespace App\Repositories;

use App\Models\Orders;
use App\Models\Product;
use App\Services\ProductStockManager;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
    public static function all_orders()
    {
        $orders = Orders::where('user_id', Auth::user()->id)->get();
        if (count($orders)) {
            $finish_order = [
                'user_id' => $orders[0]['user_id'],
                'products' => []
            ];

            $products = [];

            foreach ($orders as $order) {
                // dd($order);
                $product = Product::find($order->product_id);

                array_push($products, [
                    'order_id' => $order->id,
                    'id' => $order->product_id,
                    'product_name' => $product->name,
                    'image' => $product->image,
                    'quantity' => $order->quantity,
                ]);
            }
            array_push($finish_order['products'], $products);

            return $finish_order;
        }

        return false; 
    }

    public static function create_order($product_id, $user_id, $quantity)
    {
        $orders = Orders::create([
            'product_id' => $product_id,
            'user_id' => $user_id,
            'quantity' => $quantity
        ]);

        return $orders;
    }

    public static function delete_order($orders)
    {
        foreach ($orders['products'][0] as $order) {
            try {

                $order_canceled = Orders::find($order['order_id']);

                $order_canceled->delete();

                ProductStockManager::adding_product_from_stock($order['id'], $order['quantity']);
            } catch (\ErrorException $e) {
                dd($e);
            }
        }
    }
}
