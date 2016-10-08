<?php

namespace App\Http\Controllers;

use App\Category;
use App\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    const PAGE_SIZE = 20;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function getBanners()
    {
        return [
            '/banner/banner-1.jpg',
            '/banner/banner-2.jpg',
            '/banner/banner-3.jpg',
            '/banner/banner-4.jpg',
            '/banner/banner-5.jpg',
        ];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $categories1      = Category::notDelete()->level1()->orderBy('order', 'desc')->get();
        $category1_active = $categories1[0];

        $categories2 = Category::notDelete()->level2()->orderBy('order', 'desc')
            ->where('pid', $category1_active->id)->get();
        $category2_active = $categories2[0];

        $paginate = Goods::online()->statusNormal()->notDelete()
            ->where('category_id1', $category1_active->id)
            ->where('category_id2', $category2_active->id)->paginate(self::PAGE_SIZE);

        $cart_goods = new Collection;
        if (Auth::check()) {
            $cart_goods = self::getUser()->shoppingCartGoods()->get();
        }

        return view('home', [
            'banners'          => self::getBanners(),
            'paginate'         => $paginate,
            'categories1'      => $categories1,
            'categories2'      => $categories2,
            'category1_active' => $category1_active,
            'category2_active' => $category2_active,
            'cart_goods'       => $cart_goods,
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

    public function category(Request $request, $cat1, $cat2 = null)
    {
        $categories1      = Category::notDelete()->level1()->orderBy('order', 'desc')->get();
        $category1_active = Category::find($cat1);

        $categories2 = Category::notDelete()->level2()->orderBy('order', 'desc')
            ->where('pid', $category1_active->id)->get();

        $cart_goods = new Collection;

        if (empty($categories2) || count($categories2) == 0) {
            return view('home', [
                'banners'          => self::getBanners(),
                'paginate'         => Collection::make(),
                'categories1'      => $categories1,
                'categories2'      => Collection::make(),
                'category1_active' => $category1_active,
                'category2_active' => "",
                'cart_goods'       => $cart_goods,
            ]);
        }
        if (empty($cat2)) {
            $category2_active = $categories2[0];
        } else {
            $category2_active = Category::find($cat2);
        }

        $paginate = Goods::online()->statusNormal()->notDelete()
            ->where('category_id1', $category1_active->id)
            ->where('category_id2', $category2_active->id)->paginate(self::PAGE_SIZE);

        if ($request->ajax()) {
            return view('ajax.home', [
                'paginate' => $paginate,
            ]);
        }
        if (Auth::check()) {
            $cart_goods = self::getUser()->shoppingCartGoods()->get();
        }

        return view('home', [
            'banners'          => self::getBanners(),
            'paginate'         => $paginate,
            'categories1'      => $categories1,
            'categories2'      => $categories2,
            'category1_active' => $category1_active,
            'category2_active' => $category2_active,
            'cart_goods'       => $cart_goods,
        ]);
    }
}
