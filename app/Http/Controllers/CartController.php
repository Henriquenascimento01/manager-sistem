<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ShoppingCart;

class CartController extends Controller
{
    public function index()
    {
        // $this->authorize('is_admin');

        $items =  ShoppingCart::cart_list();

        return view('shopping-car.shopping-car', compact('items'));
    }

    public function store(Request $request)
    {    
        ShoppingCart::add_to_car($request);

        return redirect()->route('cart.index')->with('msg', 'Produto adicionado ao carrinho');
    }

    public function remove_items(Request $request)
    {
        ShoppingCart::remove_items($request);

        return back()->with('msg', 'Produto removido do carrinho');
    }

    // public function confirmed_order(Request $request)
    // {
    //     $user_id = Auth::id();
    //     $orders = json_decode($request->order);

    //     $confirmed_orders = [];

    //     foreach ($orders as $order) {
    //         $product_id = $order->id;
    //         $quantity = $order->quantity;

    //         OrderRepository::create_order($product_id, $user_id, $quantity);

    //         array_push($confirmed_orders, (object)[
    //             'product_id' => $product_id,
    //             'product_name' => $order->name,
    //             'user_id' => $user_id,
    //             'quantity' => $quantity,
    //         ]);
    //     }

    //     return view('orders.index', compact('confirmed_orders'));
    // }
}
