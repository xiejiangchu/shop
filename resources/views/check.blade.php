@extends('layouts.app')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')

 <div class="weui-pull-to-refresh-layer">
    <div class='pull-to-refresh-arrow'></div>
    <div class='pull-to-refresh-preloader'></div>
    <div class="down">下拉刷新</div>
    <div class="up">释放刷新</div>
    <div class="refresh">正在刷新</div>
</div>

<header class='check-header'>
  <h1 class="check-title">订单信息</h1>
</header>

<div id='fade' class="fade">

</div>

<form action="{{route('order.create')}}" method='post'>
  <input type="hidden" value="{{csrf_token()}}" name="_token">
  <input type="hidden" value="PUT" name="_method">
  <div class="weui_cells weui_cells_form">
  @if(!empty($addressDefault))
  <div id='address_select' class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">收货人</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type='hidden' placeholder="收货人" value='{{$addressDefault->receiver}}'>
          <input type="hidden" value="PUT" name="address_id" value='{{$addressDefault->id}}'>
          <h4 class="weui_media_title">{{$addressDefault->receiver}}</h4>
          <p class="weui_media_desc">{{$addressDefault->mobile}}</p>
          <p class="weui_media_desc">{{$addressDefault->city . $addressDefault->district . $addressDefault->road . $addressDefault->address}}</p>
      </div>
    </div>
    <div class="weui_cell">
      <a href="{{route('address.create2')}}"><label class="weui_label">添加地址</label></a>
    </div>
    @else
    <div class="weui_cell">
        <a href="{{route('address.create2')}}"><label class="weui_label">添加地址</label></a>
      </div>
    @endif

    <div class="weui_cells_title">配送信息</div>
    <div class="weui_cell">
      <div class="weui_cell_hd"><label for="time-format" class="weui_label">配送日期</label></div>
      <div class="weui_cell_bd weui_cell_primary">
        <input class="weui_input" id="sendDate" type="text" placeholder="配送日期" >
      </div>
    </div>

    <div class="weui_cell">
      <div class="weui_cell_hd"><label for="time-format" class="weui_label">配送时间</label></div>
      <div class="weui_cell_bd weui_cell_primary">
         <select class="weui_select" name="time">
            <option value="5-6">5点－6点</option>
            <option value="6-7">6点－7点</option>
            <option value="7-8">7点－8点</option>
            <option value="8-9">8点－9点</option>
          </select>
      </div>
    </div>

    <div class="weui_cells_title">支付信息</div>
      <div class="weui_cell weui_cell_select">
        <div class="weui_cell_bd weui_cell_primary">
          <select class="weui_select" name="payment">
            @foreach($payments as $key => $payment)
              <option {{$key==0? 'selected':""}} value="{{$payment->code}}">{{$payment->name}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="weui_cells_title">留言</div>
      <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
          <div class="weui_cell_bd weui_cell_primary">
            <textarea class="weui_textarea" placeholder="有什么想留言的？" rows="3" name='message'></textarea>
            <div class="weui_textarea_counter"><span>0</span>/200</div>
          </div>
        </div>
      </div>
      <div class="weui_cell weui_cell_select">
        <div class="weui_cell_bd weui_cell_primary">
          <select class="weui_select" name="bonus">
            <option value="1">红包 5元</option>
            <option value="2">红包 10元</option>
            <option selected value="3">红包 15元</option>
          </select>
        </div>
      </div>


      @if(!$cart_goods->isEmpty())
       <div class="shopping-cart-check">
         <div class="weui_panel">
            <div class="weui_panel_bd">
                <div class="weui_media_box weui_media_small_appmsg">
                    <div class="weui_cells weui_cells_access">
                        @foreach($cart_goods as $good)
                        <a class="weui_cell" href="javascript:;">
                            <div class="weui_cell_hd"><img src="{{$good->thumb}}" alt="" style="width:20px;margin-right:5px;display:block"></div>
                            <div class="weui_cell_bd weui_cell_primary">
                                <p>{{$good->name}} </p>
                                <p>{{$good->shop_price.'  x'}} <span class='amount'>{{$good->pivot->amount}}</span><span class='total'>{{$good->shop_price*$good->pivot->amount}}</span> </p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
      </div>
    @endif

      <div class="weui_cells_tips">
        <p class='fee'>商品总价：<span class="fee-num">{{$total['goods_total']}}</span></p>
        <p class='fee'>红包：<span class="fee-num">{{$total['bonus_total']}}</span></p>
        <p class='fee'>运输费：<span class="fee-num">{{$total['delivery_total']}}</span></p>
        <p class='fee'>订单总额：<span class="fee-num">{{$total['order_total']}}</span></p>
      感谢您使用本系统下单，月都商城欢迎您的再次光临
      </div>

      <div class="weui_btn_area">
        <button class="weui_btn weui_btn_primary" type='submit' id="showTooltips">提交订单</button>
      </div>
    </div>
</form>

@stop

@section('init_js')
    <script type="text/javascript" charset="utf-8">
      Date.prototype.format = function(format) {
          var o = {
              "M+": this.getMonth() + 1, //month
              "d+": this.getDate(), //day
              "h+": this.getHours(), //hour
              "m+": this.getMinutes(), //minute
              "s+": this.getSeconds(), //second
              "q+": Math.floor((this.getMonth() + 3) / 3), //quarter
              "S": this.getMilliseconds() //millisecond
          }
          if (/(y+)/.test(format)) {
              format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
          }

          for (var k in o) {
              if (new RegExp("(" + k + ")").test(format)) {
                  format = format.replace(RegExp.$1, RegExp.$1.length == 1 ? o[k] : ("00" + o[k]).substr(("" + o[k]).length));
              }
          }
          return format;
      };

$("#address_select").select({
    title: "选择地址",
    items: {!!$address!!},
    onChange: function(d) {
        console.log(this, d);
    },
    onClose: function() {
        $('#fade').hide();
    },
    onOpen: function() {
        $('#fade').show();
    },
});

$(document.body).pullToRefresh().on("pull-to-refresh", function() {
    window.location.reload();
    setTimeout(function() {
        $(document.body).pullToRefreshDone();
    }, 2000);
});
var today=new Date();
var t=today.getTime()+1000*60*60*24*7;
var end=new Date(t);

 $("#sendDate").calendar({
    minDate:today.format("yyyy-MM-dd"),
    maxDate:end.format("yyyy-MM-dd"),
    onChange: function (p, values, displayValues) {
      console.log(values, displayValues);
    }
  });


    </script>
@stop
