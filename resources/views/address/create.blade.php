
@extends('layouts.app')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
 <div class="weui_cells weui_cells_form">
 <div class="weui_cell">
      <div class="weui_cell_hd"><label for="name" class="weui_label">手机</label></div>
      <div class="weui_cell_bd weui_cell_primary">
        <input class="weui_input" id="mobile" type="text" value="">
      </div>
    </div>
    <div class="weui_cell">
      <div class="weui_cell_hd"><label for="name" class="weui_label">联系人</label></div>
      <div class="weui_cell_bd weui_cell_primary">
        <input class="weui_input" id="in" type="text" value="">
      </div>
    </div>
    <div class="weui_cell">
      <div class="weui_cell_hd"><label for="name" class="weui_label">街道</label></div>
      <div class="weui_cell_bd weui_cell_primary">
        <input class="weui_input" id="job" type="text" value="">
      </div>
    </div>
    <div class="weui_cell">
      <div class="weui_cell_hd"><label for="name" class="weui_label">详细地址</label></div>
      <div class="weui_cell_bd weui_cell_primary">
        <input class="weui_input" id="job" type="text" value="">
      </div>
    </div>
    <div class="weui_btn_area">
      <a class="weui_btn weui_btn_primary" href="javascript:" id="showTooltips">确定</a>
    </div>
  </div>
@stop

@section('footer')

@stop

@section('init_js')
    <script type="text/javascript" charset="utf-8">
      $("#job").select({
        title: "选择职业",
        items: ["法官", "医生", "猎人", "学生", "记者", "其他"],
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
