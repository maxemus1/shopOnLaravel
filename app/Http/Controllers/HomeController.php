<?php

namespace App\Http\Controllers;

use App\Model\Products;
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
       // $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::paginate(12);
        return view('home', ['products' => $products]);
    }

    public function home()
    {
        return view('home');
    }
}
