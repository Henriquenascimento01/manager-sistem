<?php

namespace App\Services;

use App\Models\Orders;
use App\Models\Product;
use App\Models\Products_input;

class ProductStockManager
{
    public static function remove_product_from_stock()
    {
        $users_order = new Orders;
        $products = new Products_input;

        foreach ($products as $product) {
            $product->find($product->id)->decrement('quantity', $users_order->quantity);
           // return true; 
        }
    }

    public static function adding_product_from_stock()
    {
        $users_order = new Orders;
        $stock = new Products_input;

        foreach ($users_order as $item) {
            ($stock::find($item['id'])->increment('quantity', $item['quantity']));
        }
    }
}
