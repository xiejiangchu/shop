@extends('layouts.app')

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
     <p style="display:flex;flex-flow:row nowrap;overFlow-x:auto;overFlow-y: hidden;">
     @foreach($categories1 as $category)
        <a href="" style="white-space:nowrap;margin:0 5px;">{!! $category->name !!}</a>
     @endforeach
     </p>
</div>


 @foreach($goods as $index => $good)
 <div class="weui-row weui-no-gutter">
  <div class="weui-col-20" style="width:10%;">{{ $index < sizeof($categories2)? $categories2[$index]->name :""}}</div>
  <div class="weui-col-50" style="width:90%;">
   <div class="weui_panel weui_panel_access">
      <div class="weui_panel_bd">
        <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
          <div class="weui_media_hd">
            <img class="weui_media_appmsg_thumb" src="{!! $good->src !!}" alt="">
          </div>
          <div class="weui_media_bd">
            <h4 class="weui_media_title">{!!$good->name!!}</h4>
            <p class="weui_media_desc">{!!$good->summary!!}</p>
          </div>
        </a>
      </div>
    </div>
  </div>
 </div>
@endforeach


@endsection

@section('footer')
<div class="weui_tabbar" style="position:fixed;bottom:0;">
    <a href="javascript:;" class="weui_tabbar_item weui_bar_item_on">
      <div class="weui_tabbar_icon">
        <img src="./images/icon_nav_button.png" alt="">
      </div>
      <p class="weui_tabbar_label">首页</p>
    </a>
    <a href="javascript:;" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="./images/icon_nav_msg.png" alt="">
      </div>
      <p class="weui_tabbar_label">订单</p>
    </a>
    <a href="javascript:;" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="./images/icon_nav_cell.png" alt="">
      </div>
      <p class="weui_tabbar_label">我</p>
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
