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

    public function show(Products $products)
    {
        $categories_id = Categories::find($products->categories_id);
        return view('products.single', ['products' => $products], ['categories_id' => $categories_id]);
    }

    public function search(Request $request)
    {
        $categories_id = Categories::find($request->categories_id);
        //   $products = Products::class
        //    ->where('name','LIKE','%'.$request->get('search').'%')
        //    ->get();

        $users = Products::where('name', 'LIKE', '%' . $request->get('search') . '%')
            ->get();

        dd($users);

    }










    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Products::all();
        $categories = Categories::all();
        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * @param ProductsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductsRequest $request)
    {

        Products::create($request->all());
        return redirect()->route('products');
    }


    /**
     * @param Products $products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Products $products)
    {
        return view('products.edit', ['products' => $products]);
    }

    /**
     * @param $id
     * @param ProductsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, ProductsRequest $request)
    {
        Products::find($id)->update($request->all());
        return redirect()->route('products');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Products::destroy($id);
        return redirect()->route('products');
    }

}
