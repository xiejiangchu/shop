@extends('layouts.app')

@section('header')
    <header class="auth-header">
      <h1 class="auth-title">注册</h1>
      <p class="auth-sub-title"></p>
    </header>
@stop

@section('content')
<div class="container register">
    <form method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}

    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">手机号</label></div>
            <div class="weui_cell_bd weui_cell_primary">
              <input class="weui_input" id="mobile" type="text" name="mobile" placeholder="手机号">
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">姓名</label></div>
            <div class="weui_cell_bd weui_cell_primary">
              <input class="weui_input" id="name" type="text" name="name" placeholder="用户名">
            </div>
        </div>

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
            <div class="weui_cell_bd weui_cell_primary">
              <input class="weui_input" id="password" type="password" name="password" placeholder="请输入密码">
            </div>
        </div>

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">确认密码</label></div>
            <div class="weui_cell_bd weui_cell_primary">
              <input class="weui_input" id="password_confirmation" type="password" name="password_confirmation" placeholder="请输入密码">
            </div>
        </div>

        <div class="weui_cell text-center">
            @if ($errors->has('mobile'))
                <span class="help-block">
                    <strong>{{ $errors->first('mobile') }}</strong>
                </span>
            @endif
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <button type="submit" class="weui_btn weui_btn_primary login-submit">
                    注册
        </button>
    </div>
</form>
</div>
@endsection
