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
        $categories1 = Category::notDelete()->level1()->get();
        $categories2 = Category::notDelete()->level2()->get();
        $goods       = Goods::online()->statusNormal()->notDelete()->take(10)->get();
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

    public function mine()
    {
        return view('mine');
    }
}
