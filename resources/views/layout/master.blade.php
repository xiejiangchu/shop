<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@section('title')shop@show</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<meta name="description" content="">

	{!!Html::style('css/jquey-weui.min.css')!!}
	{!!Html::style('css/app.css')!!}

	@section('script')

	@show
</head>
<body>
	@section('header')
	@show

	@section('content')
	@show

	@section('footer')

	@show

	{!!Html::script('js/jquery-weui.min.js')!!}
	{!!Html::script('js/swiper.min.js')!!}
</body>
</html>
