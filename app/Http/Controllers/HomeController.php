<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    const  PRODUCTS_PER_PAGE = 12;

    /**
     * Показывает товар на главной странице
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(self::PRODUCTS_PER_PAGE);
        return view('home', ['products' => $products]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutСompany()
    {
        return view('layouts.about_company');
    }
}
