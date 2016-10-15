<?php

namespace App\Http\Controllers;

use App\Address;
use App\Bonus;
use App\Cart;
use App\Order;
use App\OrderGoods;
use App\OrderLog;
use App\Syslog;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected function validateItem(Request $request)
    {
        $this->validate($request, [
            'address_id' => 'required|numeric|min:0',
            'bonus_id'   => 'required|numeric|min:-1',
            'send_date'  => 'required|date',
            'send_time'  => 'required',
            'payment'    => 'required|string',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = Order::with('goods', 'orderlog')->where('uid', self::getUid())->paginate(self::PAGE_SIZE);
        return view('order.index', [
            'paginate' => $paginate,
        ]);
    }

    public function unpaid()
    {
        $paginate = Order::with('goods', 'orderlog')->unpaid()->where('uid', self::getUid())->paginate(self::PAGE_SIZE);
        return view('order.index', [
            'paginate' => $paginate,
        ]);
    }

    public function unship()
    {
        $paginate = Order::with('goods', 'orderlog')->unship()->where('uid', self::getUid())->paginate(self::PAGE_SIZE);
        return view('order.index', [
            'paginate' => $paginate,
        ]);
    }

    public function history()
    {
        $paginate = Order::with('goods', 'orderlog')->where('uid', self::getUid())->paginate(self::PAGE_SIZE);
        return view('order.index', [
            'paginate' => $paginate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
    }

    public function calc(Request $request)
    {
        $cart_goods = self::getUser()->shoppingCartGoods()->get();
        $total      = self::calcMoney($cart_goods);
        return array(
            'cart_goods' => $cart_goods,
            'total'      => $total,
        );

    }

    public function calcMoney($cart_goods, $bonus = 0, $points = 0)
    {
        $total = [
            'order_amount'   => 0,
            'order_weight'   => 0,
            'order_money'    => 0,
            'bonus_total'    => 0,
            'order_total'    => 0,
            'delivery_total' => 0,
        ];
        foreach ($cart_goods as $key => $item) {
            $total['order_amount'] += $item->pivot->amount;
            $total['order_weight'] += $item->weight * $item->pivot->amount;
            $total['order_money'] += $item->shop_price * $item->pivot->amount;
        }

        return $total;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateItem($request);
        $address    = Address::find($request['address_id']);
        $bonus      = Bonus::enable()->available()->where('id', $request['bonus_id'])->first();
        $cart       = self::calc($request);
        $time_start = explode('-', $request['send_time'], 2)[0];
        $time_end   = explode('-', $request['send_time'], 2)[1];
        $order      = Order::create(array(
            'NO'                => date("Ymd", time()) . self::orderNO(12),
            'uid'               => self::getUid(),
            'confirmed'         => 0,
            'order_status'      => 0,
            'pay_status'        => 0,
            'ship_status'       => 0,
            'package_status'    => 0,
            'order_amount'      => $cart['total']['order_amount'],
            'order_weight'      => $cart['total']['order_weight'],
            'order_money'       => $cart['total']['order_money'],
            'order_amount_real' => 0,
            'order_money_real'  => 0,
            'bonus_id'          => (empty($bonus) ? null : $bonus->id),
            'bonus'             => (empty($bonus) ? null : $bonus->money),
            'point'             => 0,
            'send_date'         => $request['send_date'],
            'time_start'        => $time_start,
            'time_end'          => $time_end,
            'payment'           => $request['send_date'],
            'address_id'        => $address['id'],
            'mobile'            => $address['mobile'],
            'receiver'          => $address['receiver'],
            'city'              => $address['city'],
            'district'          => $address['district'],
            'road'              => $address['road'],
            'address'           => $address['address'],
            'message'           => $request['message'],
        ));

        //购物车处理
        $toSave = [];
        foreach ($cart['cart_goods'] as $key => $goods) {
            $order_goods      = new OrderGoods($goods->formatToOrdreGoods());
            $order_goods->oid = $order->id;
            $toSave[]         = $order_goods;
        }
        $order->goods()->saveMany($toSave);

        // 清除购物车
        $cart_goods = self::clearCart();

        //订单日志
        $orderlog = new OrderLog([
            'type'     => 'order',
            'operator' => self::getUser()->id,
            'oid'      => $order->id,
            'action'   => 'create',
            'details'  => '用户提交了订单',
        ]);
        $order->orderlog()->save($orderlog);

        //系统日志
        $syslog = new Syslog([
            'type'     => 'order',
            'operator' => '系统',
            'src_id'   => $order->id,
            'action'   => 'create',
            'details'  => '用户' . self::getUser()->name . self::getUser()->id . '提交了订单，订单编号' . $order->id . '订单金额：' . $order->order_amount,
        ]);
        $order->syslog()->save($syslog);
        return view('order.success');
    }

    public function clearCart()
    {
        $affectedRows = Cart::where('uid', self::getUid())->delete();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
