<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('is_admin');

        $products = ProductRepository::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->authorize('is_admin');

        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {   
        $this->authorize('is_admin');

        ProductRepository::create($request);

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        $this->authorize('is_admin');

        return view('products.edit', \compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {   
        $this->authorize('is_admin');

        ProductRepository::update($request, $id);

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $this->authorize('is_admin');

        try {
            ProductRepository::destroy($id);

            return back();
        } catch (\PDOException) {

            return back()->WithError();
        }
    }

    public function block(Product $product)
    {   
        $this->authorize('is_admin');

        ProductRepository::block($product->id);

        return back();
    }

    public function blocked_products()
    {
        $this->authorize('is_admin');

        $products = ProductRepository::blocked_products();

        return view('products.blocked', compact('products'));
    }

    public function permantent_deleted($id)
    {    
        $this->authorize('is_admin');

        $product = Product::findOrFail($id);

        $product->forceDelete();

        return redirect('/products');
    }
}
