@extends('layouts.app')

@section('header')

@stop

@section('content')
<div class="order-list">
  @if(!$paginate->isEmpty())
<div class='weui_tab_bd'>
  @foreach($paginate as $index => $item)
  <div class="order-top">
      <div class="weui-row weui-no-gutter">
        <div class="weui-col-50 order-status">
           <span>{{$item->address}}</span>
        </div>
        <div class="weui-col-50 order-btns">
          <span>{{$item->orderlog()->latest()->get()->get('0')->details}}</span>
        </div>
      </div>
    </div>
    <div class="weui_panel weui_panel_access">
      <div class="weui_panel_bd">
        <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
          <div class="weui_media_hd">
            <img class="weui_media_appmsg_thumb" src="{{$item->goods()->get()->get('0')->thumb}}" alt="">
          </div>
          <div class="weui_media_bd">
            <h4 class="weui_media_title">订单编号：{{$item->NO}}{{$item->orders_status}}</h4>
            <p class="weui_media_desc">
             {{$item->goods()->get()->get('0')->name.'等，共计'.$item->goods()->get()->count().'种商品'}}
            </p>
            <p class="weui_media_desc">
              商品数量：{!!$item->order_amount!!},订单金额：{{$item->order_amount}}，
            </p>
          </div>
        </a>
      </div>
    </div>
    <div class="order-bottom">
      <div class="weui-row weui-no-gutter">
        <div class="weui-col-30 order-status">
          <span class="status">{{$item->created_at}}</span>
        </div>
        <div class="weui-col-70 order-btns">
         <button class="weui_btn weui_btn_mini weui_btn_primary">
            支付订单
          </button>
           <button class="weui_btn weui_btn_mini weui_btn_primary bg-warning">
              取消订单
          </button>
        </div>
      </div>
    </div>

     @endforeach
</div>
@else
<div>
  <div class="message" value='none'><span class="none"><i class="fa fa-none">没有订单</i></span></div>
</div>
@endif
</div>
@endsection

@section('footer')
<div class="weui_tabbar">
    <a href="{{route('home')}}" class="weui_tabbar_item">
      <p class="weui_tabbar_label"><i class="fa fa-home"></i>首页</p>
    </a>
     <a href="{{route('cart.cart')}}" class="weui_tabbar_item">
      <p class="weui_tabbar_label"><i class="fa fa-search"></i>购物车</p>
    </a>
    <a href="{{route('order.index')}}" class="weui_tabbar_item weui_bar_item_on">
      <p class="weui_tabbar_label"><i class="fa fa-history"></i>订单</p>
    </a>
    <a href="{{route('profile')}}" class="weui_tabbar_item">
      <p class="weui_tabbar_label"><i class="fa fa-user"></i>我的</p>
    </a>
  </div>
@stop

@section('init_js')
    <script type="text/javascript" charset="utf-8">
          $(".swiper-container").swiper({
            loop: true,
            autoplay: 3000
          });
    </script>
@stop
