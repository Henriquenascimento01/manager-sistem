<?php


namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{

    public static function all()
    {

        $products = Product::paginate(10);

        return $products;
    }

    public static function create($request)
    {
        $products = new Product;

        $products->name = $request->name;
        $products->category = $request->category;
        $products->max_quantity = $request->max_quantity;
        $products->unity_price = $request->unity_price;
        $products->status = $request->status;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $request_image = $request->image;
            $extension = $request_image->extension();
            $image_name = md5($request_image->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request_image->move(public_path('img/movies'), $image_name);
            $products->image = $image_name;
        }

        $products->save();
    }

    public static function update($request, $id)
    {
        $data = [
            'name' => $request->name,
            'category' => $request->category,
            'max_quantity' => $request->max_quantity,
            'unity_price' => $request->unity_price,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {

            $request_image = $request->image;
            $extension = $request_image->extension();
            $image_name = md5($request_image->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request_image->move(public_path('img/movies'), $image_name);
            $data['image'] = $image_name;
        }

        Product::where('id', $id)->update($data);
    }

    public static function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->forceDelete();
    }

    public static function block($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['status' => 'inativo']);

        $product->delete();
    }

    public static function blocked_products()
    {
        return Product::onlyTrashed()->get();
    }

    public static function unblock($id)
    {
        return Product::withTrashed()->find($id)->restore();
    }
}
