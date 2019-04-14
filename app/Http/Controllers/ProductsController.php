<?php
/**
 * Created by PhpStorm.
 * User: macms
 * Date: 16/03/2019
 * Time: 01:10
 */

namespace App\Http\Controllers;


use App\Http\Requests\ProductsRequest;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductsController extends Controller
{
    const  PRODUCTS_PER_PAGE = 12;

    /**
     * @param Product $products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $products)
    {
        $categories = $products->categories;
        return view('products.single', ['products' => $products], ['categories_id' => $categories]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%' . $request->get('search') . '%')
            ->paginate(self::PRODUCTS_PER_PAGE);
        return view('home', ['products' => $products]);
    }
}
