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

 <div class="tags" ng-show="index=='category'">
    @foreach($categories1 as $category)
    <a href="/category/{{$category->id}}" class="tag {{ $category->id==$category1_active->id? 'active':""}}">{!! $category->name !!}
    </a>
    @endforeach
</div>

<div class="filter-container">
    <div class="weui-row weui-no-gutter">
      <div id='filter-category' class="weui-col-33">二级分类<i class="fa fa-angle-right"></i>
        <div class="catgory2">
          @foreach($categories2 as $index => $category)
             <a href="/category/{{$category1_active->id}}/{{$category->id}}">{!! $category->name !!}</a>
           @endforeach
        </div>
      </div>
      <div id='filter-orderby' class="weui-col-33">智能排序<i class="fa fa-angle-right"></i></div>
      <div id='filter-price' class="weui-col-33">价格排序<i class="fa fa-angle-right"></i></div>
    </div>
</div>


<div class="home_container">
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
                </div>
            </div>
        </div>
        <span class="cart-close"> <i class="fa fa-close"></i></span>
         <span class='cart-button'>
           <a href="javascript:;" class="cart-clear weui_btn weui_btn_primary weui_btn_mini"><i class="fa fa-trash">清空</i></a>
           <a href="{{route('cart.calc')}}" class="weui_btn weui_btn_primary weui_btn_mini">结算</a>
        </span>
    </div>
</div>
</div>
@endif
@endsection

@section('footer')
<div class="weui_tabbar">
    <a href="{{route('home')}}" class="weui_tabbar_item weui_bar_item_on">
      <p class="weui_tabbar_label"><i class="fa fa-home"></i>首页</p>
    </a>
     <a href="{{route('search.index')}}" class="weui_tabbar_item">
      <p class="weui_tabbar_label"><i class="fa fa-search"></i>搜索</p>
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
    {!!Html::script('js/home.js')!!}
    <script type="text/javascript" charset="utf-8">

    </script>
@stop
