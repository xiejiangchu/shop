<?php

namespace App\Http\Controllers;

use App\Category;
use App\Goods;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $categories1 = Category::notDelete()->level1()->orderBy('order', 'asc')->get();
        $categories2 = Category::notDelete()->level2()->orderBy('order', 'desc')->get();
        $goods       = Goods::online()->statusNormal()->notDelete()->take(20)->get();
        return view('home', [
            'goods'       => $goods,
            'categories1' => $categories1,
            'categories2' => $categories2,
        ]);
    }

    public function order()
    {
        return view('order');
    }

    public function profile()
    {
        return view('profile');
    }

    public function category($cat1, $cat2)
    {
        return "category";
    }
}
