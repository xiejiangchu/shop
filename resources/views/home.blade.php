@extends('layouts.app')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="home">
  <div class="weui_search_bar" id="search_bar">
  <form class="weui_search_outer">
    <div class="weui_search_inner">
      <i class="weui_icon_search"></i>
      <input type="search" class="weui_search_input" id="search_input" placeholder="搜索" required/>
      <a href="javascript:" class="weui_icon_clear" id="search_clear"></a>
    </div>
    <label for="search_input" class="weui_search_text" id="search_text">
      <i class="weui_icon_search"></i>
      <span>搜索</span>
    </label>
  </form>
  <a href="javascript:" class="weui_search_cancel" id="search_cancel">取消</a>
</div>

<div class="swiper-container" data-pagination='.swiper-pagination' data-autoplay="1000">
  <div class="swiper-wrapper">
  @foreach($banners as $banner)
    <div class="swiper-slide">
    <img src="{{$banner->url}}" alt="">
    </div>
    @endforeach
  </div>
   <div class="swiper-pagination"></div>
</div>

<div class="category">
    @foreach($categories1 as $index => $category)
       <a class='category_item {{ $category->id==$category1_active->id? 'active':""}}' href="/category/{{$category->id}}" >{!! $category->name !!}</a>
     @endforeach
</div>

<div class="tags">
  @foreach($categories2 as $index => $category)
  <a href="/category/{{$category1_active->id}}/{{$category->id}}" class="tag {{ $category->id==$category2_active->id? 'active':""}}">{!! $category->name !!}
  </a>
  @endforeach
</div>



<div class="filter-container">
    <div class="weui-row weui-no-gutter">
        <div id='filter-category' class="weui-col-33">名称排序<i class="fa fa-angle-right"></i>
      </div>
      <div id='filter-orderby' class="weui-col-33">销量排序<i class="fa fa-angle-right"></i></div>
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
@endsection

@section('footer')
<div class="weui_tabbar">
    <a href="{{route('home')}}" class="weui_tabbar_item weui_bar_item_on">
      <p class="weui_tabbar_label"><i class="fa fa-home"></i>首页</p>
    </a>
     <a href="{{route('cart.cart')}}" class="weui_tabbar_item">
      <p class="weui_tabbar_label"><i class="fa fa-search"></i>购物车</p>
    </a>
    <a href="{{route('order.index')}}" class="weui_tabbar_item">
      <p class="weui_tabbar_label"><i class="fa fa-history"></i>订单</p>
    </a>
    <a href="{{route('profile')}}" class="weui_tabbar_item">
      <p class="weui_tabbar_label"><i class="fa fa-user"></i>我的</p>
    </a>
  </div>
</div>
@stop

@section('init_js')
    {!!Html::script('js/home.js')!!}
    <script type="text/javascript" charset="utf-8">

    </script>
@stop
