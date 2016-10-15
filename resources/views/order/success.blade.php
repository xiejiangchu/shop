@extends('layouts.app')

@section('content')
 <div class="weui_msg">
      <div class="weui_icon_area"><i class="weui_icon_success weui_icon_msg"></i></div>
      <div class="weui_text_area">
        <h2 class="weui_msg_title">操作成功</h2>
        <p class="weui_msg_desc">提交订单成功，我们将及时地送到您手中</p>
        <p class="weui_msg_desc"> 感谢您使用月都商城,欢迎您再次光临!</p>
      </div>
      <div class="weui_opr_area">
        <p class="weui_btn_area">
          <a href="{{route('home')}}" class="weui_btn weui_btn_primary">确定</a>
        </p>
      </div>
      <div class="weui_extra_area">
        <a href="{{route('order.index')}}">查看详情</a>
      </div>
    </div>
@stop

@section('init_js')
    <script type="text/javascript" charset="utf-8">

    </script>
@stop
