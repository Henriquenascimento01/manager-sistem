<?php

namespace App\Services;

use App\Models\User;
use App\Models\Orders;
use App\Models\Product;

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
}
