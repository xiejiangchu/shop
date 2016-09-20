<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    const PAGE_SIZE = 10;

    public function index()
    {
        $paginate = Category::with('children')->where('pid', 0)->orderby('id')->paginate(self::PAGE_SIZE);
        return view('admin.category', [
            'paginate' => $paginate,
        ]);
    }
}
