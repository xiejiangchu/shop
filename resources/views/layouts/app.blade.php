<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@section('title') shop @show</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <meta name="description" content="">

    {!!Html::style('css/weui.min.css')!!}
    {!!Html::style('css/jquery-weui.min.css')!!}
    {!!Html::style('css/app.css')!!}

    @section('head_script')

    @show
</head>
<body>
    @section('header')

    @show

    @section('content')
    @show

    @section('footer')
    <div class="weui_tabbar">
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
            <img src="./images/icon_nav_article.png" alt="">
          </div>
          <p class="weui_tabbar_label">发现</p>
        </a>
        <a href="javascript:;" class="weui_tabbar_item">
          <div class="weui_tabbar_icon">
            <img src="./images/icon_nav_cell.png" alt="">
          </div>
          <p class="weui_tabbar_label">我</p>
        </a>
      </div>
    @show
    {!!Html::script('js/jquery-2.1.4.js')!!}
    {!!Html::script('js/fastclick.js')!!}
    {!!Html::script('js/jquery-weui.min.js')!!}
    {!!Html::script('js/swiper.min.js')!!}
</body>
</html>
