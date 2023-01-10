<?php

namespace App\Services;

class ShoppingCart
{

    public static function cart_list()
    {
        $items = \Cart::getContent();

        return $items;
    }

    public static function add_to_car($request)
    {
        $items_array =  \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return $items_array;
    }

    public static function remove_items($request)
    {
        \Cart::remove($request->id);
    }
}
