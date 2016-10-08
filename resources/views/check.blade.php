@extends('layouts.app')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')

<header class='check-header'>
  <h1 class="check-title">订单信息</h1>
</header>

<div class="weui_cells weui_cells_form">
<div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label">地址</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="tel" placeholder="配送地址">
        </div>
      </div>
 <div class="weui_cell">
    <div class="weui_cell_hd"><label for="" class="weui_label">日期</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="date" value="">
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_hd"><label for="" class="weui_label">时间</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="datetime-local" value="" placeholder="">
    </div>
  </div>

  <div class="weui_cell">
    <div class="weui_cell_hd"><label for="time4" class="weui_label">定制时间</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="time4" type="text" value="2012-12-12 上午8点">
    </div>
  </div>

  <div class="weui_cell">
    <div class="weui_cell_hd"><label for="date" class="weui_label">日期</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="date" type="text">
    </div>
  </div>

  <div class="weui_cell">
    <div class="weui_cell_hd"><label for="time-format" class="weui_label">自定义格式</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="time-format" type="text" value="2012年12月12日 12时13分">
    </div>
  </div>

<div class="weui_cells_title">支付信息</div>
  <div class="weui_cell weui_cell_select">
    <div class="weui_cell_bd weui_cell_primary">
      <select class="weui_select" name="select1">
        <option value="1">微信</option>
        <option value="2">支付宝</option>
        <option selected value="3">货到付款</option>
      </select>
    </div>
  </div>

  <div class="weui_cells_title">留言</div>
	<div class="weui_cells weui_cells_form">
	  <div class="weui_cell">
	    <div class="weui_cell_bd weui_cell_primary">
	      <textarea class="weui_textarea" placeholder="有什么想留言的？" rows="3"></textarea>
	      <div class="weui_textarea_counter"><span>0</span>/200</div>
	    </div>
	  </div>
	</div>
  <div class="weui_cell weui_cell_select">
    <div class="weui_cell_bd weui_cell_primary">
      <select class="weui_select" name="select1">
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

  <div class="weui_cells_tips">感谢您使用本系统下单，月都商城欢迎您的再次光临</div>

  <div class="weui_btn_area">
    <a class="weui_btn weui_btn_primary" href="javascript:" id="showTooltips">提交订单</a>
  </div>
</div>
@stop

@section('init_js')
    <script type="text/javascript" charset="utf-8">
      $("#date").calendar({
          onChange: function(p, values, displayValues) {
              console.log(values, displayValues);
          }
      });

      $("#time4").datetimePicker({
          times: function() {
              return [{
                  values: ['上午6点', '上午7点', '上午8点']
              }];
          },
          onChange: function(picker, values, displayValues) {
              console.log(values);
          }
      });

      $("#time-format").datetimePicker({
          title: '自定义格式',
          yearSplit: '年',
          monthSplit: '月',
          dateSplit: '日',
          value: '2016-9-7 00:01',
          min: new Date().setDate(new Date().getDay()-1),
          max: new Date(),
          times: function() {
              return [ // 自定义的时间
                  {
                      values: (function() {
                          var hours = [];
                          for (var i = 0; i < 24; i++)
                            hours.push(i > 9 ? i : '0' + i);
                          return hours;
                      })()
                  }, {
                      divider: true, // 这是一个分隔符
                      content: '时'
                  }, {
                      values: (function() {
                          var minutes = [];
                          for (var i = 0; i < 59; i++) minutes.push(i > 9 ? i : '0' + i);
                          return minutes;
                      })()
                  }, {
                      divider: true, // 这是一个分隔符
                      content: '分'
                  }
              ];
          },
          onChange: function(picker, values, displayValues) {
              console.log(values);
          }
      });
    </script>
@stop
