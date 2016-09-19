@extends('layouts.app')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="swiper-container" data-pagination='.swiper-pagination' data-autoplay="1000">
  <div class="swiper-wrapper">
    <div class="swiper-slide"><img src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i1/TB1n3rZHFXXXXX9XFXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
    <div class="swiper-slide"><img src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i4/TB10rkPGVXXXXXGapXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
    <div class="swiper-slide"><img src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i1/TB1kQI3HpXXXXbSXFXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
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

<div class="shopping">

  <div class="shopping-cart">
    <div class="shopping-cart-count">
        5
    </div>
  </div>

   <div class="shopping-cart-detail">
     <div class="weui_panel">
        <div class="weui_panel_bd">
            <div class="weui_media_box weui_media_small_appmsg">
                <div class="weui_cells weui_cells_access">
                    <a class="weui_cell" href="javascript:;">
                        <div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>文字标题</p>
                        </div>
                        <span class="weui_cell_ft"></span>
                    </a>
                    <a class="weui_cell" href="javascript:;">
                        <div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>文字标题</p>
                        </div>
                        <span class="weui_cell_ft"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
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
