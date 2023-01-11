<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $products = ProductRepository::all();
        $user = UserRepository::all();

        return view('marketplace', compact('products', 'user'));
    }
}
