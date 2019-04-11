<?php
/**
 * Created by PhpStorm.
 * User: macms
 * Date: 16/03/2019
 * Time: 01:10
 */

namespace App\Http\Controllers;


use App\Http\Requests\ProductsRequest;
use App\Model\Categories;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductsController extends Controller
{

    /**
     * @param Products $products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Products $products)
    {

        return view('products.single', ['products' => $products], ['categories_id' =>  $products->categoriesName($products->categories_id)]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $products = Products::where('name', 'LIKE', '%' . $request->get('search') . '%')
            ->paginate(12);
        return view('home', ['products' => $products]);
    }
}
