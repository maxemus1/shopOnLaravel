<?php
/**
 * Created by PhpStorm.
 * User: macms
 * Date: 16/03/2019
 * Time: 01:10
 */

namespace App\Http\Controllers;


use App\Model\Categories;
use App\Model\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $categories = Categories::all();
        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'prise' => 'numeric'
        ]);
        $products = new Products();
        $products->name = $request->get('name');
        $products->prise = $request->get('prise');
        $products->picture = 'false';
        $products->description = 'false';
        $products->categories_id = $request->get('categories_id');
        $products->save();

        return redirect('/products');
    }
}
