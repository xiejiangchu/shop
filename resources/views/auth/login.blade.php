@extends('layouts.app')

@section('header')
	<header class="auth-header">
      <h1 class="auth-title">登录</h1>
      <p class="auth-sub-title"></p>
    </header>
@stop
@section('content')
<div class="container login">
	<form method="POST" action="{{ url('/login') }}">
	    {{ csrf_field() }}

	    <div class="weui_cells weui_cells_form">
		  <div class="weui_cell">
		    <div class="weui_cell_hd"><label class="weui_label">用户名</label></div>
		    <div class="weui_cell_bd weui_cell_primary">
		      <input class="weui_input" id="mobile" type="text" name="mobile" placeholder="请输入手机号／用户名">
		    </div>
		  </div>
		  <div class="weui_cell">
		    <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
		    <div class="weui_cell_bd weui_cell_primary">
		      <input class="weui_input" id="password" type="password" name="password" placeholder="请输入密码">
		    </div>
		  </div>
		   <div class="weui_cell text-center">
		    @if ($errors->has('mobile'))
	            <span class="help-block">
	                <strong>{{ $errors->first('mobile') }}</strong>
	            </span>
	        @endif
	         @if ($errors->has('password'))
	            <span class="help-block">
	                <strong>{{ $errors->first('password') }}</strong>
	            </span>
	            @endif
		   </div>

		   <button type="submit" class="weui_btn weui_btn_primary login-submit">
	                登录
	        </button>
	        <div class="login-row">
	            <input type="checkbox" name="remember"> &nbsp;记住我

	            <div class='login-forget'>
	            	 <a class="weui_btn weui_btn_mini weui_btn_primary" href="{{ url('/register') }}">
	                注册
	            </a>

	             <a class="weui_btn weui_btn_mini weui_btn_primary " href="{{ url('/password/reset') }}">
	                忘记密码
	            </a>
	            </div>


	        </div>

		 </div>
	</form>
</div>
@endsection
