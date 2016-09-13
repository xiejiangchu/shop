@extends('layouts.app')

@section('content')
<div class="container">
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
	    {{ csrf_field() }}

	    <div class="weui_cells weui_cells_form">
		  <div class="weui_cell">
		    <div class="weui_cell_hd"><label class="weui_label">邮件地址</label></div>
		    <div class="weui_cell_bd weui_cell_primary">
		      <input class="weui_input" id="email" type="email" name="email" placeholder="请输入邮件地址">
		    </div>
		  </div>
		  <div class="weui_cell">
		    <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
		    <div class="weui_cell_bd weui_cell_primary">
		      <input class="weui_input" id="password" type="password" name="password" placeholder="请输入密码">
		    </div>
		  </div>
		   <div class="weui_cell">
		    @if ($errors->has('email'))
	            <span class="help-block">
	                <strong>{{ $errors->first('email') }}</strong>
	            </span>
	        @endif
	         @if ($errors->has('password'))
	            <span class="help-block">
	                <strong>{{ $errors->first('password') }}</strong>
	            </span>
	            @endif
		   </div>

		   <button type="submit" class="weui_btn weui_btn_primary">
	                登录
	        </button>
	        <div class="weui_cell">
	            <input type="checkbox" name="remember"> 记住我

	            <a class="weui_btn weui_btn_mini weui_btn_primary" href="{{ url('/password/reset') }}">
	                忘记密码
	            </a>
	        </div>

		 </div>
	</form>
</div>
@endsection
