<?php

namespace App\Http\Controllers;

use App\Address;
use App\Cart;
use App\Payment;
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
        $cart_goods     = self::getUser()->shoppingCartGoods()->get();
        $address        = Address::where('uid', self::getUid())->get();
        $addressDefault = Address::where('uid', self::getUid())->where('default', 1)->first();
        $payments       = Payment::enabled()->get();

        $address_detail = [];
        foreach ($address as $key => $item) {
            $address_detail[] = $item->city . $item->district . $item->road . $item->address;
        }

        $total = self::calcMoney($cart_goods);
        return view('check', [
            'cart_goods'     => $cart_goods,
            'payments'       => $payments,
            'address'        => json_encode($address_detail, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE),
            'addressDefault' => $addressDefault,
            'total'          => $total,
        ]);
    }

    public function calcMoney($cart_goods, $bonus = 0, $points = 0)
    {
        $total = [
            'goods_total'    => 0,
            'bonus_total'    => 0,
            'order_total'    => 0,
            'delivery_total' => 0,
        ];
        foreach ($cart_goods as $key => $item) {
            $total['goods_total'] += $item->shop_price * $item->pivot->amount;
            $total['order_total'] += $item->shop_price * $item->pivot->amount;
        }

        return $total;
    }
}
