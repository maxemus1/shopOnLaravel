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
     * Показывает новости
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('news.home', ['news' => News::paginate(self::NEWS_PER_PAGE)]);
    }

    /**
     * Показывает конкретную новость
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('news.single', ['news' => News::find($id)], ['products' => Product::paginate(self::PRODUCTS_PER_PAGE)]);
    }
}
