
@extends('layouts.app')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
@if(!$cart->isEmpty())
<div class="cart-container weui_panel_bd">
	@foreach($cart as $good)
	<a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	  <div class="weui_media_hd">
	    <img class="weui_media_appmsg_thumb" src="{{$good->thumb}}" alt="">
	  </div>
	  <div class="weui_media_bd">
	    <h4 class="weui_media_title">{{$good->name}}</h4>
	    <p class="weui_media_desc">{{$good->summary}}</p>
	    <p class="weui_media_desc">{{$good->shop_price}}/{{$good->unit}}</p>

	  </div>
  	 <span class="cart-op">
        <i class="cart_sub fa fa-minus-circle color-error" gid='{{$good->id}}'></i>
        <span id='goods_{{$good->id}}'>{{$good->pivot->amount}}</span>
        <i class="cart_add fa fa-plus-circle color-primary" gid='{{$good->id}}'></i>
    </span>
	</a>
	@endforeach
</div>

@endif

	<div class="cart-submit weui-row weui-no-gutter">
      <div class="weui-col-50">订单：{{$total}}</div>
      <div class="weui-col-50">
        <a href="{{route('cart.clear')}}" class="weui_btn weui_btn_primary weui_btn_mini"><i class="fa fa-trash">清空</i></a>
           <a href="{{route('cart.calc')}}" class="weui_btn weui_btn_primary weui_btn_mini">结算</a>
     </div>

    </div>
@stop

@section('footer')
<div class="weui_tabbar">
    <a href="{{route('home')}}" class="weui_tabbar_item ">
      <p class="weui_tabbar_label"><i class="fa fa-home"></i>首页</p>
    </a>
     <a href="{{route('cart.cart')}}" class="weui_tabbar_item weui_bar_item_on">
      <p class="weui_tabbar_label"><i class="fa fa-search"></i>购物车</p>
    </a>
    <a href="{{route('order')}}" class="weui_tabbar_item">
      <p class="weui_tabbar_label"><i class="fa fa-history"></i>订单</p>
    </a>
    <a href="{{route('profile')}}" class="weui_tabbar_item">
      <p class="weui_tabbar_label"><i class="fa fa-user"></i>我的</p>
    </a>
  </div>
@stop

@section('init_js')
    <script type="text/javascript" charset="utf-8">

    </script>
@stop
