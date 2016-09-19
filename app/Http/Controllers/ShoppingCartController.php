<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function add(Request $request)
    {
        return 'add';
    }

    public function sub(Request $request)
    {
        return 'sub';
    }
}
