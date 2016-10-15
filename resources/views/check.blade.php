@extends('layouts.app')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="check-container">
  <div class="weui-pull-to-refresh-layer weui-pull-to-refresh">
    <div class='pull-to-refresh-arrow'></div>
    <div class='pull-to-refresh-preloader'></div>
    <div class="down">下拉刷新</div>
    <div class="up">释放刷新</div>
    <div class="refresh">正在刷新</div>
</div>

<header class='check-header'>
  <h1 class="check-title">订单信息</h1>
</header>

<form action="{{route('order.store')}}" method='post'>
  <input type="hidden" value="{{csrf_token()}}" name="_token">
  <div class="weui_cells weui_cells_form">
   <div class="form-group text-center">
         <div class="col-sm-10">
          @if ($errors->has('address_id'))
          <span class="help-block text-red">
              <strong>地址无效</strong>
          </span>
        @endif
        @if ($errors->has('send_date'))
          <span class="help-block text-red">
              <strong>{{ $errors->first('send_date') }}</strong>
          </span>
          @endif
        @if ($errors->has('send_time'))
          <span class="help-block text-red">
              <strong>{{ $errors->first('send_time') }}</strong>
          </span>
          @endif

          @if ($errors->has('payment'))
          <span class="help-block text-red">
              <strong>{{ $errors->first('payment') }}</strong>
          </span>
          @endif

          @if ($errors->has('bonus_id'))
          <span class="help-block text-red">
              <strong>{{ $errors->first('bonus_id') }}</strong>
          </span>
          @endif

           @if ($errors->has('cart'))
          <span class="help-block text-red">
              <strong>{{ $errors->first('cart') }}</strong>
          </span>
          @endif
         </div>
       </div>

  @if(!empty($addressDefault))
  <div class="weui_cells_title weui_cells_title_no_margin">配送地址</div>
  <div class="weui_cell">
      <div id='address_select'  class="weui_cell_bd weui_cell_primary">
          <input type="hidden" id='address_id' name="address_id" value='{{$addressDefault->id}}'>
          <h4 class="weui_media_title" id='receiver'>{{$addressDefault->receiver}}</h4>
          <p class="weui_media_desc" id='mobile'>{{$addressDefault->mobile}}</p>
          <p class="weui_media_desc" id='desc'>{{$addressDefault->city . $addressDefault->district . $addressDefault->road . $addressDefault->address}}</p>
      </div>
    </div>
     @endif
    <div class="weui_cell">
        <a href="{{route('address.create2')}}" class='weui_btn weui_btn_mini weui_btn_primary'>
          添加地址
       </a>
    </div>

    <div class="weui_cells_title check-title">配送时间</div>
    <div class="weui_cell">
      <div class="weui_cell_hd"><label for="time-format" class="weui_label">配送日期</label></div>
      <div class="weui_cell_bd weui_cell_primary">
        <input class="weui_input" id="send_date" name='send_date' type="text" placeholder="配送日期">
      </div>
    </div>

    <div class="weui_cell">
      <div class="weui_cell_hd"><label for="time-format" class="weui_label">配送时间</label></div>
      <div class="weui_cell_bd weui_cell_primary">
         <select class="weui_select" id='send_time' name="send_time">
            <option selected value="5-6">5点－6点</option>
            <option value="6-7">6点－7点</option>
            <option value="7-8">7点－8点</option>
            <option value="8-9">8点－9点</option>
          </select>
      </div>
    </div>

    <div class="weui_cells_title check-title">支付信息</div>
      <div class="weui_cell weui_cell_select">
        <div class="weui_cell_bd weui_cell_primary">
          <select class="weui_select" name="payment">
            @foreach($payments as $key => $payment)
              <option {{$key==0? 'selected':""}} value="{{$payment->code}}">{{$payment->name}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="weui_cells_title check-title">留言</div>
      <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
          <div class="weui_cell_bd weui_cell_primary">
            <textarea class="weui_textarea" placeholder="有什么想留言的？" rows="3" name='message'></textarea>
            <div class="weui_textarea_counter"><span>0</span>/200</div>
          </div>
        </div>
      </div>

      <div class="weui_cells_title check-title">优惠信息</div>
      <div class="weui_cell weui_cell_select">
        <div class="weui_cell_bd weui_cell_primary">
          <select class="weui_select" name="bonus_id">
            <option selected value="0">不使用红包</option>
            <option value="1">红包 5元</option>
            <option value="2">红包 10元</option>
            <option  value="3">红包 15元</option>
          </select>
        </div>
      </div>
      <div class="weui_cell">
      <div class="weui_cell_hd"><label for="time-format" class="weui_label">使用积分</label></div>
      <div class="weui_cell_bd weui_cell_primary">
        <input class="weui_input" id="point" name='point' type="text" placeholder="积分">
      </div>
    </div>


      @if(!$cart_goods->isEmpty())
       <div class="weui_cells_title check-title">商品详情</div>
       <div class="weui_cell">
         <div class="shopping-cart-check">
         <div class="weui_panel">
            <div class="weui_panel_bd">
                <div class="weui_media_box weui_media_small_appmsg">
                    <div class="weui_cells weui_cells_access">
                        @foreach($cart_goods as $good)
                        <a class="weui_cell" href="javascript:;">
                            <div class="weui_cell_hd"><img src="{{$good->thumb}}" alt="" style="width:20px;margin-right:5px;display:block"></div>
                            <div class="weui_cell_bd weui_cell_primary">
                                <p>{{$good->name}}({{$good->summary}}) </p>
                                <p class='info'>{{$good->shop_price.'  x'}} <span class='amount'>{{$good->pivot->amount}}</span><span class='total'>{{$good->shop_price*$good->pivot->amount}}</span> </p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
      </div>
       </div>

    @endif

      <div class="weui_cells_tips">
        <p class='fee'>商品总价：<span class="fee-num">{{$total['order_amount']}}</span></p>
        <p class='fee'>红包：<span class="fee-num">{{$total['bonus_total']}}</span></p>
        <p class='fee'>运输费：<span class="fee-num">{{$total['delivery_total']}}</span></p>
        <p class='fee'>订单总额：<span class="fee-num">{{$total['order_money']}}</span></p>
      感谢您使用本系统下单，月都商城欢迎您的再次光临
      </div>

      <div class="weui_btn_area">
        <button class="weui_btn weui_btn_primary" type='submit' id="showTooltips">提交订单</button>
      </div>
    </div>
</form>
</div>



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
      var address={!!$addressmap!!};

      $(document).ready(function($) {
        $("#send_date").val(today.format("yyyy-MM-dd"));
      });

$("#address_select").select({
    title: "选择地址",
    items: {!!$addresslist!!},
    onChange: function(d) {
      var id=$(d.values).attr('data-id');
      var object=address[id];
      $('#address_id').val(id);
      $('#receiver').text(object.receiver);
      $('#mobile').text(object.mobile);
      $('#desc').text(object.city +object.district +object.road + object.address);

    },
    onClose: function() {
    },
    onOpen: function() {
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

 $("#send_date").calendar({
  value:[today.format("yyyy-MM-dd")],
    minDate:today.format("yyyy-MM-dd"),
    maxDate:end.format("yyyy-MM-dd"),
    onChange: function (p, values, displayValues) {
      console.log(values, displayValues);
    }
  });


    </script>
@stop
