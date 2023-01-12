<?php

namespace App\Http\Controllers;

use App\Services\OverviewDashboard;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quantity_products = OverviewDashboard::quantity_products();
        $quantity_orders = OverviewDashboard::quantity_orders();
        $quantity_users = OverviewDashboard::quantity_ursers();
        $requests_by_users = OverviewDashboard::requests_by_users();

        return view('home', compact('quantity_products', 'quantity_orders', 'quantity_users', 'requests_by_users'));
    }
}
