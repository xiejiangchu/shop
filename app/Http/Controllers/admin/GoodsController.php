<?php

namespace App\Http\Controllers\admin;

use App\Goods;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    const PAGE_SIZE = 50;

    public function index()
    {
        $paginate = Goods::orderby('id')->paginate(self::PAGE_SIZE);
        return view('admin.goods', [
            'paginate' => $paginate,
        ]);
    }
}
