@extends('layouts.app')

@section('header')

@stop

@section('content')
<div class="profile">
  <div class="profile_top">
   <div class="profile-row">
        @if(!  Auth::guest())
         <a class="weui_btn weui_btn_mini " href="{{ url('/password/reset') }}">
            <i class="fa fa-comment-o"></i>
        </a>

        <a class="weui_btn weui_btn_mini right" href="{{ url('/password/reset') }}">
            <i class="fa fa-cogs"></i>
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

   <div class="profile-row order">
        <a href="{{route('home')}}" class="item">
            <div class="weui_tabbar_icon">
                <i class="fa fa-credit-card"></i>
            </div>
            <p class="weui_tabbar_label">待付款</p>
        </a>
        <a href="{{route('order')}}" class="item">
            <div class="weui_tabbar_icon">
                <i class="fa fa-truck"></i>
            </div>
            <p class="weui_tabbar_label">待收货</p>
        </a>
        <a href="{{route('profile')}}" class="item">
            <div class="weui_tabbar_icon">
                <i class="fa fa-history"></i>
            </div>
            <p class="weui_tabbar_label">历史订单</p>
        </a>
    </div>
</div>

<div class="weui_panel profile-container">
      <div class="weui_panel_bd">
        <div class="weui_media_box weui_media_small_appmsg">
          <div class="weui_cells weui_cells_access">
          @if($user&&$user->hasRole('admin'))
          <a class="weui_cell" href="{{route('admin.admin')}}">
              <div class="weui_cell_hd">
                <i class="fa fa-cubes"></i>
              </div>
              <div class="weui_cell_bd weui_cell_primary">
                <p>后台管理</p>
              </div>
              <span class="weui_cell_ft"></span>
            </a>
          @endif
            <a class="weui_cell" href="javascript:;">
              <div class="weui_cell_hd">
                <i class="fa fa-bullseye "></i>
              </div>
              <div class="weui_cell_bd weui_cell_primary">
                <p>我的地址</p>
              </div>
              <span class="weui_cell_ft"></span>
            </a>
            <a class="weui_cell" href="javascript:;">
              <div class="weui_cell_hd">
                <i class="fa fa-bullseye "></i>
              </div>
              <div class="weui_cell_bd weui_cell_primary">
                <p>我的优惠券</p>
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
      <p class="weui_tabbar_label"><i class="fa fa-home"></i>首页</p>
    </a>
    <a href="{{route('search.index')}}" class="weui_tabbar_item">
      <p class="weui_tabbar_label"><i class="fa fa-search"></i>搜索</p>
    </a>
    <a href="{{route('order')}}" class="weui_tabbar_item ">
      <p class="weui_tabbar_label"><i class="fa fa-history"></i>订单</p>
    </a>
    <a href="{{route('profile')}}" class="weui_tabbar_item weui_bar_item_on">
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
