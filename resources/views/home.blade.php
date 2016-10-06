@extends('layouts.app')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="swiper-container" data-pagination='.swiper-pagination' data-autoplay="1000">
  <div class="swiper-wrapper">
  @foreach($banners as $banner)
    <div class="swiper-slide">
    <img src="{{$banner}}" alt="">
    </div>
    @endforeach
  </div>
   <div class="swiper-pagination"></div>
</div>

<div class="category">
     @foreach($categories1 as $category)
     <div class="category_item {{ $category->id==$category1_active->id? 'category_item_active':""}}">
       <a href="/category/{{$category->id}}">{!! $category->name !!}</a>
     </div>
     @endforeach
</div>


<div class="home_container">
  <div class="left">
   @foreach($categories2 as $index => $category)
     <div class="category_item {{ $category->id==$category2_active->id? 'category_item_active':""}}">
       <a href="/category/{{$category1_active->id}}/{{$category->id}}">{!! $category->name !!}</a>
     </div>
     @endforeach
  </div>
  <div class="right">
    @include('ajax.home')
  </div>


</div>

<div id='loading' class="weui-infinite-scroll" style='display: none;'>
      <div class="infinite-preloader"></div>
      正在加载
</div>

@if(!$cart_goods->isEmpty())
<div class="shopping">

  <div class="shopping-cart">
    <div class="shopping-cart-count">
        {{count($cart_goods)}}
    </div>
  </div>

   <div class="shopping-cart-detail">
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
                    <span class='cart-button'>
                       <a href="javascript:;" class="weui_btn weui_btn_primary weui_btn_mini">清空购物车</a>
                       <a href="{{route('cart.calc')}}" class="weui_btn weui_btn_primary weui_btn_mini">结算</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
@endif
@endsection

@section('footer')
<div class="weui_tabbar">
    <a href="{{route('home')}}" class="weui_tabbar_item weui_bar_item_on">
      <div class="weui_tabbar_icon">
        <img src="/images/icon_nav_button.png" alt="">
      </div>
      <p class="weui_tabbar_label">首页</p>
    </a>
    <a href="{{route('order')}}" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="/images/icon_nav_msg.png" alt="">
      </div>
      <p class="weui_tabbar_label">订单</p>
    </a>
    <a href="{{route('profile')}}" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="/images/icon_nav_cell.png" alt="">
      </div>
      <p class="weui_tabbar_label">我</p>
    </a>
  </div>
@stop

@section('init_js')
    {!!Html::script('js/home.js')!!}
    <script type="text/javascript" charset="utf-8">

    </script>
@stop
