<?php

namespace App\Services;

use App\Models\User;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OverviewDashboard
{

    public static function quantity_products()
    {
        return Product::all()->count();
    }

    public static function quantity_orders()
    {
        return Orders::all()->count();
    }

    public static function quantity_ursers()
    {
        return User::all()->count();
    }

    public static function requests_by_users()
    {
        $user_id = User::paginate(5);

        $user_orders = [];

        foreach ($user_id as $user) {

            $orders = Orders::where('user_id', $user->id)->count();

            array_push($user_orders, [
                'name' => $user->name,
                'quantity' => $orders
            ]);
        }

        sort($user_orders, SORT_NUMERIC);

        return $user_orders;
    }
}
