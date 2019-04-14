<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\News;
use App\Model\Product;

class NewsController extends Controller
{
    const  PRODUCTS_PER_PAGE = 3;
    const  NEWS_PER_PAGE = 12;
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $news = News::paginate(self::NEWS_PER_PAGE);
        return view('news.home', ['news' => $news]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $news = News::find($id);
        $products = Product::paginate(self::PRODUCTS_PER_PAGE);
        return view('news.single', ['news' => $news], ['products' => $products]);
    }
}
