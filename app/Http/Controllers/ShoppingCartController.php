<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    protected function validateData(Request $request)
    {
        $this->validate($request, [
            'gid'    => 'required|numeric|min:0',
            'amount' => 'required|numeric|min:0',
        ]);
    }

    public function add(Request $request)
    {
        $this->validateData($request);
        $cart_goods = ShoppingCart::firstOrCreate([
            'gid' => $request['gid'],
            'uid' => self::getUid(),
        ]);
        $cart_goods->amount = $request['amount'];
        $cart_goods->save();
        return $cart_goods;
    }

    public function sub(Request $request)
    {
        $this->validateData($request);
        $this->validateData($request);
        $cart_goods = ShoppingCart::firstOrCreate([
            'gid' => $request['gid'],
            'uid' => self::getUid(),
        ]);
        $cart_goods->amount = $request['amount'];
        $cart_goods->save();
        return $cart_goods;
    }

    public function calc(Request $request)
    {
        $cart_goods = self::getUser()->shoppingCartGoods()->get();

        return view('check', [
            'cart_goods' => $cart_goods,
        ]);
    }
}
