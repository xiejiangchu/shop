<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@section('title') 蔬菜 @show</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <meta name="description" content="宜春蔬菜王国">
    @section('head_meta')

    @show

    {!!Html::style('css/weui.min.css')!!}
    {!!Html::style('css/jquery-weui.min.css')!!}
    {!!Html::style('css/app.css')!!}

    @section('head_script')

    @show
</head>
<body ontouchstart>
    @section('header')

    @show

    @section('content')
    @show

    @section('footer')
    @show
    {!!Html::script('js/jquery-2.1.4.js')!!}
    {!!Html::script('js/fastclick.js')!!}
    {!!Html::script('js/jquery-weui.min.js')!!}
    {!!Html::script('js/swiper.min.js')!!}

    @section('init_js')
    @show
</body>
</html>
