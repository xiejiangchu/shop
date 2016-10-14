
@extends('layouts.app')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
  <header class="auth-header">
      <h1 class="auth-title">新增地址</h1>
      <p class="auth-sub-title"></p>
  </header>
 <div class="weui_cells weui_cells_form">
  <form method="POST" action="{{ route('address.store')}}">
      {{ csrf_field() }}
    <div class="weui_cell">
      <div class="weui_cell_hd"><label for="name" class="weui_label">手机</label></div>
      <div class="weui_cell_bd weui_cell_primary">
        <input class="weui_input" id="mobile" name=mobile type="text" value="">
      </div>
    </div>
    <div class="weui_cell">
      <div class="weui_cell_hd"><label for="name" class="weui_label">联系人</label></div>
      <div class="weui_cell_bd weui_cell_primary">
        <input class="weui_input" id="receiver" name='receiver' type="text" value="">
      </div>
    </div>
    <div class="weui_cell">
      <div class="weui_cell_hd"><label for="name" class="weui_label">区县</label></div>
      <div class="weui_cell_bd weui_cell_primary">
        <input class="weui_input" id="district" name='district' type="text" value="{{$district}}">
      </div>
    </div>
    <div class="weui_cell">
      <div class="weui_cell_hd"><label for="name" class="weui_label">街道</label></div>
      <div class="weui_cell_bd weui_cell_primary">
        <input class="weui_input" id="road" name='road' type="text" value="{{$road}}">
      </div>
    </div>
    <div class="weui_cell">
      <div class="weui_cell_bd weui_cell_primary">
        <textarea class="weui_textarea" placeholder="详细地址" rows="3" id="address" name='address'></textarea>
        <div class="weui_textarea_counter"><span>0</span>/100</div>
      </div>
    </div>

    <div class="weui_cell text-center">
    @if ($errors->has('mobile'))
          <span class="help-block">
              <strong>{{ $errors->first('mobile') }}</strong>
          </span>
      @endif
     @if ($errors->has('receiver'))
      <span class="help-block">
          <strong>{{ $errors->first('receiver') }}</strong>
      </span>
      @endif
       @if ($errors->has('district'))
      <span class="help-block">
          <strong>{{ $errors->first('district') }}</strong>
      </span>
      @endif
       @if ($errors->has('road'))
      <span class="help-block">
          <strong>{{ $errors->first('road') }}</strong>
      </span>
      @endif
       @if ($errors->has('address'))
      <span class="help-block">
          <strong>{{ $errors->first('address') }}</strong>
      </span>
      @endif
 </div>
 <div class="weui_btn_area">
    <button class="weui_btn weui_btn_primary" href="javascript:" type='submit' id="showTooltips">添加地址</button>
  </div>
  </form>
</div>

@stop

@section('footer')

@stop

@section('init_js')
    <script type="text/javascript" charset="utf-8">
    $("#district").select({
        title: "选择县区",
        items: {!!$districts!!},
        onChange: function(d) {
          console.log(this, d);
        },
        onClose: function() {
          console.log("close");
        },
        onOpen: function() {
          console.log("open");
        },
      });
      $("#road").select({
        title: "选择街道",
        items: {!!$roads!!},
        onChange: function(d) {
          console.log(this, d);
        },
        onClose: function() {
          console.log("close");
        },
        onOpen: function() {
          console.log("open");
        },
      });
    </script>
@stop
