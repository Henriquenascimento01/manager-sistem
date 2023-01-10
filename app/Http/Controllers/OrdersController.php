<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\OrderRepository;

class OrdersController extends Controller
{
    public function index()
    {   
        $orders = OrderRepository::all_orders();

        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $orders = json_decode($request->order);

        $confirmed_orders = [];

        foreach ($orders as $order) {
            $product_id = $order->id;
            $quantity = $order->quantity;

            OrderRepository::create_order($product_id, $user_id, $quantity);

            array_push($confirmed_orders, (object)[
                'product_id' => $product_id,
                'product_name' => $order->name,
                'user_id' => $user_id,
                'quantity' => $quantity,
            ]);
        }
        return redirect('/order');
    }

    public function destroy($id)
    {
        OrderRepository::delete_order($id);

        return back()->with('msg', 'Pedido deletado com sucesso');
    }
}
