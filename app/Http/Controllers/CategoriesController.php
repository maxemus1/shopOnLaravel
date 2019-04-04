<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Products;

class CategoriesController extends Controller
{
    public function show($id)
    {
        $products = Products::where('categories_id', $id)
            ->paginate(12);
        return view('home', ['products' => $products]);
    }
}
