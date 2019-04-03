<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\News;
use App\Model\Products;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(12);
        return view('news.home', ['news' => $news]);
    }

    public function show($id)
    {
        $news = News::find($id);
        $products = Products::paginate(3);
        return view('news.single', ['news' => $news], ['products' => $products]);
    }
}
