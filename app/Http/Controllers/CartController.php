<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
}
