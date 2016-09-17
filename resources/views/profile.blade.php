@extends('layouts.app')

@section('header')

@stop

@section('content')
<div class="profile">
  <div class="profile_top">
   <div class="profile-row">
        @if(!  Auth::guest())
         <a class="weui_btn weui_btn_mini " href="{{ url('/password/reset') }}">
            我的消息
        </a>

        <a class="weui_btn weui_btn_mini right" href="{{ url('/password/reset') }}">
            设置
        </a>
        @endif
    </div>
    <div class="avatar">
      <img src="./images/swiper-1.jpg" alt="" class="avatar_image">
      @if(Auth::guest())
      <a class="" href="{{ url('/login') }}">
            请先登录
      </a>
      @else
      <p> {{$user->name}}</p>
       <a class=" " href="{{ url('/logout') }}">
            退出
      </a>
      @endif
    </div>
  </div>

   <div class="profile-row bottom">
        <a href="{{route('home')}}" class="item">
            <div class="weui_tabbar_icon">
                <img src="./images/icon_nav_button.png" alt="">
            </div>
            <p class="weui_tabbar_label">待付款</p>
        </a>
        <a href="{{route('order')}}" class="item">
            <div class="weui_tabbar_icon">
                <img src="./images/icon_nav_button.png" alt="">
            </div>
            <p class="weui_tabbar_label">待收货</p>
        </a>
        <a href="{{route('profile')}}" class="item">
            <div class="weui_tabbar_icon">
                <img src="./images/icon_nav_cell.png" alt="">
            </div>
            <p class="weui_tabbar_label">历史订单</p>
        </a>
    </div>
</div>


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

@endsection

@section('footer')
<div class="weui_tabbar">
    <a href="{{route('home')}}" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="./images/icon_nav_button.png" alt="">
      </div>
      <p class="weui_tabbar_label">首页</p>
    </a>
    <a href="{{route('order')}}" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="./images/icon_nav_msg.png" alt="">
      </div>
      <p class="weui_tabbar_label">订单</p>
    </a>
    <a href="{{route('profile')}}" class="weui_tabbar_item weui_bar_item_on">
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
