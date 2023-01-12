<?php

namespace App\Services;

use App\Models\Product;

class ProductStockManager
{

    public static function remove_product_from_stock($product_id, $quantity)
    {

        // $product->max_quantity - intval($quantity) <= 0;
        Product::find($product_id)->decrement('max_quantity', $quantity);
    }

    public static function adding_product_from_stock($product_id, $quantity)
    {
        Product::find($product_id)->increment('max_quantity', $quantity);
    }
}
