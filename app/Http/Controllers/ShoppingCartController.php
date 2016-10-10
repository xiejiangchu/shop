<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
        $cart_goods = Cart::firstOrCreate([
            'gid' => $request['gid'],
            'uid' => self::getUid(),
        ]);
        $cart_goods->amount = $request['amount'];
        if ($cart_goods->amount == 0) {
            $cart_goods->delete();
        } else {
            $cart_goods->save();
        }
        return self::cartShort();
    }

    public function sub(Request $request)
    {
        $this->validateData($request);
        $cart_goods = Cart::firstOrCreate([
            'gid' => $request['gid'],
            'uid' => self::getUid(),
        ]);
        $cart_goods->amount = $request['amount'];
        if ($cart_goods->amount == 0) {
            $cart_goods->delete();
        } else {
            $cart_goods->save();
        }

        return self::cartShort();
    }

    public function cartShort()
    {
        $cart_goods = self::getUser()->shoppingCartGoods()->get();
        $result     = [];
        $total      = 0;
        foreach ($cart_goods as $key => $cart_good) {
            $result[] = $cart_good->formatAjax();
            $total += $cart_good->pivot->amount;
        }
        return array(
            "total" => $total,
            "cart"  => $result,
        );
    }

    public function cart()
    {
        $cart_goods = self::getUser()->shoppingCartGoods()->get();
        $result     = [];
        $total      = 0;
        foreach ($cart_goods as $key => $cart_good) {
            $total += $cart_good->pivot->amount;
        }

        return view('cart', [
            "total" => $total,
            "cart"  => $cart_goods,
        ]);
    }

    public function details()
    {
        $cart_goods = self::getUser()->shoppingCartGoods()->get();
        $result     = [];
        $total      = 0;
        foreach ($cart_goods as $key => $cart_good) {
            $total += $cart_good->pivot->amount;
        }

        return view('cart', [
            "total" => $total,
            "cart"  => $cart_goods,
        ]);
    }

    public function clear()
    {
        $affectedRows = Cart::where('uid', self::getUid())->delete();
        return view('cart', [
            "total" => 0,
            "cart"  => new Collection,
        ]);
    }

    public function calc(Request $request)
    {
        $cart_goods = self::getUser()->shoppingCartGoods()->get();

        return view('check', [
            'cart_goods' => $cart_goods,
        ]);
    }
}
