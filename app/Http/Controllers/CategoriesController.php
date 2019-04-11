<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Products;

class CategoriesController extends Controller
{
    const  PRODUCTS_PER_PAGE = 12;

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $products = Products::where('categories_id', $id)
            ->paginate(self::PRODUCTS_PER_PAGE);
        return view('home', ['products' => $products]);
    }


}
